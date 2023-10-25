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
     * @return int
     */
    public function getContactId(): int
    {
        return $this->getData(self::CONTACT_ID);
    }

    /**
     * Set contact id
     * @param int $contactId
     * @return $this
     */
    public function setContactId(int $contactId): NvmWholesaleInterface
    {
        $this->setData(self::CONTACT_ID, $contactId);
        return $this;
    }

    /**
     * Get product id
     * @return int
     */
    public function getProductId(): int
    {
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * Set product id
     * @param int $productId
     * @return $this
     */
    public function setProductId(int $productId): NvmWholesaleInterface
    {
        $this->setData(self::PRODUCT_ID, $productId);
        return $this;
    }

    /**
     * Get product name
     * @return string
     */
    public function getProductName(): string
    {
        return $this->getData(self::PRODUCT_NAME);
    }

    /**
     * Set product name
     * @param string $productName
     * @return $this
     */
    public function setProductName(string $productName): NvmWholesaleInterface
    {
        $this->setData(self::PRODUCT_NAME, $productName);
        return $this;
    }

    /**
     * Get customer id
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    /**
     * Set customer id
     * @param int $customerId
     * @return $this
     */
    public function setCustomerId(int $customerId): NvmWholesaleInterface
    {
        $this->setData(self::CUSTOMER_ID, $customerId);
        return $this;
    }

    /**
     * Get customer name
     * @return string
     */
    public function getCustomerName(): string
    {
        return $this->getData(self::CUSTOMER_NAME);
    }

    /**
     * Set customer name
     * @param string $customerName
     * @return $this
     */
    public function setCustomerName(string $customerName): NvmWholesaleInterface
    {
        $this->setData(self::CUSTOMER_NAME, $customerName);
        return $this;
    }

    /**
     * Get customer email
     * @return string
     */
    public function getCustomerEmail(): string
    {
        return $this->getData(self::CUSTOMER_EMAIL);
    }

    /**
     * Set customer email
     * @param string $customerEmail
     * @return $this
     */
    public function setCustomerEmail(string $customerEmail): NvmWholesaleInterface
    {
        $this->setData(self::CUSTOMER_EMAIL, $customerEmail);
        return $this;
    }

    /**
     * Get customer phone
     * @return string
     */
    public function getCustomerPhone(): string
    {
        return $this->getData(self::CUSTOMER_PHONE);
    }

    /**
     * Set customer phone
     * @param string $customerPhone
     * @return $this
     */
    public function setCustomerPhone(string $customerPhone): NvmWholesaleInterface
    {
        $this->setData(self::CUSTOMER_PHONE, $customerPhone);
        return $this;
    }

    /**
     * Get customer message
     * @return string
     */
    public function getCustomerMessage(): string
    {
        return $this->getData(self::CUSTOMER_MESSAGE);
    }

    /**
     * Set customer message
     * @param string $customerMessage
     * @return $this
     */
    public function setCustomerMessage(string $customerMessage): NvmWholesaleInterface
    {
        $this->setData(self::CUSTOMER_MESSAGE, $customerMessage);
        return $this;
    }

    /**
     * Get status
     * @return int
     */
    public function getStatus(): int
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set status
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status): NvmWholesaleInterface
    {
        $this->setData(self::STATUS, $status);
        return $this;
    }

    /**
     * Get banner editor
     * @return string
     */
    public function getEditor(): string
    {
        return $this->getData(self::EDITOR);
    }

    /**
     * Set is_delete
     * @param string $editor
     * @return $this
     */
    public function setEditor(string $editor): NvmWholesaleInterface
    {
        $this->setData(self::EDITOR, $editor);
        return $this;
    }

    /**
     * Get created_at
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt(string $createdAt): NvmWholesaleInterface
    {
        $this->setData(self::CREATED_AT, $createdAt);
        return $this;
    }

    /**
     * Get updated_at
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt(string $updatedAt): NvmWholesaleInterface
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
        return $this;
    }
}
