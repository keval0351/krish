<?php


namespace TrainingKeval\FeedBack\Model;

use TrainingKeval\FeedBack\Api\FeedBackRepositoryInterface;
use TrainingKeval\FeedBack\Model\ResourceModel\FeedBack;
use TrainingKeval\FeedBack\Model\FeedBackFactory;
use TrainingKeval\FeedBack\Model\ResourceModel\FeedBack\CollectionFactory;

class FeedBackRepository implements FeedBackRepositoryInterface
{
    private $feedback;
    private $feedbackFactory;
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory,
        FeedBack $feedback,
        FeedbackFactory $feedbackFactory
    )
    {
        $this->feedback = $feedback;
        $this->feedbackFactory = $feedbackFactory;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @param \TrainingKeval\FeedBack\Api\Data\FeedBackInterface $feedback
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function saveFeedback(\TrainingKeval\FeedBack\Api\Data\FeedBackInterface $feedback)
    {
        if($feedback->getId() == null) {
            $this->feedback->save($feedback);
            return $feedback;
        } else {
            $newFeedback = $this->feedbackFactory->create()->load($feedback->getId());
            foreach ($feedback->getData() as $key => $value) {
                $newFeedback->setData($key, $value);
            }
            $this->feedback->save($newFeedback);
            return $newFeedback;
        }
    }

    /**
     * @param int $id
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function getFeedbackById($id)
    {
        $feedback = $this->feedbackFactory->create()->load($id);
        return $feedback;
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteFeedbackById($id)
    {
        $feedback = $this->feedbackFactory->create()->load($id);
        $feedback->delete();
    }
}