<?php
/**
 * DwApcInfo Module
 * 
 * @package    DwApcInfo
 * @author     Daniel Wolkenhauer <wiwoweb@gmail.com>
 * @copyright  Copyright (c) 2013 Daniel Wolkenhauer
 * @link       https://github.com/dwolke/DwApcInfo
 * @version    0.0.1
 */

namespace DwApcInfo\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


/**
 * Info Controller - Cache Infos...
 */
class InfoController extends AbstractActionController
{

  const CONTROLLER_NAME    = 'dwapcinfo';


  /**
   * Info page
   */
  public function indexAction()
  {

    $err = '';

    if(!function_exists('apc_cache_info') || !($cache=@apc_cache_info($cache_mode))) {
      $err = 'Keine Informationen zum Cache verfügbar. APC ist nicht installiert.';
      //exit;
    } else {

      $err = 'APC ist installiert und läuft.';

      $generalCacheInfo = $this->getGeneralCacheInfo($cache);

    }

    $view = new ViewModel();
    $view->setVariables(array(
      'info_msg' => $err,
      'general_info' => $generalCacheInfo,
    ));

    return $view;

  }


  /**
   * Liefert allgemeine Informationen
   *
   * @param array $cache apc_cache_info
   * @return array Array mit allgemeinen Informationen
   */
  private function getGeneralCacheInfo($cache)
  {

    $info = array();

    $info['apc_version'] = phpversion('apc');
    $info['php_version'] = phpversion();

    $host = php_uname('n');

    if ($host) { $host = '('.$host.')'; }

    if (isset($_SERVER['SERVER_ADDR'])) {
      $host .= ' ('.$_SERVER['SERVER_ADDR'].')';
    }

    if (!empty($_SERVER['SERVER_NAME'])) {
      $info['apc_host'] = $_SERVER['SERVER_NAME'] . ' ' . $host;
    }

    if (!empty($_SERVER['SERVER_SOFTWARE'])) {
      $info['server_software'] = $_SERVER['SERVER_SOFTWARE'];
    }

    $mem=apc_sma_info();


    $num_seg = $mem['num_seg'];
    $seg_size = $this->bsize($mem['seg_size']);

    $info['num_shm_seg'] = $num_seg;
    $info['shm_seg_size'] = $seg_size;
    $info['memory_type'] = $cache['memory_type'];
    $info['locking_type'] = $cache['locking_type'];
    $info['start_time'] = date('d.m.Y H:i:s', $cache['start_time']);
    $info['uptime'] = $this->duration($cache['start_time']);
    $info['file_upload_support'] = $cache['file_upload_progress'];

    return $info;

  }


  /**
   * Formatiert Byte-Werte
   *
   * @param integer $s
   * @return string
   */
  private function bsize($s) {

    foreach (array('','K','M','G') as $i => $k) {
      if ($s < 1024) break;
      $s/=1024;
    }

    return sprintf("%5.1f %sBytes",$s,$k);

  }


  /**
   * Errechnet die Zeitdifferenz zwischen einer Startzeit und der
   * aktuellen Zeit.
   *
   * @param int $ts Zeitangabe
   * @return string Zeitdauer
   */


  private function duration($ts) {

    //global $time;

    $time = time();

    $years = (int)((($time - $ts)/(7*86400))/52.177457);
    $rem = (int)(($time-$ts)-($years * 52.177457 * 7 * 86400));
    $weeks = (int)(($rem)/(7*86400));
    $days = (int)(($rem)/86400) - $weeks*7;
    $hours = (int)(($rem)/3600) - $days*24 - $weeks*7*24;
    $mins = (int)(($rem)/60) - $hours*60 - $days*24*60 - $weeks*7*24*60;
    $str = '';

    if($years==1) $str .= "$years year, ";
    if($years>1) $str .= "$years years, ";
    if($weeks==1) $str .= "$weeks week, ";
    if($weeks>1) $str .= "$weeks weeks, ";
    if($days==1) $str .= "$days day,";
    if($days>1) $str .= "$days days,";
    if($hours == 1) $str .= " $hours hour and";
    if($hours>1) $str .= " $hours hours and";
    if($mins == 1) $str .= " 1 minute";
    else $str .= " $mins minutes";

    return $str;

  }

}
