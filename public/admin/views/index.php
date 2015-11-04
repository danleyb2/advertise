<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'_init.php';

require_once SITE_ROOT.DS.'classes/session.class.php';
require_once SITE_ROOT.DS.'config/db_config.php';
require_once SITE_ROOT.DS.'classes/database.class.php';
require_once SITE_ROOT.DS.'helper/functions.php';

$debug=0;
$dir_path='../';

if (!$session->is_looged_in()) {
    header("Location:..");
}else{
    print_prep($_SESSION);
}

$page_title='Moto ';


$per_page=6;
$table='advertisements';
$query_count="SELECT COUNT(*) as `num` FROM {$table}";
$row=mysqli_fetch_row(mysqli_query($database->get_connection(), $query_count));
$num_rows=$row[0];
$total_pages=ceil($num_rows/$per_page);
$page = (int) (! isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page > $total_pages ? $total_pages : $page);
$page = ($page < 1 ? 1 : $page);
$offset=($page-1)*$per_page;
$statement=" $table order by id asc";
$result_set=mysqli_query($database->get_connection(), "SELECT * FROM {$statement} LIMIT {$offset},{$per_page}");
?>


<!DOCTYPE html>
<html lang="en">

<?php include_once SITE_ROOT.DS.'public/admin/templates/header.php';?>
<body id="page-top" class="index">

<?php include_once SITE_ROOT.DS.'public/admin/templates/navigation.php';?>

    <!-- Main Section -->
    <section id="contact" class=main>
        <div class="container">

         <div class="row">
        <?php
        if (mysqli_num_rows($result_set)!=0) {
    while ($add=mysqli_fetch_assoc($result_set)) {?>

    <?php
    $pic_url=$add['id'];
   include SITE_ROOT.DS.'public/admin/templates/add_template.php';
    }
        }

    ?>

</div>
        </div>
    </section>


    <?php include SITE_ROOT.DS.'public/admin/templates/footer.php';?>
    <?php include SITE_ROOT.DS.'public/admin/templates/js.php';?>
</body>

</html>
