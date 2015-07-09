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

return [
    'URL' => 'http://' . $_SERVER['HTTP_HOST'] . str_replace('public', '', dirname($_SERVER['SCRIPT_NAME'])) .'/',
    'AppName' => 'Sft-framework',
    'DefaultController' => 'Main',
    'DefaultAction' => 'index',
    'ErrorController' => 'Error',

    'DbType' => 'mysql',
    'DbHost' => '127.0.0.1',
    'DbName' => 'drupal8',
    'DbUser' => 'root',
    'DbPass' => 'root',
    'DbPort' => '3306',
    'DbCharset' => 'utf8',
    //'DbPrefix' => 'sh_',

];