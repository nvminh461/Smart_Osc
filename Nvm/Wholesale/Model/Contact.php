<?php

declare(strict_types=1);

namespace Nvm\Wholesale\Model;

use Magento\Framework\Model\AbstractModel;
use Nvm\Wholesale\Api\Data\NvmWholesaleInterface;

class Contact extends AbstractModel implements NvmWholesaleInterface
{
    protected function _construct(): void
    {
        $this->_init(\Nvm\Wholesale\Model\ResourceModel\Contact::class);
    }

    /**
     * Get contact id
     */
    public function getContactId()
    {
        return $this->getData(self::CONTACT_ID);
    }

    /**
     * Set contact id
     * @param int $contactId
     * @return $this
     */
    public function setContactId($contactId): NvmWholesaleInterface
    {
        $this->setData(self::CONTACT_ID, $contactId);
        return $this;
    }

    /**
     * Get product id
     */
    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * Set product id
     * @param int $productId
     * @return $this
     */
    public function setProductId($productId): NvmWholesaleInterface
    {
        $this->setData(self::PRODUCT_ID, $productId);
        return $this;
    }

    /**
     * Get product name
     */
    public function getProductName()
    {
        return $this->getData(self::PRODUCT_NAME);
    }

    /**
     * Set product name
     * @param string $productName
     * @return $this
     */
    public function setProductName($productName): NvmWholesaleInterface
    {
        $this->setData(self::PRODUCT_NAME, $productName);
        return $this;
    }

    /**
     * Get customer id
     */
    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    /**
     * Set customer id
     * @param int $customerId
     * @return $this
     */
    public function setCustomerId($customerId): NvmWholesaleInterface
    {
        $this->setData(self::CUSTOMER_ID, $customerId);
        return $this;
    }

    /**
     * Get customer name
     */
    public function getCustomerName()
    {
        return $this->getData(self::CUSTOMER_NAME);
    }

    /**
     * Set customer name
     * @param string $customerName
     * @return $this
     */
    public function setCustomerName($customerName): NvmWholesaleInterface
    {
        $this->setData(self::CUSTOMER_NAME, $customerName);
        return $this;
    }

    /**
     * Get customer email
     */
    public function getCustomerEmail()
    {
        return $this->getData(self::CUSTOMER_EMAIL);
    }

    /**
     * Set customer email
     * @param string $customerEmail
     * @return $this
     */
    public function setCustomerEmail($customerEmail): NvmWholesaleInterface
    {
        $this->setData(self::CUSTOMER_EMAIL, $customerEmail);
        return $this;
    }

    /**
     * Get customer phone
     */
    public function getCustomerPhone()
    {
        return $this->getData(self::CUSTOMER_PHONE);
    }

    /**
     * Set customer phone
     * @param string $customerPhone
     * @return $this
     */
    public function setCustomerPhone($customerPhone): NvmWholesaleInterface
    {
        $this->setData(self::CUSTOMER_PHONE, $customerPhone);
        return $this;
    }

    /**
     * Get customer message
     */
    public function getCustomerMessage()
    {
        return $this->getData(self::CUSTOMER_MESSAGE);
    }

    /**
     * Set customer message
     * @param string $customerMessage
     * @return $this
     */
    public function setCustomerMessage($customerMessage): NvmWholesaleInterface
    {
        $this->setData(self::CUSTOMER_MESSAGE, $customerMessage);
        return $this;
    }

    /**
     * Get status
     * @return int
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set status
     * @param int $status
     * @return $this
     */
    public function setStatus($status): NvmWholesaleInterface
    {
        $this->setData(self::STATUS, $status);
        return $this;
    }

    /**
     * Get banner editor
     */
    public function getEditor()
    {
        return $this->getData(self::EDITOR);
    }

    /**
     * Set is_delete
     * @param string $editor
     * @return $this
     */
    public function setEditor($editor): NvmWholesaleInterface
    {
        $this->setData(self::EDITOR, $editor);
        return $this;
    }

    /**
     * Get created_at
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt): NvmWholesaleInterface
    {
        $this->setData(self::CREATED_AT, $createdAt);
        return $this;
    }

    /**
     * Get updated_at
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt): NvmWholesaleInterface
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
        return $this;
    }
}
