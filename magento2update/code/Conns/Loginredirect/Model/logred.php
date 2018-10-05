<?php

namespace Conns\Loginredirect\Model;
use Conns\Creditapp\Helper\Url;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class logred extends \Magento\Framework\Model\AbstractModel implements ObserverInterface
{

    protected $_coreSession;
    protected $_customerSession;
    protected $_eventManager;
    protected $_urlhelper;

    public function _construct(
        \Magento\Framework\Session\SessionManagerInterface $coreSession,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\Event\Manager $eventManager,
        \Magento\Framework\App\FrontController 

        array $data = [])
    {
        $this->_init('Conns\Loginredirect\Model');
        $this->_coreSession = $coreSession;
        $this->_customerSession = $customerSession;
        $this->_eventManager = $eventManager;
        $this->_urlhelper = $urlhelper;
    
    }

    /**
     *Method returns links for redirecting
     *
     * @return array
     */
    protected function getLinks()
    {
        return array(


          //  Mage::helper('creditapp/url')->getFormUrl()
            $this->_urlHelper->getFormUrl()

        );
    }

    protected function getSession()
    {
        return $this->_coreSession->start();
      //  return Mage::getSingleton('core/session');
    }

    /**
     * Method checks whether http_refer is equal one of links from getLinks.
     * If yes then customer will be redirected on this link after autorization
     *\Magento\Framework\Event\Observer
     * @param Varien_Event_Observer $observer
     */
    public function customerLogin(\Magento\Framework\Event\Observer $observer)
    {
        $_links          = $this->getLinks();
        $_session        = $this->getSession();
        $_original_refer = $_session->getRefer();
        if ($_original_refer) {
            $_refer = str_replace('http://', '', $_original_refer);
            $_refer = str_replace('https://', '', $_refer);
            $_refer = str_replace('www.', '', $_refer);
            foreach ($_links as $original_link) {
                $link = str_replace('http://', '', $original_link);
                $link = str_replace('https://', '', $link);
                $link = str_replace('www.', '', $link);
                if ($link == $_refer) {

                    $_session_customer = $customer = $this->_customerSession->getCustomer();
                    $_session_customer = $customer = $this->_customerSession->getCustomer();
                    $_session_customer->setBeforeAuthUrl($original_link);
                    $_session->setRefer(NULL);
                    break;
                }
            }
        }
    }

    /**
     *Method stores http_refer
     *
     * @param Varien_Event_Observer $observer
     */
    public function beforeLogin(\Magento\Framework\Event\Observer $observer)
    {
        //@TODO need checking if autentificate is failed
        $_session = $this->getSession();
        $_session->setRefer($_session->getData('visitor_data/http_referer'));
        $this->eventManager->dispatch('Conns_Loginredirect_event_test');
    }

    public function afterLogout(\Magento\Framework\Event\Observer $observer)
    {
        
        $this->_coreSession->start();
    //    $session = Mage::getSingleton('core/session');
        $session->setCreditFormData(NULL);
    //    $this->eventManager->dispatch('Conns_Loginredirect_event_test');
        $this->eventManager->dispatch('Conns_Loginredirect_event_test');
    }
}