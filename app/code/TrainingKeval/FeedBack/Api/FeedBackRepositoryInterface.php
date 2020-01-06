<?php


namespace TrainingKeval\FeedBack\Api;


interface FeedBackRepositoryInterface
{
    /**
     * @param int $id
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function getFeedbackById($id);

    /**
     * @param Data\FeedBackInterface $feedback
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function saveFeedback(\TrainingKeval\FeedBack\Api\Data\FeedBackInterface $feedback);

    /**
     * @param int $id
     * @return void
     */
    public function deleteFeedbackById($id);
}