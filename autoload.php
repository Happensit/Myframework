<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 14:04
 */
function _autoload($className) {
  $filename = "framework/" . $className . ".php";
  if (is_readable($filename)) {
	require $filename;
  }
}

spl_autoload_register("_autoload");