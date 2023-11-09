<?php

declare(strict_types=1);

namespace Nvm\Wholesale\Model\Contact;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Nvm\Wholesale\Model\ResourceModel\Contact\Collection;
use Nvm\Wholesale\Model\ResourceModel\Contact\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var Collection
     */
    protected $collection;

    /**
     * @var DataPersistorInterface
     */
    protected DataPersistorInterface $dataPersistor;

    /**
     * @var RequestInterface
     */
    protected RequestInterface $request;
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        RequestInterface $request,
        CollectionFactory $contactCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $contactCollectionFactory->create();
        $this->request = $request;
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->meta = $this->prepareMeta($this->meta);
    }

    /**
     * Prepares Meta
     */
    public function prepareMeta(array $meta)
    {
        return $meta;
    }

    /**
     * Get data
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();

        foreach ($items as $contact) {
            $data = $contact->getData();
            $this->loadedData[$contact->getId()] = $data;
        }

        $data = $this->dataPersistor->get('contact');
        if (!empty($data)) {
            $contact = $this->collection->getNewEmptyItem();
            $contact->setData($data);
            $this->loadedData[$contact->getId()] = $contact->getData();
            $this->dataPersistor->clear('contact');
        }

        return $this->loadedData;
    }

    public function getMeta()
    {
        $meta = parent::getMeta();
        $requestId = $this->request->getParam($this->requestFieldName);
        $status = $this->getData()[$requestId]['status'];
        if (isset($status) && $status == 1) {
            $meta['general']['children']['admin_message']['arguments']['data']['config']['disabled'] = true;
        }

        return $meta;
    }
}
