<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 14:03
 */


defined('ENVIRONMENT') or define('ENVIRONMENT', 'dev');
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', ROOT_DIR.'app/');

require(__DIR__ . '/vendor/autoload.php');

Sft::getInstance();