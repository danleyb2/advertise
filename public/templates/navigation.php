<?php
?>
<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="<?php echo $dir_path?>"><?php echo 'Advertise'?> <span style="font-size: 10px;color:blue;">Beta</span></a>
            </div>

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


