<?php

declare(strict_types=1);

namespace Nvm\Wholesale\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Contact extends AbstractDb
{
    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init('nvm_wholesale_contact', 'contact_id');
    }
}
