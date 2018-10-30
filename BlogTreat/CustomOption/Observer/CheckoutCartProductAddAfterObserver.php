<?php
namespace BlogTreat\CustomOption\Observer;
 
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
 
class CheckoutCartProductAddAfterObserver implements ObserverInterface
{
    /**
     * @var \Magento\Framework\View\LayoutInterface
     */
    protected $_layout;
     
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;
     
    protected $_request;
 
    /**
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\View\LayoutInterface $layout
     */
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\View\LayoutInterface $layout,
        \Magento\Framework\App\RequestInterface $request
    ) {
        $this->_layout = $layout;
        $this->_storeManager = $storeManager;
        $this->_request = $request;
    }
 
    /**
     * @param EventObserver $observer
     * @return void
     */
    public function execute(EventObserver $observer)
    {
        /* @var \Magento\Quote\Model\Quote\Item $item */
        $item = $observer->getQuoteItem();
        $additionalOptions = array();
        if ($additionalOption = $item->getOptionByCode('additional_options')) {
            $additionalOptions = (array) unserialize($additionalOption->getValue());
        }
        $post = $this->_request->getParam('blogtreat');
        if(is_array($post)) {
            foreach($post as $key => $value) {
                if($key == '' || $value == '') {
                    continue;
                }
                $additionalOptions[] = [
                    'label' => $key,
                    'value' => $value
                ];
            }
        }
        if(count($additionalOptions) > 0) {
            $item->addOption([
                'code' => 'additional_options',
                'value' => serialize($additionalOptions)
            ]);
        }
    }
}