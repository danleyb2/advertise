<?php
if (!defined('HOST')){define('HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));}
if (!defined('PASSWORD')){define('PASSWORD', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));}
if (!defined('DATABASE')){define('DATABASE', getenv('OPENSHIFT_GEAR_NAME'));}
if (!defined('USER')){define('USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));}
?>