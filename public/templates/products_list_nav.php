<?php

?>
<nav class="navbar main">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <?php if (!$categories) {?>
           <li ><a class="page-scroll" href="<?php echo 'admin';?>">First Add products you sell. </a></li>
          <?php }else {?>
             <?php foreach ($categories as $ctg) {?>

              <li class="<?php echo ($_GET['category']==$ctg[0])?'active':'';?>">
                <a class="page-scroll" href="<?php echo '?category='.$ctg[0];?>">
                    <?php echo $ctg[1];?> <span><?php echo $ctg[2];?></span>
                </a>
              </li>
             <?php } ?>

          <?php }?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
