<?php

namespace TrainingKeval\FeedBack\Model\Ui;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use TrainingKeval\FeedBack\Model\ResourceModel\FeedBack\CollectionFactory;
use Magento\Backend\Model\Auth\Session;

class DataProvider extends AbstractDataProvider
{
    private $loadedData;
    /**
     * @var DataPersistor
     */
    private $dataPersistor;

    public function __construct(
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        Session $authSession,
        $name,
        $primaryFieldName,
        $requestFieldName,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        $this->authSession = $authSession;
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $user = $this->authSession->getUser();

        foreach ($items as $item) {
            $itemData = $item->getData();
            if(isset($item['response_message']) && !empty($item['response_message'])) {
                $itemData['response_by'] = $user->getId();
            }
            $concatName['responders_email'] = $user->getEmail();
            $concatName['name'] = $itemData['first_name'].' '.$itemData['last_name'];
            $itemData = array_merge($concatName, $itemData);
            $this->loadedData[$item->getId()] = $itemData;
        }

        $data = $this->dataPersistor->get('customer');
        if (!empty($data)) {
            $custom_admin = $this->collection->getNewEmptyItem();
            $custom_admin->setData($data);
            $this->loadedData[$custom_admin->getId()] = $custom_admin->getData();
            $this->dataPersistor->clear('customer');
        }
        return $this->loadedData;
    }
}
