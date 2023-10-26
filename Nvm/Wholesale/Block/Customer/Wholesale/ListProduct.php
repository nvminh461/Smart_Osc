<?php

declare(strict_types=1);

namespace Nvm\Wholesale\Block\Customer\Wholesale;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Product;
use Magento\Customer\Api\AccountManagementInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Block\Account\Dashboard;
use Magento\Customer\Helper\Session\CurrentCustomer;
use Magento\Customer\Model\Session;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\View\Element\Template\Context;
use Magento\Newsletter\Model\SubscriberFactory;
use Nvm\Wholesale\Model\Contact;
use Nvm\Wholesale\Model\ResourceModel\Contact\Collection;
use Nvm\Wholesale\Model\ResourceModel\Contact\CollectionFactory;

class ListProduct extends Dashboard
{
    /**
     * Contact wholesale collection
     *
     * @var Collection
     */
    protected $_collection;

    /**
     * Contact wholesale resource model
     *
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var CurrentCustomer
     */
    protected $currentCustomer;

    /**
     * Catalog product model
     *
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @param Context $context
     * @param Session $customerSession
     * @param SubscriberFactory $subscriberFactory
     * @param CustomerRepositoryInterface $customerRepository
     * @param AccountManagementInterface $customerAccountManagement
     * @param CollectionFactory $collectionFactory
     * @param CurrentCustomer $currentCustomer
     * @param array $data
     */
    public function __construct(
        Context                     $context,
        Session                     $customerSession,
        SubscriberFactory           $subscriberFactory,
        CustomerRepositoryInterface $customerRepository,
        AccountManagementInterface  $customerAccountManagement,
        CollectionFactory           $collectionFactory,
        ProductRepositoryInterface  $productRepository,
        CurrentCustomer             $currentCustomer,
        array                       $data = [],
    )
    {
        $this->_collectionFactory = $collectionFactory;
        parent::__construct(
            $context,
            $customerSession,
            $subscriberFactory,
            $customerRepository,
            $customerAccountManagement,
            $data
        );
        $this->productRepository = $productRepository;
        $this->currentCustomer = $currentCustomer;
    }

    /**
     * Get html code for toolbar
     *
     * @return string
     */
    public function getToolbarHtml()
    {
        return $this->getChildHtml('toolbar');
    }

    /**
     * Initializes toolbar
     *
     */
    protected function _prepareLayout()
    {
        if ($this->getWholesales()) {
            $toolbar = $this->getLayout()->createBlock(
                \Magento\Theme\Block\Html\Pager::class,
                'customer_wholesale_list.toolbar'
            )->setCollection(
                $this->getWholesales()
            );

            $this->setChild('toolbar', $toolbar);
        }
        return parent::_prepareLayout();
    }

    /**
     * Get Wholesales
     *
     * @return bool|Collection
     */
    public function getWholesales()
    {
        if (!($customerId = $this->currentCustomer->getCustomerId())) {
            return false;
        }
        if (!$this->_collection) {
            $this->_collection = $this->_collectionFactory->create();
            $this->_collection
                ->addFieldToFilter('customer_id', $customerId);
        }
        return $this->_collection;
    }

    /**
     * Get Wholesale URL
     *
     */
    public function getWholesaleUrl($wholesale)
    {
        return $this->getUrl('wholesale/customer/view', ['id' => $wholesale->getContactId()]);
    }

    /**
     * Get product data
     *
     * @throws NoSuchEntityException
     */
    public function getProductData($wholesale)
    {
        if ($wholesale->getContactId() && !$this->getProductCacheData()) {
            $product = $this->productRepository->getById($wholesale->getProductId());
            $this->setProductCacheData($product);
        }
        return $this->getProductCacheData();
    }
}
