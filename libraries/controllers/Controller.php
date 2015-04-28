<?php

class Controller {

    public $name;
    protected $app;

    public function __construct($appInstance) {
        $this->app = $appInstance;
        // echo "running controller ".get_class($this);
    }

    public function render($template) {
        ob_start();
        include(__DIR__ . '/../views/site/' . $template . '.php');
        $content = ob_get_clean();
        include(__DIR__ . '/../views/layouts/main.php');
    }
}

?>