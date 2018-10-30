<?php
namespace BlogTreat\CustomOption\Observer;
 
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
 
class SalesModelServiceQuoteSubmitBeforeObserver implements ObserverInterface
{
    private $quoteItems = [];
 
    private $quote = null;
 
    private $order = null;
 
    /**
     * @param EventObserver $observer
     * @return void
     */
    public function execute(EventObserver $observer)
    {
        $this->quote = $observer->getQuote();
        $this->order = $observer->getOrder();
 
        /* @var  \Magento\Sales\Model\Order\Item $orderItem */
        foreach($this->order->getItems() as $orderItem)
        {
            if(!$orderItem->getParentItemId() && $orderItem->getProductType() == \Magento\Catalog\Model\Product\Type::TYPE_SIMPLE)
            {
                if($quoteItem = $this->getQuoteItemById($orderItem->getQuoteItemId())) {
                    if ($additionalOptionsQuote = $quoteItem->getOptionByCode('additional_options')) {
                        if($additionalOptionsOrder = $orderItem->getProductOptionByCode('additional_options')) {
                            $additionalOptions = array_merge($additionalOptionsQuote, $additionalOptionsOrder);
                        }
                        else {
                            $additionalOptions = $additionalOptionsQuote;
                        }
                        if(count($additionalOptions) > 0) {
                            $options = $orderItem->getProductOptions();
                            $options['additional_options'] = unserialize($additionalOptions->getValue());
                            $orderItem->setProductOptions($options);
                        }
                    }
                }
            }
        }
    }
    private function getQuoteItemById($id)
    {
        if(empty($this->quoteItems)) {
            /* @var  \Magento\Quote\Model\Quote\Item $item */
            foreach($this->quote->getItems() as $item) {
                if(!$item->getParentItemId() && $item->getProductType() == \Magento\Catalog\Model\Product\Type::TYPE_SIMPLE) {
                    $this->quoteItems[$item->getId()] = $item;
                }
            }
        }
        if(array_key_exists($id, $this->quoteItems)) {
            return $this->quoteItems[$id];
        }
        return null;
    }
}