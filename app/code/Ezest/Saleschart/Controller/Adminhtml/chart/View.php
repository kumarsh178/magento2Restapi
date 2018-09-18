<?php
namespace Ezest\Saleschart\Controller\Adminhtml\chart;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class View extends \Magento\Backend\App\Action
{
	 /**
     * @var PageFactory
     */
    protected $resultPagee;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

	/**
     * Index action
     *
     * @return void
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Ezest_Saleschart::manage');
        $resultPage->addBreadcrumb(__('Ezest'), __('Ezest'));
        $resultPage->addBreadcrumb(__('Saleschart'), __('View Chart'));
        $resultPage->getConfig()->getTitle()->prepend(__('Sales Chart'));

        return $resultPage;
    }
	/**
     * Check Permission.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Ezest_Saleschart::chart');
    }
}	