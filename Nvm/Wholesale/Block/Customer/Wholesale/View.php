<?php

declare(strict_types=1);

namespace Nvm\Wholesale\Block\Customer\Wholesale;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Model\Product;
use Magento\Customer\Helper\Session\CurrentCustomer;
use Nvm\Wholesale\Model\Contact;
use Nvm\Wholesale\Model\ContactFactory;

class View extends \Magento\Catalog\Block\Product\AbstractProduct
{
    /**
     * Customer view template name
     *
     * @var string
     */
    protected $_template = 'Nvm_Wholesale::customer/wholesale/view.phtml';

    /**
     * Catalog product model
     *
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * Review model
     *
     * @var ContactFactory
     */
    protected $_wholesaleFactory;

    /**
     * @var CurrentCustomer
     */
    protected $currentCustomer;

    /**
     * @param Context $context
     * @param ProductRepositoryInterface $productRepository
     * @param ContactFactory $wholesaleFactory
     * @param CurrentCustomer $currentCustomer
     * @param array $data
     */
    public function __construct(
        Context                    $context,
        ProductRepositoryInterface $productRepository,
        ContactFactory             $wholesaleFactory,
        CurrentCustomer            $currentCustomer,
        array                      $data = []
    ) {
        $this->productRepository = $productRepository;
        $this->_wholesaleFactory = $wholesaleFactory;
        $this->currentCustomer = $currentCustomer;
        parent::__construct(
            $context,
            $data
        );
    }

    /**
     * Initialize contact wholesale id
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setContactId($this->getRequest()->getParam('id', false));
    }

    /**
     * Get product data
     *
     */
    public function getProductData()
    {
        if ($this->getContactId() && !$this->getProductCacheData()) {
            $product = $this->productRepository->getById($this->getWholesaleData()->getProductId());
            $this->setProductCacheData($product);
        }
        return $this->getProductCacheData();
    }

    /**
     * Get wholesale data
     *
     */
    public function getWholesaleData()
    {
        if ($this->getContactId() && !$this->getWholesaleCachedData()) {
            $this->setWholesaleCachedData($this->_wholesaleFactory->create()->load($this->getContactId()));
        }
        return $this->getWholesaleCachedData();
    }

    /**
     * Return wholesale customer url
     *
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('wholesale/customer');
    }

    /**
     * @inheritDoc
     */
    protected function _toHtml()
    {
        return $this->currentCustomer->getCustomerId() ? parent::_toHtml() : '';
    }
}
