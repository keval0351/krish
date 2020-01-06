<?php


namespace TrainingKeval\FeedBack\Api\Data;


interface FeedBackInterface
{
    const ID = 'entity_id';
    const FNAME = 'first_name';
    const LNAME = 'last_name';
    const EMAIL = 'email';
    const RATING = 'rating';
    const MESSAGE = 'message';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @return int
     */
    public function getRating();

    /**
     * @return string
     */
    public function getMessage();

    /**
     * @return boolean
     */
    public function getStatus();

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @param int $id
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function setId($id);

    /**
     * @param string $fname
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function setFirstName($fname);

    /**
     * @param string $lname
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function setLastName($lname);

    /**
     * @param string $email
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function setEmail($email);

    /**
     * @param int $rating
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function setRating($rating);

    /**
     * @param string $message
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function setMessage($message);

    /**
     * @param boolean $status
     * @return \TrainingKeval\FeedBack\Api\Data\FeedBackInterface
     */
    public function setStatus($status);

}