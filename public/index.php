<?php

require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'setup.php';

require_once SITE_ROOT.DS.'config'.DS.'db_config.php';
require_once SITE_ROOT.DS.'classes'.DS.'database.class.php';
require_once SITE_ROOT.DS.'helper'.DS.'functions.php';

$debug=0;
$dir_path='./';
$page_title='Advertise ';


$per_page=12;
$table='advertisements';
$query_count="SELECT COUNT(*) as `num` FROM {$table} ";
isset($_GET['category']) ? $query_count.=" WHERE product_id=$_GET[category]":'';
if (isset($_GET['category-s'])) {
    $query_count.=( $_GET['category-s']!=0)?" WHERE product_id=".$_GET['category-s']." and name LIKE '%$_GET[name]%'":
    " WHERE name LIKE '%$_GET[name]%'";
}

$row=mysqli_fetch_row(mysqli_query($database->get_connection(), $query_count));
$num_rows=$row[0];

$total_pages=ceil($num_rows/$per_page);

$page = (int) (! isset($_GET["page"]) ? 1 : $_GET["page"]);
$page = ($page > $total_pages ? $total_pages : $page);
$page = ($page < 1 ? 1 : $page);

$offset=($page-1)*$per_page;

$statement="$table";
$order="order by id asc";

if (isset($_GET['name']) and trim($_GET['name'])!='') {
    $item=$_GET['name'];
    $categories=$_GET['category-s'];
    if ($categories==0) {
        $data_q="SELECT * FROM advertisements WHERE name LIKE '%$item%' LIMIT {$offset},{$per_page}";
    }else{
        $data_q="SELECT * FROM advertisements WHERE name LIKE '%$item%' AND product_id=$categories LIMIT {$offset},{$per_page}";
    }

}else{

if (!isset($_GET['category'])) {
    $data_q= "SELECT * FROM {$statement} LIMIT {$offset},{$per_page}";
    $cat_nav='';
}else{
    $category=$_GET['category'];
    $cat_nav="where advertisements.product_id=$category";
    $data_q= "SELECT * FROM {$statement} WHERE product_id=$category {$order} LIMIT {$offset},{$per_page}";
}

}
$result_set=mysqli_query($database->get_connection(),$data_q);

?>

<?php
//getting categories
$q='SELECT
products.id,
products.name as name,
COUNT(advertisements.id) as count

from advertisements
join products on

products.id=advertisements.product_id

GROUP by advertisements.product_id ';#limit 17
//$q='select id,name,count from products limit 10';
$categories_rs=mysqli_query($database->get_connection(), $q);
$categories=($categories_rs)?mysqli_fetch_all($categories_rs):false;



?>

<!DOCTYPE html>
<html lang="en">

<?php include_once SITE_ROOT.DS.'public/templates/header.php';?>


<body id="page-top" class="index">
 <?php include_once SITE_ROOT.DS.'public/templates/navigation.php';?>
 <?php include_once SITE_ROOT.DS.'public/templates/products_list_nav.php';?>

    <section id="contact">
	   <div class="container">
			<div class="row text-center" style="">
                <?php
                if (mysqli_num_rows($result_set) != 0) {
                    while ($add = mysqli_fetch_assoc($result_set)) {?>
                    <?php
                        $pic_url = $add['id'];
                        include SITE_ROOT . DS . 'public/templates/add.php';
                    }
                } else { ?>
                   <p class="text-center" style="font-size: 30px">No ads</p>
              <?php } ?>

            </div>


    		<!-- Pagination -->
            <?php
            if (! isset($_GET['category'])) {
                $url = '?';
            } else {
                $category = $_GET['category'];
                $url = '?category=' . $category . '&';
            }
            if (isset($_GET['category-s'])) {
                $url.="category-s=".$_GET['category-s']."&name=$_GET[name]&";
            }

            $prev = $page - 1;
            $next = $page + 1;
            $totaltpages = $total_pages;
            if ($total_pages > 1) { ?>
            <div class="col-md-12 text-center">
    			<ul class="pagination">
    				<li class="disabled">
    				    <a><?php echo "Page $page of $total_pages";?></a>
    				</li>

                     <?php if ($page == 1) {   ?>
                        <li class="disabled">
                            <a	href=<?php echo "{$url}page={$prev}"?>>
                                <i class="glyphicon glyphicon-chevron-left"></i>
                            </a>
                        </li>
            		 <?php } else { ?>

                        <li>
                            <a href=<?php echo "{$url}page=1"?>>
                                <i	class="glyphicon glyphicon-chevron-left"></i>
                            </a>
                        </li>

    				    <li>
    				        <a href=<?php echo "{$url}page={$prev}"?>>
    				            <i   class="glyphicon glyphicon-chevron-left"></i>
    				        </a>
    				    </li>
    	           <?php }?>


    	           <?php
                    $range = 4;
                    for ($counter = ($page - $range); $counter < (($page + $range) + 1); $counter ++) {
                        if (($counter > 0) && ($counter <= $totaltpages)) {
                            if ($counter == $page) { ?>
                                <li class="active">
                                    <a><?php echo $counter?></a>
                                </li>
                                <?php  } else {  ?>
                                <li class="waves-effect">
                                    <a	href=<?php echo "{$url}page={$counter}"?>><?php echo "{$counter}"?></a>
                				</li>

                      <?php }
                        }
                    }

                    if ($page != $totaltpages) { ?>

                            <li class="waves-effect">
                                <a href=<?php echo "{$url}page={$next}"?>><i class="glyphicon glyphicon-chevron-right"></i></a>
            				</li>

            				<li class="waves-effect">
            				    <a	href=<?php echo "{$url}page=$totaltpages"?>> <i	class="glyphicon glyphicon-chevron-right"></i></a>
            				</li>
            				<?php } else { ?>
            				<li class="disabled">
            				    <a> <i class="glyphicon glyphicon-chevron-right"></i></a>
            				</li>
            				<li class="disabled">
            				        <a> <i class="glyphicon glyphicon-chevron-right"></i></a>
            				</li>
                    <?php }

                    } ?>
                </ul>
    		</div>
	   </div>

	</section>

   <?php include_once SITE_ROOT.DS.'public/templates/footer.php';?>
   <?php include_once SITE_ROOT.DS.'public/templates/js.php';?>



</body>

</html>
