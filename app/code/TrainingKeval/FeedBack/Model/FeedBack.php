<?php

namespace TrainingKeval\FeedBack\Model;

use Magento\Framework\Model\AbstractModel;
use TrainingKeval\FeedBack\Api\Data\FeedBackInterface;
use TrainingKeval\FeedBack\Model\ResourceModel\FeedBack as FeedbackResource;

class FeedBack extends AbstractModel implements FeedBackInterface
{
    protected function _construct()
    {
        $this->_init(FeedbackResource::class);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData(FeedBackInterface::ID);
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->getData(FeedBackInterface::FNAME);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->getData(FeedBackInterface::LNAME);
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getData(FeedBackInterface::EMAIL);
    }

    /**
     * @return int
     */
    public function getRating()
    {
        return $this->getData(FeedBackInterface::RATING);
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->getData(FeedBackInterface::MESSAGE);
    }

    /**
     * @return boolean
     */
    public function getStatus()
    {
        return $this->getData(FeedBackInterface::STATUS);
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(FeedBackInterface::CREATED_AT);
    }

    /**
     * @param string $fname
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function setFirstName($fname)
    {
        return $this->setData(FeedBackInterface::FNAME, $fname);
    }

    /**
     * @param string $lname
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function setLastName($lname)
    {
        return $this->setData(FeedBackInterface::LNAME, $lname);
    }

    /**
     * @param string $email
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function setEmail($email)
    {
        return $this->setData(FeedBackInterface::EMAIL, $email);
    }

    /**
     * @param int $rating
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function setRating($rating)
    {
        return $this->setData(FeedBackInterface::RATING, $rating);
    }

    /**
     * @param string $message
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function setMessage($message)
    {
        return $this->setData(FeedBackInterface::MESSAGE, $message);
    }

    /**
     * @param boolean $status
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function setStatus($status)
    {
        return $this->setData(FeedBackInterface::STATUS, $status);
    }
}
