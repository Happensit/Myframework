<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 16:36
 */

class About extends Controller{

    public function index(){
        $template = $this->loadView('about_view');
        $template->set('content', "Тут какой-то контент");
        $template->meta('keywords', "keywords content");
        $template->meta('description', "Description content");
        $template->render();
    }
}