
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<?php

defined('DS')? null:define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', dirname(dirname(__FILE__)));
define('CLASSES_PATH', SITE_ROOT.DS.'classes');
define('MEDIA_LOCATION', SITE_ROOT.DS.'public'.DS.'images');


?>

