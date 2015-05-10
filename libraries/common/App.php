<?php

class App {

    private $controller;

    /**
     * Create application instance. Get controller and action from URL and run.
     */
    public function __construct($config = array()) {
        $route = explode('/', $this->getRoute());
        $controllerName = isset($route[0]) && $route[0] ? ucfirst($route[0]) . 'Controller' : 'SiteController';
        $actionName = isset($route[1]) && $route[1] ? 'action' . $route[1] : 'actionIndex';
        $this->runController($controllerName, $actionName);
    }

    /**
     *  Get base url from apache global parameters. For example url localhost/project/controller/action would be tranlated to localhost/project
     */
    public function getBaseUrl() {
        return str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
    }

    // get route from .htaccess generated "r" GET attribute

    private function getRoute() {
        return isset($_GET['r']) ? $_GET['r'] : false;
    }

    // run the requested page from requested controller

    private function runController($name, $action) {
        $path = 'libraries/controllers/' . $name . '.php';

        if (!file_exists($path)) {
            header("HTTP/1.0 404 Not Found");
            echo "Page not found";
            die();
            throw new Exception('Content not available', 404);
        }

        require_once($path);

        $controller = new $name($this);
        $controller->$action();
    }
}

?>