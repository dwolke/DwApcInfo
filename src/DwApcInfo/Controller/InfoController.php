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

    return new ViewModel(
      array(
        'Foo' => 'Bar',
      ));

  }

}
