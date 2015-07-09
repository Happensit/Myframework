<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 19:11
 */

class Portfolio extends Controller{

    public function index(){

        $model = $this->loadModel('portfolio_model');
      //Create
//        $model->email = "test@test.te";
//        $model->role  = "1";
//        $model->name  = "Test User";
//        $model->blocked  = 0;
//        $model->activity  = 1;
//        $example = $model->Create();

      // Find All in table
      $example = $model->findAll();

      //Find by id
//      $model->id = "5";
//      $example = $model->findByid();

      // Min
     // $example = $model->min('id'); // Minimum
      //$example = $model->max('id'); // Maximum
     // $example = $model->sum('id'); //
     // $example = $model->avg('id'); // Average
     // $example = $model->count('id'); //Count

        $template = $this->loadView('portfolio_view');
        $template->set('content', '1234');
        $template->set('portfolios', $example);
        $template->render();
        //$template->renderJSON($example);
        //echo Sft::powered() .' '. Sft::getVersion();
    }
}