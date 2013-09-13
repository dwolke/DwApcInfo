<?php
/**
 * DwApcInfo Module
 *
 * Zeigt APC Cache Informationen an
 *
 * @package    DwApcInfo
 * @author     Daniel Wolkenhauer <wiwoweb@gmail.com>
 * @copyright  Copyright (c) 2013 Daniel Wolkenhauer
 * @link       https://github.com/dwolke/DwApcInfo
 * @version    0.0.1
 */

namespace DwApcInfo;

use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
//use Zend\ModuleManager\Feature\ServiceProviderInterface;


/**
 * module class
 *
 * @package    DwApcInfo
 */
class Module implements
  AutoloaderProviderInterface,
  ConfigProviderInterface
  /*ServiceProviderInterface*/
{


  /**
   * Returns an array for passing to Zend\Loader\AutoloaderFactory.
   *
   * @return array
   */
  public function getAutoloaderConfig()
  {
    return array(
      'Zend\Loader\ClassMapAutoloader' => array(
        __DIR__ . '/autoload_classmap.php',
      ),
      'Zend\Loader\StandardAutoloader' => array(
        'namespaces' => array(
          __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
        ),
      ),
    );

  }


  /**
   * Returns the module configuration to merge with application configuration
   *
   * @return array|\Traversable
   */
  public function getConfig()
  {
    return include __DIR__ . '/config/module.config.php';
  }

}
