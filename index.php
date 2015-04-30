<?php

// load autoloader.php, so no require_once in the code will be needed
require_once('libraries/common/autoloader.php');

// static global configuration parameter is in Config::$params
require_once('libraries/common/Config.php');

// load the configuration parameters into static attribute
Config::$params = require_once('config/config.php');

//require_once('libraries/common/App.php');

// run the application with constructor
$app = new App(Config::$params);

?>