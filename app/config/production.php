<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.15
 * Time: 14:38
 */

error_reporting(0);

return array(
  'URL' => 'http://' . $_SERVER['HTTP_HOST'] . str_replace('public', '', dirname($_SERVER['SCRIPT_NAME'])) .'/',
  'AppName' => 'Sft-framework',
  'DefaultController' => 'main',
  'DefaultAction' => 'index',
  'ErrorController' => 'error',

  'DbType' => 'mysql',
  'DbHost' => '127.0.0.1',
  //'DbName' => 'frmeworkshop',
  'DbName' => '',
  'DbUser' => 'root',
  'DbPass' => 'root',
  'DbPort' => '3306',
  'DbCharset' => 'utf8',
  'DbPrefix' => 'sh_',

);