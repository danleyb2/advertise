<?php
//require_once '../config/setup.php'; use __FILE__
require_once SITE_ROOT.DS.'config'.DS.'db_config.php';
require_once SITE_ROOT.DS.'classes'.DS.'database.class.php';
$query="delete from advertisements where id=$_GET[id] limit 1";
$result_set=$database->query_database($query);
if ($result_set) {
    //delete image
    unlink(MEDIA_LOCATION.DS.$_GET[id].'.jpg');
    echo  "true";
}else {
    echo "false";
}
?>