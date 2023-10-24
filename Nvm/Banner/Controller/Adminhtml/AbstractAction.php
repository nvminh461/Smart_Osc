<?php

declare(strict_types=1);

namespace Nvm\Banner\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;

/**
 * Class AbstractAction Controller
 * @package Nvm\Banner\Controller\Adminhtml
 */
abstract class AbstractAction extends Action
{
    /**
     * Init page
     *
     * @param Page $resultPage
     * @return Page
     */
    public function initPage(Page $resultPage): Page
    {
        $resultPage->setActiveMenu('Magento_Catalog::catalog_products');
        return $resultPage;
    }
}
