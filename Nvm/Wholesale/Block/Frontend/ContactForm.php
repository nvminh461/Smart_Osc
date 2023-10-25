<?php

declare(strict_types=1);

namespace Nvm\Wholesale\Block\Frontend;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\ProductRepository;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Customer;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;
use Nvm\Wholesale\Model\Contact;

class ContactForm extends Template
{
    /**
     * @var CustomerSession
     */
    protected $customerSession;

    /**
     * @var CustomerRepositoryInterface
     */
    protected $customerRepository;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var Contact
     */
    protected $contactModel;

    /**
     * @param Template\Context $context
     * @param CustomerSession $customerSession
     * @param CustomerRepositoryInterface $customerRepository
     * @param ProductRepository $productRepository
     * @param RequestInterface $request
     * @param Contact $contactModel
     * @param array $data
     */
    public function __construct(
        Template\Context            $context,
        CustomerSession             $customerSession,
        CustomerRepositoryInterface $customerRepository,
        ProductRepository           $productRepository,
        RequestInterface            $request,
        Contact                     $contactModel,
        array                       $data = []
    )
    {
        parent::__construct($context, $data);
        $this->customerSession = $customerSession;
        $this->customerRepository = $customerRepository;
        $this->productRepository = $productRepository;
        $this->contactModel = $contactModel;
        $this->request = $request;
    }

    /**
     * @return Customer|null
     */
    public function getCurrentCustomer()
    {
        if ($this->customerSession->isLoggedIn()) {
            return $this->customerSession->getCustomer();
        }
        return null;
    }

    /**
     * @return ProductInterface|mixed|string|null
     * @throws NoSuchEntityException
     */
    public function getCurrentProduct()
    {
        $productId = $this->request->getParam('product_id');
        $product = '';
        if ($productId) {
            $product = $this->productRepository->getById($productId);
        }
        return $product;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->request->getParam('productId');
    }

    /**
     * Compare the wholesale attributes of the customer and product
     *
     * @return bool
     */
    public function compareAttributes()
    {
        $currentCustomer = $this->getCurrentCustomer();
        $customerAttribute = $currentCustomer ? $currentCustomer->getCusWholesale() : '';
        $customerId = $currentCustomer ? $currentCustomer->getId() : '';

        $productAttribute = $this->getCurrentProduct()->getData('pro_wholesale');
        $productId = $this->getCurrentProduct()->getId();

        $contactCollection = $this->contactModel->getCollection()
            ->addFieldToFilter('customer_id', $customerId)
            ->addFieldToFilter('product_id', $productId);

        return $customerAttribute == 1 && $productAttribute == 1 && $contactCollection->getSize() == 0;
    }
}
