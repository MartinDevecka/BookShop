<?php

require_once('libraries/common/autoloader.php');
require_once('libraries/common/Config.php');

Config::$params = require_once('config/config.php');

require_once('libraries/common/App.php');

$app = new App(Config::$params);
?>