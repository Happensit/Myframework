<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 14:03
 */

define('ENVIRONMENT', 'development');


//Start the Session
session_start();

define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('APP_DIR', ROOT_DIR .'app/');

// Includes
require_once ROOT_DIR.'/autoload.php';

// Define base PATH
define("BASE_PATH", dirname(__FILE__));
define('BASE_URL', Config::get('URL'));

new Sft();