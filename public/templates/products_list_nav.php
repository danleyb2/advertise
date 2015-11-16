<?php

?>
<nav class="navbar main">
  <div class="container">

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav ad-catg-ul">
          <?php if (!$categories) {?>
           <li ><a class="page-scroll" href="<?php echo 'admin';?>">First Add the products categories to advertise. </a></li>
          <?php }else {?>
             <?php foreach ($categories as $ctg) {?>

              <li class="<?php echo ($_GET['category']==$ctg[0])?'active':'';?>">
                <a class="page-scroll" href="<?php echo '?category='.$ctg[0];?>">
                    <?php echo $ctg[1];?> <span class="ad-count"><?php echo $ctg[2];?></span>
                </a>
              </li>
             <?php } ?>

          <?php }?>
      </ul>
      <a href="#" id="more-cat" style="position: absolute; bottom: 15px;" class="hide">
       More <i class="glyphicon glyphicon-arrow-down "></i>
      </a>
      <a href="#" id="less-cat" style="position: absolute; bottom: 15px;right: 15px;" class="hide">
       All <i class="glyphicon glyphicon-circle-arrow-down "></i>
      </a>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- Add to cart button -->
<div class="cart-btn" style="">
    <a href="#" class=" pull-left">View Cart <i class="glyphicon glyphicon-shopping-cart "></i></a>
</div>
