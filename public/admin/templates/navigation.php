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

                <a class="navbar-brand page-scroll" href="#">Advertise <span style="font-size: 10px;color:blue;">Beta</span></a>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">


                            <li>
                            <a class="page-scroll" href="../../">View Site</a>
                            </li>
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo 'Manage'; ?><b class="caret"></b> </a>
                            <ul class="dropdown-menu">
                                    <li><a href="edit.php">Create Advert</a> </li>
                                    <li><a href="#">Create Admin</a> </li>

                                </ul>

                            </li>
                            <li>
                            <a class="page-scroll" href="#">Settings</a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo 'Edit Pages'; ?><b class="caret"></b> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="edit_page.php?page=about">About</a> </li>
                                    <li><a href="edit_page.php?page=contacts">Contacts</a> </li>
                                    <li><a href="edit_page.php?page=faq">Faq</a> </li>
                                </ul>

                            </li>

                            <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']['first_name']; ?><b class="caret"></b> </a>
                            <ul class="dropdown-menu" id="dropdown">
                                <li><a href="logout.php">Logout</a> </li>
                            </ul>

                            </li>

                            </ul>
                            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
