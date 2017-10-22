<?php

//DATA to connect to DataBase
define(HOST, 'localhost');
define(DATABASE, 'xparser');
define(USERNAME, 'root');
define(PASSWORD, '');

//Table for parsing data
define(TABLE, 'or_parcing');

//PHP error settings
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('max_execution_time', '320000');

require_once ('helper.php');

function autoloadClasses($className) {
    $classPath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $className . '.php';
    if (file_exists($classPath)) {
        require_once $classPath;
        return true;
    }
    else{
        echo "<p>The called Class - <strong>{$className}</strong> - does not exist!</p>";
    }
    return false;
}

spl_autoload_register('autoloadClasses');