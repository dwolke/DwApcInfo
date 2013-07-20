<?php

namespace DwApcInfo\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class InfoController extends AbstractActionController
{

  const CONTROLLER_NAME    = 'dwapcinfo';

  /**
   * Info page
   */
  public function indexAction()
  {

    // if (!$this->zfcUserAuthentication()->hasIdentity()) {
    //   return $this->redirect()->toRoute(static::ROUTE_LOGIN);
    // }

    $err = '';

    if (!function_exists('apc_cache_info') || !($cache=@apc_cache_info($cache_mode))) {
      $err = 'Keine Informationen zum Cache verfügbar. APC ist nicht installiert.';
      //exit;
    } else {
      $err = 'APC ist installiert und läuft.';
    }

    return new ViewModel(
      array(
        'info_msg' => $err,
      ));

  }

}
