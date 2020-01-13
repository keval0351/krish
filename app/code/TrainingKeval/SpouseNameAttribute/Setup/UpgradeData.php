<?php


namespace TrainingKeval\SpouseNameAttribute\Setup;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Entity\Attribute\Set as AttributeSet;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $customerSetupFactory;

    private $attributeSetFactory;

    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }


    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $customerEntity = $customerSetup->getEavConfig()->getEntityType('customer');
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();
        /** @var $attributeSet AttributeSet */
        $attributeSet = $this->attributeSetFactory->create();
        $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);

        if (version_compare($context->getVersion(), '1.0.2') < 0) {
            $customerSetup->addAttribute(
                \Magento\Customer\Model\Customer::ENTITY,
                'spouse_name',
                [
                    'type' => 'text',
                    'label' => 'Spouse Name',
                    'input' => 'text',
                    'required' => false,
                    'visible' => true,
                    'user_defined' => true,
                    'is_used_in_grid' => true,
                    'is_visible_in_grid' => '1',
                    'sort_order' => 1000,
                    'position' => 1000,
                    'system' => 0,
                ]
            );
            $Attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'spouse_name')
                ->addData([
                    'attribute_set_id' => $attributeSetId,
                    'attribute_group_id' => $attributeGroupId,
                    'used_in_forms' => ['adminhtml_customer', 'customer_account_create', 'customer_account_edit'],
                ]);

            $Attribute->save();
        }

        $setup->endSetup();
    }
}