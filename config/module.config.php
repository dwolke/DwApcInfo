<?php
/**
 * DwApcInfo Module
 *
 * module configuration
 *
 * @package    DwApcInfo
 * @author     Daniel Wolkenhauer <wiwoweb@gmail.com>
 * @copyright  Copyright (c) 2013 Daniel Wolkenhauer
 * @link       https://github.com/dwolke/DwApcInfo
 * @version    0.0.1
 */

return array(

  'view_manager' => array(
    'template_path_stack' => array(
      'dwapcinfo' => __DIR__ . '/../view',
    ),
  ),

  'controllers' => array(
    'invokables' => array(
      'dwapcinfo' => 'DwApcInfo\Controller\InfoController',
    ),
  ),

  'router' => array(
    'routes' => array(
      'dwapcinfo' => array(
        'type' => 'Literal',
        'priority' => 1000,
        'options' => array(
          'route' => '/apcinfo',
          'defaults' => array(
            'controller' => 'dwapcinfo',
            'action'     => 'index',
          ),
        ),
      ),
    ),
  ),

);
