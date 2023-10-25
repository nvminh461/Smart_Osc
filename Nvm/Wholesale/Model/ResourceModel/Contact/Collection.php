<?php

namespace Nvm\Wholesale\Model\ResourceModel\Contact;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Nvm\Wholesale\Model\Contact as ContactModel;
use Nvm\Wholesale\Model\ResourceModel\Contact as ContactResource;

class Collection extends AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(ContactModel::class, ContactResource::class);
    }
}
