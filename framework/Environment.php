<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.15
 * Time: 15:29
 */

class Environment {
    public static function get()    {
        return (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : "development");
    }
}