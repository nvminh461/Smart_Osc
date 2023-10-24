<?php

declare(strict_types=1);

namespace Nvm\Banner\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class BannerActions UI Component
 * @package Nvm\Banner\Ui\Component\Listing\Column
 */
class BannerActions extends Column
{
    /**
     * @var UrlInterface
     */
    protected UrlInterface $urlBuilder;

    /**
     * Actions constructor.
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param array $components
     * @param array $data
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        UrlInterface       $urlBuilder,
        ContextInterface   $context,
        UiComponentFactory $uiComponentFactory,
        array              $components = [],
        array              $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare data source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['banner_id'])) {
                    $item[$this->getData('name')]['edit'] = [
                            'href' => $this->urlBuilder->getUrl(
                                'banner/banner/edit',
                                [
                                    'id' => $item['banner_id']
                                ]
                            ),
                            'label' => __('Edit')
                        ];
                    $item[$this->getData('name')]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(
                            'banner/banner/delete',
                            [
                                'id' => $item['banner_id'],
                            ]
                        ),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => '',
                            'message' => __('Are you sure you want to delete record?')
                        ]
                    ];
                }
            }
        }
        return $dataSource;
    }
}
