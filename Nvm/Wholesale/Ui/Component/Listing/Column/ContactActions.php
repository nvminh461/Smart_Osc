<?php

declare(strict_types=1);

namespace Nvm\Wholesale\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * The ContactActions class represents a custom column in the contact listing UI component.
 */
class ContactActions extends Column
{
    /**
     * URL path for viewing a contact.
     */
    const CONTACT_URL_PATH_VIEW = 'nvm_wholesale/contact/view';

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * Initialize the column.
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare the data source for the column.
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                if (isset($item['contact_id'])) {
                    $item[$name]['view'] = [
                        'href' => $this->urlBuilder->getUrl(self::CONTACT_URL_PATH_VIEW, ['contact_id' => $item['contact_id']]),
                        'label' => __('View')
                    ];
                }
            }
        }
        return $dataSource;
    }
}
