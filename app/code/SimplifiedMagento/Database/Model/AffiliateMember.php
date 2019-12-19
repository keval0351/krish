<?php


namespace SimplifiedMagento\Database\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use SimplifiedMagento\Database\Api\Data\SimplifiedMagento;
use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember as AffiliateMemberResource;
use SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface;
//use Magento\Framework\Model\AbstractModel;

class AffiliateMember extends AbstractExtensibleModel implements AffiliateMemberInterface
{
    public function _construct()
    {
        $this->_init(AffiliateMemberResource::class);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData(AffiliateMemberInterface::ID);
    }

    /**
     * @return string
     */
    public function getName()
    {
       return $this->getData(AffiliateMemberInterface::NAME);
    }

    /**
     * @return boolean
     */
    public function getStatus()
    {
        return $this->getData(AffiliateMemberInterface::STATUS);
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->getData(AffiliateMemberInterface::ADDRESS);
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->getData(AffiliateMemberInterface::PHONE_NUMBER);
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(AffiliateMemberInterface::CREATED_AT);
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->getData(AffiliateMemberInterface::UPDATED_AT);
    }

    /**
     * @param string $name
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function setName($name)
    {
        return $this->setData(AffiliateMemberInterface::NAME, $name);
    }

    /**
     * @param boolean $status
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function setStatus($status)
    {
        return $this->setData(AffiliateMemberInterface::STATUS, $status);
    }

    /**
     * @param string $address
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function setAddress($address)
    {
        return $this->setData(AffiliateMemberInterface::ADDRESS, $address);
    }

    /**
     * @param string $phoneNumber
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function setPhoneNumber($phoneNumber)
    {
        return $this->setData(AffiliateMemberInterface::PHONE_NUMBER, $phoneNumber);
    }

    /**
     * @param int $id
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function setId($id)
    {
        return $this->setData(AffiliateMemberInterface::ID, $id);
    }

    /**
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @param \SimplifiedMagento\Database\Api\Data\AffiliateMemberExtensionInterface $affiliateMemberExtension
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberExtensionInterface
     */
    public function setExtensionAttributes(\SimplifiedMagento\Database\Api\Data\AffiliateMemberExtensionInterface $affiliateMemberExtension)
    {
        return $this->_setExtensionAttributes($affiliateMemberExtension);
    }
}