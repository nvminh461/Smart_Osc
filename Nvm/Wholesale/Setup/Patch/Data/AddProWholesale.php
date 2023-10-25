<?php

declare(strict_types=1);

namespace Nvm\Wholesale\Setup\Patch\Data;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddProWholesale implements DataPatchInterface
{
    const ATTRIBUTE_CODE = 'pro_wholesale';
    const ATTRIBUTE_LABEL = 'Product customer wholesale';
    const ATTRIBUTE_GROUP_NAME = 'General';
    const ATTRIBUTE_INPUT_TYPE = 'boolean';
    const ATTRIBUTE_SORT_ORDER = 95;

    /**
     * @var ModuleDataSetupInterface
     */
    private ModuleDataSetupInterface $moduleDataSetup;

    /**
     * @var EavSetupFactory
     */
    private EavSetupFactory $eavSetupFactory;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory          $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * @return void
     */
    public function apply(): void
    {
        $this->moduleDataSetup->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->addAttribute(
            Product::ENTITY,
            self::ATTRIBUTE_CODE,
            [
                'type' => 'int',
                'label' => self::ATTRIBUTE_LABEL,
                'input' => self::ATTRIBUTE_INPUT_TYPE,
                'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                'required' => false,
                'sort_order' => self::ATTRIBUTE_SORT_ORDER,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'group' => self::ATTRIBUTE_GROUP_NAME,
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_filterable_in_grid' => true,
                'visible' => true,
                'is_html_allowed_on_front' => true,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'default' => 0,
            ]
        );

        $this->moduleDataSetup->endSetup();
    }

    public function revert(): void
    {
        $this->moduleDataSetup->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->removeAttribute(\Magento\Catalog\Model\Product::ENTITY, 'pro_wholesale');
        $this->moduleDataSetup->endSetup();
    }

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }
}
