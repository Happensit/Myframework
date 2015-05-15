<?php

/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 15:28
 */

class Config extends Singleton {

    private static $config;

    public static function get($key) {
        if (!self::$config) {
            self::$config = require(ROOT_DIR .'app/config/' . Environment::get() . '.php');
        }
        return self::$config[$key];
    }
}