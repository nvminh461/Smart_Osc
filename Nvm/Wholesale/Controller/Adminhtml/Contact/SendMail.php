<?php

namespace Nvm\Wholesale\Controller\Adminhtml\Contact;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\Auth\Session;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Translate\Inline\StateInterface;
use Nvm\Wholesale\Api\NvmWholesaleRepositoryInterface;
use Nvm\Wholesale\Model\Contact;

class SendMail extends \Magento\Backend\App\Action implements HttpGetActionInterface
{
    /**
     * @var Contact
     */
    protected Contact $contact;

    /**
     * @var TransportBuilder
     */
    protected TransportBuilder $transportBuilder;

    /**
     * @var StateInterface
     */
    protected StateInterface $inlineTranslation;

    /**
     * @var Session
     */
    protected Session $backendSession;

    /**
     * @var NvmWholesaleRepositoryInterface
     */
    protected NvmWholesaleRepositoryInterface $nvmWholesale;

    protected $resultFactory;

    /**
     * SendMail constructor.
     *
     * @param Context $context
     * @param TransportBuilder $transportBuilder
     * @param StateInterface $inlineTranslation
     * @param ResultFactory $resultFactory
     * @param Session $backendSession
     * @param NvmWholesaleRepositoryInterface $nvmWholesale
     * @param Contact $contact
     */
    public function __construct(
        Action\Context                  $context,
        TransportBuilder                $transportBuilder,
        StateInterface                  $inlineTranslation,
        ResultFactory                   $resultFactory,
        Session                         $backendSession,
        NvmWholesaleRepositoryInterface $nvmWholesale,
        Contact                         $contact
    ) {
        $this->contact = $contact;
        $this->transportBuilder = $transportBuilder;
        $this->inlineTranslation = $inlineTranslation;
        $this->resultFactory = $resultFactory;
        $this->backendSession = $backendSession;
        $this->nvmWholesale = $nvmWholesale;
        parent::__construct($context);
    }

    /**
     * Execute action
     *
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        // 1. Get ID and create model
        $contactId = $this->getRequest()->getParam('contact_id');
        $contactInfo = $this->nvmWholesale->get($contactId);

        // 2. Send email
        try {
            $this->inlineTranslation->suspend();
            $sender = [
                'name' => 'Smart OSC store',
                'email' => 'mn123733@gmail.com'
            ];
            $recipient = $contactInfo->getCustomerEmail();
            $customer = $contactInfo->getCustomerName();
            $product = $contactInfo->getProductName();
            $transport = $this->transportBuilder
                ->setTemplateIdentifier('contact_email_wholesale_template') // Replace with your email template identifier
                ->setTemplateOptions(['area' => \Magento\Framework\App\Area::AREA_ADMINHTML, 'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID])
                ->setTemplateVars([
                    'customer' => $customer,
                    'product' => $product,
                ])
                ->setFrom($sender)
                ->addTo($recipient)
                ->getTransport();

            $transport->sendMessage();

            $this->inlineTranslation->resume();

            $contactInfo->setStatus(1);
            $editorName = $this->backendSession->getUser()->getUserName();
            $contactInfo->setEditor($editorName);
            $this->nvmWholesale->save($contactInfo);

            $this->messageManager->addSuccess(__('You sent the mail.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__('An error occurred while sending the email: %1', $e->getMessage()));
        }

        return $resultRedirect->setPath('*/*/');
    }
}
