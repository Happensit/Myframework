<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 24.02.2015
 * Time: 14:14
 */

class View {

    private $pageVars = array();
    private $assets = array();
    private $template;

    public function __construct($template) {
		$this->template = APP_DIR .'views/'. $template .'.php';
        //$this->cache_folder = ROOT_DIR . 'static/caching' . md5 ($template) . '.php';
	}

    public function set($var, $val = '') {
        $this->pageVars[$var] = $val;
    }

    public function data( $name, $value ){
        if (!is_array($value)) @$this->assets[$name] = $value.$this->assets[$name];
    }

    public function add_css($file){
        $file = '<link rel="stylesheet" href="'.$file.'" media="all" />'."\r\n";
        $this->data('css', $file);
    }

    public function add_js($file){
        $file = '<script src="'.$file.'"></script>'."\r\n";
        $this->data( 'js', $file );
    }

    public function meta($meta='', $val=''){
        $meta = '<meta name="'.$meta.'" content="'.$val.'" />'."\r\n";
        $this->data('meta', $meta);
    }

    public function render() {
        $start = microtime(true);
//        $cache = new Cache();
//        $key = md5(reset($this->pageVars));
//        $data = $cache->get($key);
        $data = '';

        if(empty($data)){
            extract($this->pageVars);
            extract($this->assets);
            //extract($this->meta);
            ob_start();
            include($this->template);
            $data = ob_get_clean();

            //$cache->add($key, $data, 0, 360);
        }

        $time = microtime(true) - $start;
        //$data .= "<!--Скрипт выполнялся за " . $time .'-->';
        $data .= "Скрипт выполнялся за " . $time .'';

        //$cache->flush();

        print $data;
    }



    public function renderJSON($data){
        echo json_encode($data);
    }

}