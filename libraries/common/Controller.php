<?php

/**
 * Base Controller class
 */

class Controller {

    public $name;
    protected $app;

    public function __construct($appInstance) {
        $this->app = $appInstance;
    }

    // render template file name into main layout

    public function render($template, $data = '', $datalayout = 'main') {
        ob_start();
        $data = $data;
        include(__DIR__ . '/../views/site/' . $template . '.php');
        $content = ob_get_clean();
        include(__DIR__ . '/../views/layouts/' . $datalayout . '.php');
    }
    
    public function renderCategories($template, $innerTemplate = '', $data = '', $datalayout = 'main') {
        ob_start();
        if($data != '' && !isset($data['categoryMenu']))
        {
            ob_start();
            $data = $data;
            include(__DIR__ . '/../views/site/' . $innerTemplate . '.php');
            $categoryContent = ob_get_clean();
        }
        else
        {
            $data['category'] = 'noCategory';
        }
        include(__DIR__ . '/../views/site/' . $template . '.php');
        $content = ob_get_clean();
        include(__DIR__ . '/../views/layouts/' . $datalayout . '.php');
    }
}

?>