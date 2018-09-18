<?php namespace InfieldDigital\Sample\Controller\Checkout;

use InfieldDigital\Sample\Config\GeneralConfig;
use Magento\Checkout\Helper\Cart;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Checkout\Model\Session;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\ResultFactory;
use Magento\Quote\Model\GuestCart\GuestCartRepository;
use Magento\Quote\Model\Quote;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Integration\Model\Oauth\Token;
use Magento\Webapi\Model\Authorization\TokenUserContext;

class Index extends Action
{
    /**
     * @var \Magento\Framework\App\Request\Http
     */
    private $request;
    /**
     * @var Context
     */
    private $context;
    /**
     * @var GeneralConfig
     */
    private $generalConfig;
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * @inheritDoc
     */
    public function __construct(Context $context,
                                Http $request,
                                GeneralConfig $generalConfig,
                                CustomerRepositoryInterface $customerRepository)
    {
        parent::__construct($context);
        $this->request = $request;
        $this->context = $context;
        $this->generalConfig = $generalConfig;
        $this->customerRepository = $customerRepository;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        /** @var Session $checkoutSession */
        $checkoutSession = $objectManager->create(CheckoutSession::class);
        /** @var Token $token */
        $token = $objectManager->create(Token::class);

        /** @var CustomerSession $customerSession */
        $customerSession = $objectManager->create(CustomerSession::class);

        $guestCartId = $this->request->get("cartId");
        $customerToken = $this->request->get("customer");

        //For now we have to check if the guestCartId is an int because a true guest cart will be a hash value
        //i.e. not an int, where as a logged in user will have an integer value for a cart id as it's actually
        //the internal magento id.
        if($customerToken && is_int($guestCartId)){

            //Lookup customer from customer token
            /** @var Token $oauthToken */
            $oauthToken = $token->loadByToken($customerToken);
            $customerId = $oauthToken->getCustomerId();
            $customer = $this->customerRepository->getById($customerId);

            if(! $customer ){
                die("UNABLE TO LOGIN");
            }
            $customerSession->setCustomerDataAsLoggedIn($customer);
            $customerSession->regenerateId();

        }
        else if($guestCartId){
            /** @var GuestCartRepository $thing2 */
            $guestCartRepository = $objectManager->create(GuestCartRepository::class);
            $quote = $guestCartRepository->get($guestCartId);
            $checkoutSession->setQuoteId($quote->getId());
        }

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('checkout');
        return $resultRedirect;
    }

}