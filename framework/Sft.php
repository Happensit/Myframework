<?php

/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 14:12
 */

//namespace sft;

class Sft
{

    protected static $instance;

    /**
     * @return Singleton
     */
    final public static function getInstance()	 // Возвращает единственный экземпляр класса. @return Singleton
    {
        static $instance = null;

        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    final protected function __clone() {} // Защищаем от создания через клонирование
    protected function __wakeup() {}

    public function __construct()
    {
        $controllerName = Config::get('DefaultController');
        $actionName = 'index';
        $params = array();
        $routeArr = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routeArr[1])) {
            $controllerName = ucfirst($routeArr[1]);
        }
        if (!empty($routeArr[2])) {
            $end = strpos($routeArr[2], '?');
            if ($end > 0) {
                $actionName = substr($routeArr[2], 0, $end);
            } else {
                $actionName = $routeArr[2];
            }
        }
        if (count($routeArr) > 3) { //Если кроме "/контроллера/экшна" в пути есть что-то еще - передаём в массив параметров
            for ($i = 3; $i < count($routeArr); $i++) {
                $end = strpos($routeArr[$i], '?');
                if ($end > 0) {
                    $params[] = substr($routeArr[$i], 0, $end);
                } else {
                    $params[] = $routeArr[$i];
                }
            }
        }
        if (!empty($_REQUEST)) {
            foreach ($_REQUEST as $key => $value) {
                $params[$key] = $value;
            }
        }

        // Get our controller file
        $path = APP_DIR . 'controllers/' . $controllerName . 'Controller.php';
        if (file_exists($path)) {
            include_once($path);
        }
        else {
            $controllerName = Config::get('ErrorController');
            include_once(APP_DIR . 'controllers/' . $controllerName . 'Controller.php');
        }

        // Check the action exists
        if (!method_exists($controllerName .'Controller', "action".$actionName)) {
            $controllerName = Config::get('ErrorController');
            include_once(APP_DIR . 'controllers/' . $controllerName . 'Controller.php');
            $actionName = 'Index';
        }

        $controllerName = $controllerName .'Controller';
        $controller = new $controllerName;
        $action = "action".$actionName;
        $controller->$action($params);

    }


    public static function getVersion()
    {
        return '0.0.1';
    }

    public static function route()
    {

    }
}