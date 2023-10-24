<?php

declare(strict_types=1);

namespace Nvm\Banner\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;


/**
 * Class Banner Thumbnail UI Component
 * @package Nvm\Banner\Ui\Component\Listing\Column
 */
class Thumbnail extends Column
{
    const ALT_FIELD = 'banner_name';

    /**
     * @var UrlInterface
     */
    private UrlInterface $urlBuilder;

    public function __construct(
        ContextInterface                $context,
        UiComponentFactory              $uiComponentFactory,
        UrlInterface $urlBuilder,
        array                           $components = [],
        array                           $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->urlBuilder = $urlBuilder;
    }

    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
                $imagePath = $this->urlBuilder->getBaseUrl(['_type' => UrlInterface::URL_TYPE_MEDIA]) . 'banner/images/' . $item['banner_image'];
                $item[$fieldName . '_src'] = $imagePath;
                $item[$fieldName . '_orig_src'] = $imagePath;
                $item[$fieldName . '_alt'] = $this->getAlt($item) ?: '';
                $item[$fieldName . '_link'] = $this->urlBuilder->getUrl(
                    'banner/banner/edit',
                    ['banner_id' => $item['banner_id']]
                );
            }
        }

        return $dataSource;
    }

    protected function getAlt($row)
    {
        $altField = $this->getData('config/altField') ?: self::ALT_FIELD;
        return $row[$altField] ?? null;
    }
}
