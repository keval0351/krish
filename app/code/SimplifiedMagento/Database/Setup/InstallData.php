<?php


namespace SimplifiedMagento\Database\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{

    /**
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $setup->getConnection()->insert(
            $setup->getTable('affiliate_member'),
            ['name'=>'Keval','address'=>'502 ishan,ahmedabad','status'=>true]

        );
        $setup->getConnection()->insert(
            $setup->getTable('affiliate_member'),
            ['name'=>'Kadia','address'=>'504 ishan,ahmedabad']

        );
        $setup->endSetup();
    }
}