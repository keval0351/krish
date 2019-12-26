<?php


namespace SimplifiedMagento\CustomAdmin\Model\Ui;


use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\ModifierPoolDataProvider
{
    /**
     * @var \Magento\Cms\Model\ResourceModel\Block\Collection
     */
    protected $collection;

    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * Constructor
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param \SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember\CollectionFactory $collectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     * @param PoolInterface|null $pool
     */
    public function __construct(CollectionFactory $collectionFactory,
                                $name,
                                $primaryFieldName,
                                $requestFieldName,
                                DataPersistorInterface $dataPersistor,
                                array $meta = [],
                                array $data = [],
                                PoolInterface $pool = null)
    {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();

        foreach ($items as $block) {
            $this->loadedData[$block->getId()] = $block->getData();
        }

        $data = $this->dataPersistor->get('member');
        if (!empty($data)) {
            $block = $this->collection->getNewEmptyItem();
            $block->setData($data);
            $this->loadedData[$block->getId()] = $block->getData();
            $this->dataPersistor->clear('member');
        }

        return $this->loadedData;
    }
}