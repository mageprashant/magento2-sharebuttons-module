<?php
namespace MagePrashant\ShareButtons\Block\Widget;

class ShareButtons extends \Magento\Framework\View\Element\Template {

	protected $_template = 'buttons.phtml';

	protected $_scopeConfig;
	protected $_registry;
	private $product;
	
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Magento\Framework\Registry $registry ,
		array $data = []
	) {
		parent::__construct($context, $data);
		$this->_scopeConfig = $context->getScopeConfig();
		$this->_registry = $registry;
	}

    /**
     * @return Product
     */
    private function getProduct()
    {
        if (is_null($this->product)) {
            $this->product = $this->_registry->registry('product');
        }

        return $this->product;
    }

	public function getProductName()
    {
		if(!$this->getProduct()){
			return null;
		}
		return $this->getProduct()->getName();
    }
	
	public function getIsEnabled()
    {
        return $this->getData('is_enabled');
    }
	
	public function getIsFacebookEnabled()
    {
        return $this->getData('is_facebook_enabled');
    }
	
	public function getIsTwitterEnabled()
    {
        return $this->getData('is_twitter_enabled');
    }
	
	public function getIsGoogleEnabled()
    {
        return $this->getData('is_google_enabled');
    }

	public function getIsPinterestEnabled()
    {
        return $this->getData('is_pinterest_enabled');
    }

	public function getIsPrintEnabled()
    {
        return $this->getData('is_print_enabled');
    }	
}