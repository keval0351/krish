<?php


namespace Mage2Tv\DeclarativeSchemaExample\Setup\Patch\Data;


use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class CreateDefaultBrand implements DataPatchInterface
{

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * Get array of patches that have to be executed prior to this.
     *
     * Example of implementation:
     *
     * [
     *      \Vendor_Name\Module_Name\Setup\Patch\Patch1::class,
     *      \Vendor_Name\Module_Name\Setup\Patch\Patch2::class
     * ]
     *
     * @return string[]
     */
    public static function getDependencies()
    {
        return [
            \Magento\Store\Setup\Patch\Schema\InitializeStoresAndWebsites::class
        ];
    }

    /**
     * Get aliases (previous names) for the patch.
     *
     * @return string[]
     */
    public function getAliases()
    {
//        return [
//            \Mage2Tv\DeclarativeSchemaExample\Setup\Patch\Data\CreateDefaultBrand::class
//        ];
    }

    /**
     * Run code inside patch
     * If code fails, patch must be reverted, in case when we are speaking about schema - then under revert
     * means run PatchInterface::revert()
     *
     * If we speak about data, under revert means: $transaction->rollback()
     *
     * @return $this
     */
    public function apply()
    {
        $brands = [
            ['name'=>'Gold','description'=>'Gold Package'],
            ['name'=>'Silver','description'=>'Silver Package'],
            ['name'=>'Bronze','description'=>'Bronze Package'],
        ];
        $records = array_map(function ($brand){
            return array_merge($brand,['is_enabled'=>1,'website_id'=>1]);
        },$brands);
        $this->moduleDataSetup->getConnection()->insertMultiple('Mage2Tv_DeclarativeSchemaExample',$records);
        return $this;
    }
}