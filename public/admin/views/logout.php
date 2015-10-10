<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'_init.php';
require_once SITE_ROOT.DS.'classes/session.class.php';
require_once SITE_ROOT.DS.'config/db_config.php';
//require_once SITE_ROOT.DS.'classes/database.class.php';
require_once SITE_ROOT.DS.'helper/functions.php';

$session->logout();
header("Location:../..");
exit();
?>