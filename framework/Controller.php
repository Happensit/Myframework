<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 14:09
 */

class Controller extends Singleton {

    public function loadModel($name) {
		include(APP_DIR .'models/'. strtolower($name) .'.php');
		$model = new $name();
		return $model;
	}

    public function loadView($name) {
        $view = new View($name);
        $view->add_css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css');
        $view->add_css("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css");
        $view->add_js("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js");
        $view->add_js("https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js");
        $view->meta('keywords', '');
        $view->meta('description', '');
        return $view;
    }


	public function loadHelper($name) {
        include(APP_DIR .'helpers/'. strtolower($name) .'.php');
        $helper = new $name();
         return $helper;
    }

	public function redirect($loc) {
        header('Location: '. Config::get('BaseURL') . $loc);
        exit;
    }

}