<?php

declare(strict_types=1);

namespace Nvm\Wholesale\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Nvm\Wholesale\Api\NvmWholesaleRepositoryInterface;

class SaveForm extends Action
{

    /**
     * @var ResultFactory
     */
    protected $resultFactory;

    /**
     * @var NvmWholesaleRepositoryInterface
     */
    private NvmWholesaleRepositoryInterface $wholesaleRepository;

    /**
     * @param Context $context
     * @param NvmWholesaleRepositoryInterface $wholesaleRepository
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        Context                         $context,
        NvmWholesaleRepositoryInterface $wholesaleRepository,
        ResultFactory                   $resultFactory
    )
    {
        $this->wholesaleRepository = $wholesaleRepository;
        $this->resultFactory = $resultFactory;
        parent::__construct($context);
    }

    /**
     * @throws \Exception
     */
    public function execute()
    {
        $postData = $this->getRequest()->getPostValue();
        if ($postData) {
            // Check if any required field is empty
            if (empty($postData['customer_name']) || empty($postData['email']) || empty($postData['product_name']) || empty($postData['phone_number'])) {
                $this->messageManager->addErrorMessage(__('Please fill in all required fields.'));
                $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
                $resultRedirect->setUrl($this->_redirect->getRefererUrl());
                return $resultRedirect;
            }
            if (empty($postData['contact_id'])) {
                $postData['contact_id'] = null;
            }
            // Create an instance of the ContactFactory model
            $contactForm = $this->wholesaleRepository->get($postData['contact_id']);

            // Set values from the form data to the Contact model
            $contactForm->setCustomerName($postData['customer_name']);
            $contactForm->setCustomerEmail($postData['email']);
            $contactForm->setProductName($postData['product_name']);
            $contactForm->setCustomerPhone($postData['phone_number']);
            $contactForm->setCustomerMessage($postData['message']);
            $contactForm->setProductId($postData['product_id']);
            $contactForm->setCustomerId($postData['customer_id']);

            // Save the Contact model
            $this->wholesaleRepository->save($contactForm);

            // Display success message
            $this->messageManager->addSuccessMessage(__('Form submitted successfully.'));

            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('wholesale/customer');
        }
        return $resultRedirect;
    }
}
