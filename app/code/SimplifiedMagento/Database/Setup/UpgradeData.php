<?php


namespace SimplifiedMagento\Database\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{

    /**
     * Upgrades data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if(version_compare($context->getVersion(),'1.0.3','<')){
            $setup->getConnection()->insert(
              $setup->getTable('affiliate_member'),
              ['name'=>'SOG','address'=>'502, ishan,ghuma','status'=>true,'phone_number'=>'8758526752']
            );
        }
        $setup->endSetup();
    }
}