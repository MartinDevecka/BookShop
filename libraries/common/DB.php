<?php

/**
 * Simple singleton class to provide database mysqli object
 *
 * use anywhere in the code like DB::getInstance()->query('SELECT ...');
 */

class DB {

    private static $connection;

    public function __construct() {
        throw new Exception('Cannot create singleton instance');
    }

    public static function getInstance() {

        if (!self::$connection) {
            $config = Config::$params['db'];
            self::$connection = new mysqli(
                    $config['host'], $config['name'], $config['password'], $config['db']
            );
        }
        return self::$connection;
    }
}

?>