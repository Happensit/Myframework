<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 14:09
 */

class Controller
{

    public function loadModel($name) {
		include(APP_DIR .'models/'. $name .'.php');
		$model = new $name();
		return $model;
	}

    public function loadView($name) {
        $view = new View($name);

        // Create an array of all the javascript and css files in assets folder
        $jsdir = glob(ROOT_DIR . "assets/js/*.js");
        $jsdir = str_replace(ROOT_DIR, '/', $jsdir);
        foreach($jsdir as $jsfile) {
            $view->add_js($jsfile);
        }
        $cssdir = glob(ROOT_DIR . "assets/css/*.css");
        $cssdir = str_replace(ROOT_DIR, '/', $cssdir);

        foreach($cssdir as $cssfile) {
            $view->add_css($cssfile);
        }

        $view->meta('keywords', '');
        $view->meta('description', '');
        $view->set('content', "");
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

    public function drupal_sort_css_js($a, $b)
    {
        // First order by group, so that, for example, all items in the CSS_SYSTEM
        // group appear before items in the CSS_DEFAULT group, which appear before
        // all items in the CSS_THEME group. Modules may create additional groups by
        // defining their own constants.
        if ($a['group'] < $b['group']) {
            return -1;
        } elseif ($a['group'] > $b['group']) {
            return 1;
        }
    }

}