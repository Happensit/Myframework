<?php
/**
 * Date: 09.07.15 9:18
 * Project: drupal8
 * Author: happensit
 */

class NewsController extends Controller
{
    public function actionIndex()
    {
        $model = $this->loadModel('News');
        $id = $model->max('news_id'); // Maximum

        $template = $this->loadView('about_view');
        $template->set('content', "Это страница с новосяти".$id);
        $template->meta('keywords', "keywords content");
        $template->meta('description', "Description content");
        $template->render();
    }

    public function actionView($id)
    {
        $model = $this->loadModel('News');

        $news = $model->findAll();
        //$news = $model->findByid($id[0]);

        var_dump($news);

    }
}