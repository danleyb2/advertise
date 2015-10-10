<?php

require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'setup.php';

require_once SITE_ROOT.DS.'config'.DS.'db_config.php';
require_once SITE_ROOT.DS.'classes'.DS.'database.class.php';
require_once SITE_ROOT.DS.'helper'.DS.'functions.php';

$debug=0;
$dir_path='./';
$page_title='Advertise ';


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

<?php include_once SITE_ROOT.DS.'public/templates/header.php';?>


<body id="page-top" class="index">
 <?php include_once SITE_ROOT.DS.'public/templates/navigation.php';?>
 <?php include_once SITE_ROOT.DS.'public/templates/search_sort.php';?>



    <!-- Main Section -->
    <section id="contact" class=main>
        <div class="container">
        <div class="row">
        <?php
        if (mysqli_num_rows($result_set)!=0) {
    while ($add=mysqli_fetch_assoc($result_set)) {?>

    <?php
    $pic_url=$add['id'];
   include SITE_ROOT.DS.'public/templates/add.php';
    }
        }

    ?>

</div>
</div>

<!--    Pagination -->
<?php

$url = '?';
$prev = $page - 1;
$next = $page + 1;
$totaltpages=$total_pages;
if ($total_pages > 1) { ?>
        <div class="col-md-7 center">
				<ul class="pagination col-md-12">
					<li class="disabled"><a><?php echo "Page $page of $total_pages";?></a></li>
        <?php    if ($page == 1) {   ?>
            <li class="disabled">
            <a	href=<?php echo "{$url}page={$prev}"?>><span class="glyphicon glyphicon-chevron-left"></span> </a>
            </li>
		<?php   } else { ?>
              <li>
              <a href=<?php echo "{$url}page=1"?>><span class="glyphicon glyphicon-chevron-left"></span> </a>
              </li>

        		<li>
        		<a href=<?php echo "{$url}page={$prev}"?>><span class="glyphicon glyphicon-chevron-left"></span> </a>
        		</li>

          <?php  }   $range = 4;
              for ($counter = ($page - $range); $counter < (($page + $range) + 1); $counter ++) {
          if (($counter > 0) && ($counter <= $totaltpages)) {
            if ($counter == $page) { ?>
                <li class="active"><a><?php echo $counter?></a></li>
                <?php  } else {  ?>
                    <li class="waves-effect">
                    <a	href=<?php echo "{$url}page={$counter}"?>><?php echo "{$counter}"?></a>
                    </li>

                 <?php
            }
        }
    }

    if ($page != $totaltpages) {  ?>

                    <li class="waves-effect">
                    <a	href=<?php echo "{$url}page={$next}"?>><i class="material-icons">chevron_right</i></a>
                    </li>

					<li class="waves-effect">
					<a	href=<?php echo "{$url}page=$totaltpages"?>> <i	class="material-icons">chevron_right</i>
					</a></li>

                    <?php    } else {    ?>

    <li class="disabled">
    <a> <i class="material-icons">chevron_right</i></a>
    </li>
	<li class="disabled">
	<a> <i class="material-icons">chevron_right</i></a>
	</li>

<?php }} ?>
                  </ul>
			</div>

    </section>

   <?php include_once SITE_ROOT.DS.'public/templates/footer.php';?>
   <?php include_once SITE_ROOT.DS.'public/templates/js.php';?>



</body>

</html>
