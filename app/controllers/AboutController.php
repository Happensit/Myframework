<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 16:36
 */

class AboutController extends Controller{

    public function actionIndex(){
        $template = $this->loadView('about_view');
        $template->set('content', "Тут текст \"О нас \" ");
        $template->meta('keywords', "keywords content");
        $template->meta('description', "Description content");
        $template->render();
    }
}