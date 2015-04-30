<?php

// Find missing class in one of the specified locations

function __autoload($classname) {
    $where = array(
        'common',
        'controllers',
        'models'
    );

    foreach ($where as $directory) {
        $filename = __DIR__ . "/../" . $directory . '/' . $classname . ".php";
        if (file_exists($filename))
            include_once($filename);
    }
}

?>