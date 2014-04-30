<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 15:13
 */

namespace AmuletOfDragon;


use AmuletOfDragon\Exception\AmuletOfDragonException;
use AmuletOfDragon\Helper\StrHelper;
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Router;

/**
 * Class Amulet
 * @package AmuletOfDragon
 */
class Amulet {
    protected static $instance = null;
    /**
     * @var Config
     */
    protected $_config = null;

    private function __construct(){

    }

    public function start() {
        if(is_null($this->getConfig())){
            throw new AmuletOfDragonException("Config is null");
        }
        $builder = $this->build();
        $builder->set("dm", $this->createDocumentManager());
        Registry::add(Registry::BUILDER, $builder);
    }

    /**
     * @return null|Amulet
     */
    public static function getInstance() {
        if(is_null(static::$instance)){
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * @return \AmuletOfDragon\Config
     */
    public function getConfig()
    {
        return $this->_config;
    }

    /**
     * @param \AmuletOfDragon\Config $config
     */
    public function setConfig(Config $config)
    {
        $this->_config = $config;
    }

    protected function build(){
        $builder = new ContainerBuilder();
        $dir = $this->getConfig()->SERVICES_PATH;
        $dir = StrHelper::replaceKeyWords($dir);
        $locator = new FileLocator($dir, $dir);
        $loader = new YamlFileLoader($builder, $locator);
        $loader->load("services.yml");
        return $builder;
    }



    protected function createDocumentManager() {
        AnnotationDriver::registerAnnotationClasses();

        $config = new Configuration();
        $config->setProxyDir(StrHelper::replaceKeyWords($this->getConfig()->DOCTRINE->PROXY_DIR));
        $config->setProxyNamespace($this->getConfig()->DOCTRINE->PROXY_NAMESPACE);
        $config->setHydratorDir(StrHelper::replaceKeyWords($this->getConfig()->DOCTRINE->HYDRATOR_DIR));
        $config->setHydratorNamespace($this->getConfig()->DOCTRINE->HYDRATOR_NAMESPACE);
        $config->setMetadataDriverImpl(AnnotationDriver::create(StrHelper::replaceKeyWords($this->getConfig()->DOCTRINE->DOCUMENTS_CLASSES_DIR)));
        $config->setDefaultDB($this->getConfig()->DOCTRINE->DB);
        $dm = DocumentManager::create(new Connection(), $config);
        return $dm;
    }
} 