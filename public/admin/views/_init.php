<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'setup.php';
function __autoload($class){
    $class=strtolower($class);
    $path=CLASSES_PATH.DS.$class.".class.php";
    if (file_exists($path)){
        require_once ($path);
    }else {
        die("The file {$class}.php could not be autoloaded");
    }
}

?>