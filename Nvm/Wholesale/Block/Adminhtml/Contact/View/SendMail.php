<?php

declare(strict_types=1);

namespace Nvm\Wholesale\Block\Adminhtml\Contact\View;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Nvm\Wholesale\Model\Contact;

class SendMail extends GenericButton implements ButtonProviderInterface
{
    /**
     * @var Contact
     */
    protected Contact $contact;

    /**
     * SendMail constructor.
     *
     * @param Context $context
     * @param Contact $contact
     */
    public function __construct(
        Context $context,
        Contact $contact,
    ) {
        $this->contact = $contact;
        parent::__construct($context);
    }

    /**
     * Get button data
     *
     * @return array
     */
    public function getButtonData(): array
    {
        $buttonData = [];
        $contactId = $this->getContactId();

        // Load the contact model to check the status
        $contactModel = $this->contact->load($contactId);

        // Get the status value
        $status = $contactModel->getStatus();

        // Check the status value and conditionally add the button data
        if ($status == 0) {
            $buttonData = [
                'label' => __('Send Mail'),
                'on_click' => sprintf("location.href = '%s';", $this->SendMailUrl()),
                'class' => 'save primary',
                'sort_order' => 20
            ];
        }
        return $buttonData;
    }

    /**
     * Get the URL for sending mail
     *
     */
    public function SendMailUrl()
    {
        $contactId = $this->getContactId();
        return $this->getUrl('*/*/sendmail', ['contact_id' => $contactId]);
    }
}
