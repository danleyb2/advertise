<?php
?>
<!-- Navigation -->
    <nav class="navbar navbar-fixed-top">
        <div class="container">

            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand page-scroll" style="font-size: 32px;" href="<?php echo $dir_path?>"><?php echo 'Advertise'?> <span style="font-size: 10px;color:red;">Beta</span></a>

            </div>


          <form class="navbar-form navbar-left" role="search" action="index.php">

            <div class="form-group">
                <select name="category-s" class="form-control" id="search-select">

                    <option value="0" <?php //echo isset($_GET['category-s'])?'':'selected="selected"'; ?> >Search All</option>
                    <?php foreach ($categories as $ctg) {?>
                    <option value="<?php echo $ctg[0];?>" <?php echo (isset($_GET['category-s']) and $_GET['category-s']==$ctg[0])?'selected="selected"':'';?> ><?php echo $ctg[1];?></option>
                    <? }?>
                </select>
                <input type="text" <?php echo isset($_GET['name'])?"value=\"$_GET[name]\" ":""; ?> name="name" class="form-control" id="search-input" placeholder="Search All">
            </div>
            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
          </form>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo $page_title=='login'? $dir_path:$dir_path.'admin/';?>">Admin</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo $page_title=='login'? $dir_path.'../':$dir_path;?>views/page.php?page=about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo $page_title=='login'? $dir_path.'../':$dir_path;?>views/page.php?page=faq">Faq</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo $page_title=='login'? $dir_path.'../':$dir_path;?>views/page.php?page=contacts">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


