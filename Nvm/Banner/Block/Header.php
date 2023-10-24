<?php

declare(strict_types=1);

namespace Nvm\Banner\Block;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Nvm\Banner\Model\ResourceModel\Banner\CollectionFactory;

class Header extends Template
{
    /**
     * @var CollectionFactory
     */
    public $CollectionFactory;

    /**
     * @param Context $context
     * @param CollectionFactory $CollectionFactory
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        Context           $context,
        CollectionFactory $CollectionFactory,
        UrlInterface      $urlBuilder
    ) {
        parent::__construct($context);
        $this->CollectionFactory = $CollectionFactory;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * @return array|null
     */
    public function viewHeader(): ?array
    {
        $collection = $this->CollectionFactory->create();
        $collection->addFieldToFilter('status', ['eq' => 1])->addFieldToFilter('banner_position', ['eq' => 1]);
        return $collection->getData();
    }

    /**
     * @param $imageName
     * @return string
     */
    public function getImage($imageName): string
    {
        $imagePath = $this->urlBuilder->getBaseUrl(
            ['_type' => UrlInterface::URL_TYPE_MEDIA]
        ) . 'banner/images/' . $imageName;
        return $imagePath;
    }
}
