<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 14:30
 */

class MainController extends Controller
{
    function actionIndex() {
//      $model =$this->loadModel('catalog_model');
//      $products = $model->findAll();
        $template = $this->loadView('main_view');
        $template->set('content', "");
      //$template->set('products', $products);
        $template->render();
    }
}