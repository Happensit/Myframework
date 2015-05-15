<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 24.02.2015
 * Time: 14:19
 */

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

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