<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'_init.php';
require_once SITE_ROOT.DS.'classes/session.class.php';
require_once SITE_ROOT.DS.'helper/functions.php';
require_once SITE_ROOT.DS.'config/db_config.php';
require_once SITE_ROOT.DS.'classes/database.class.php';

$debug=0;
$dir_path='../';


if (isset($_POST['id'])) {

    $query="UPDATE `pages` SET `title` = '$_POST[title]', `label` = '$_POST[label]', `body` = '$_POST[body]' WHERE `pages`.`id` = $_POST[id]";
    $result_set=mysqli_query($database->get_connection(), $query);
    if ($result_set) {
        $message="Page  $_POST[label] updated succesfully.";

        header("Location:index.php");
        exit();
    }

}



?>
<!DOCTYPE html>
<html lang="en">
<?php include_once SITE_ROOT.DS.'public/admin/templates/header.php';?>

<body id="page-top" class="index">


<?php include_once SITE_ROOT.DS.'public/admin/templates/navigation.php';?>

<div class="container main">

    <div class="row">
        <?php
        if (isset($_GET['page'])) {

        $query="select * from pages where title='$_GET[page]'";
        $result_set=mysqli_query($database->get_connection(), $query);
        $opened=mysqli_fetch_assoc($result_set);
        }

        ?>




<div class="col-md-12">
    <?php  if(isset($message)){  echo $message;   }  ?>
    <form role="form" action="edit_page.php<?php //echo $opened['id'];?>" method="post">

        <div class="form-group">
        <div class="col-md-6">
            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title" id="title" value="<?php echo $opened['title']?>" placeholder="Page Title">
        </div>
        <div class="col-md-6">
            <label for="label">Label:</label>
            <input class="form-control" type="text" name="label" id="label" value="<?php echo $opened['label']?>" placeholder="Page label">
        </div>
        </div>


        <div class="form-group">
        <div class="col-md-12">
            <label for="body">Body</label>
            <textarea class="form-control editor" type="text" name="body" id="body"  rows="8" placeholder="Page Body"><?php echo $opened['body'];?></textarea>
        </div>
                </div>

                <div class="col-md-12">
        <button type="submit" class="btn btn-default pull-right">Save</button>
        </div>
        <input type="hidden" name="id" value="<?php echo $opened['id'];?>">
        <input type="hidden" name="submitted" value="1">

    </form>


    </div>
    </div>
    </div>

</body>

</html>