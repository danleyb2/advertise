<?php
if (!isset($_GET['page'])) {
   header("Location:..");
   exit();
}
require_once '../../config/setup.php';
require_once SITE_ROOT.DS.'config/db_config.php';
require_once SITE_ROOT.DS.'classes/session.class.php';
require_once SITE_ROOT.DS.'classes/database.class.php';

$debug=1;
$dir_path='../';

$query="select * from pages where label='$_GET[page]'";
$page_date=$database->query_database($query);
$page_arry=$database->assoc_array($page_date);

$page_title=$page_arry['title'];
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once SITE_ROOT.DS.'public/templates/header.php';?>


<body id="page-top" class="index">
 <?php include_once SITE_ROOT.DS.'public/templates/navigation.php';?>

 <div class="container main">
 <?php echo $page_arry['body'];?>
 </div>

 <?php include_once SITE_ROOT.DS.'public/templates/footer.php';?>
</body>