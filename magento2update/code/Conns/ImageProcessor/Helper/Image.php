<?php
namespace Conns\ImageProcessor\Helper;
class Image extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $_dir;
    protected $_medix;
    protected $_filesystem;
    protected $_imagefactory;
    protected $_productRepository;
    protected $_productImageHelper;
    protected $_imageFile;
    protected $_width;
    protected $_height;
    protected $_scheduleResize;

    //@todo Mage::getDesign()->getSkinUrl($this->getPlaceholder());

        public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\Filesystem\DirectoryList $dir,
        //\Magento\Framework\UrlInterface::URL_TYPE_MEDIA $medix,
         \Magento\Framework\Filesystem $filesystem,         
        \Magento\Framework\Image\AdapterFactory $imageFactory, 
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Catalog\Helper\Image $productImageHelper
    ) {
        $this->_dir = $dir;
        $this->_filesystem = $filesystem;               
        $this->_imageFactory = $imageFactory; 
        //$this->storeManager = $storeManager; 
        $this->_productRepository = $productRepository;
        $this->_productImageHelper = $productImageHelper;
        parent::__construct($context);
      }
    
    protected function _reset()
    {
        $this->_scheduleResize = NULL;
        $this->_imageFile      = NULL;
        $this->_width          = NULL;
        $this->_height         = NULL;

        return $this;
    }

    public function init($imageFile = NULL)
    {
        $this->_reset();
        if ($imageFile) {
            $this->setImageFile($imageFile);
        }

        return $this;
    }

    public function resize($width, $height = NULL)
    {
        $this->setWidth($width);
        $this->setHeight($height);
        $this->_scheduleResize = true;

        return $this;
    }

    protected function setWidth($width)
    {
        if ($width) {
            $this->_width = $width;
        }

        return $this;
    }

    protected function getWidth()
    {
        return $this->_width;
    }

    protected function setHeight($height)
    {
        if ($height) {
            $this->_height = $height;
        }

        return $this;
    }

    protected function getHeight()
    {
        return $this->_height;
    }

    protected function getSizeDir()
    {
        $path = '';
        if ($this->_scheduleResize) {
            $path = $this->getWidth() . 'x' . $this->getHeight() . DS;
        }

        return $path;
    }

    protected function getResizeScheduled()
    {
        if ($this->_scheduleResize) {
            return true;
        }

        return false;
    }

    public function __toString()
    {
        try {
            //$sourcePath = Mage::getBaseDir('media') . DS . $this->getImageFile();
            $sourcePath = $this->_dir->getUrlPath('media'). DS . $this->getImageFile();

            if ($this->getImageFile()) {
                if ($this->getResizeScheduled()) {
                    $pathinfo = pathinfo($this->getImageFile());
                    $targetPath = $pathinfo['dirname'] . DS . $this->getSizeDir() . $pathinfo['basename'];
                  //  $cachedPath = Mage::getBaseDir('media') . DS . 'catalog/product/cache' . DS . $targetPath;
                    $cachedPath = $this->_dir->getUrlPath('media'). DS .'catalog/product/cache' . DS . $targetPath;
                    if (!file_exists($cachedPath.$image)) {
                       $imageFactory  =  $this->_imageFactory->init($product, $imageId);
                       // $image = new Varien_Image($sourcePath);
                        $imageFactory->constrainOnly(false);
                        $imageFactory->keepAspectRatio(true);
                        $imageFactory->keepFrame(true);
                        $imageFactory->keepTransparency(true);
                        $imageFactory->resize($this->getWidth(), $this->getHeight());
                        $imageFactory->save($cachedPath);
                    }
                  //  $url = Mage::getBaseUrl('media') . 'catalog/product/cache' . DS . $targetPath;
                    $url = $this->_dir->getUrlPath('media'). DS .'catalog/product/cache' . DS . $targetPath;
                } else {
                 //   $url = Mage::getBaseUrl('media') . $this->getImageFile();
                    $url = $currentStore->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA). $this->getImageFile();

                  //  $url = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA). $this->getImageFile();
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            $url = '';
        }

        return $url;
    }

    protected function setImageFile($file)
    {
        $this->_imageFile = $file;

        return $this;
    }

    protected function getImageFile()
    {
        return $this->_imageFile;
    }
}

