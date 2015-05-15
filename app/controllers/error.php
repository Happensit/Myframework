<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 14:28
 */

class Error extends Controller {

    function index(){
        $this->error404();
    }

    function error404() {
        echo '<h1>404 Error</h1>';
        echo '<p>Looks like this page doesn\'t exist</p>';
    }
}