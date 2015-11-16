<?php

require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'setup.php';

require_once SITE_ROOT.DS.'config'.DS.'db_config.php';
require_once SITE_ROOT.DS.'classes'.DS.'database.class.php';
require_once SITE_ROOT.DS.'classes'.DS.'session.class.php';
//require_once SITE_ROOT.DS.'public'.DS.'admin'.DS.'actions'.DS.'login.admin.php';
require_once SITE_ROOT.DS.'helper'.DS.'functions.php';

$debug = 0;
$dir_path='./';
$page_title="login";

if ($session->is_looged_in()) {
    header("Location:views");
    exit();
}

function check($name,$pass){
    global $database;
    $query="select * from users where email='$name' and password='$pass'";
    $result_set=mysqli_query($database->get_connection(), $query);
    //echo 'checking: '.$query;
    if ($result_set) {
        return mysqli_fetch_assoc($result_set);
    }
}

if (isset($_POST['name'])) {
    $email = $_POST['name'];
    $password = $_POST['password'];

    $data = check($email, $password);

    if ($data) {
        print_prep($data);
        $session->login($data);
        header('location:views/');
    } else {
        $_SESSION['message'] = "Wrong email password combination";

        $forgot_pass = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php

include_once SITE_ROOT.DS.'public/admin/templates/header.php';
?>

<body>
<?php //include_once SITE_ROOT.DS.'public/templates/navigation.php';?>
<div class="container main">
		<div class=row>
			<div class="col-md-4 col-centered">
				<div class="panel panel-info">
				<?php if (isset($_SESSION['message'])) { ?>
				<div class="panel panel-warning"><?php echo $_SESSION['message'];?></div>
				<?php }?>
					<div class="panel-heading">
						<strong>Login</strong>
					</div>
					<div class="panel-body">
						<form role=form class="" method="post" action="index.php">

							<div class=form-group>
								<label for="username">Email</label>
								<input id="name" value="<?php echo isset($_POST['name'])?$_POST['name']:'';?>" class="form-control" name="name" type="text" placeholder="Your Username or Email">
							</div>
							<div class=form-group>
								<label for="password">Password</label>
								<input id="password" class="form-control" name="password" type="password" placeholder="Your Password">
							</div>

							<button type="submit" class="btn btn-default">sign in</button>
							<a href="recover.php">forgot password?</a>
							<a href="../">View Site.</a>

						</form>
					</div>
				</div>
			</div>
		</div>

	</div>



<?php include_once SITE_ROOT.DS.'public/admin/templates/footer.php';?>
<?php include_once SITE_ROOT.DS.'public/admin/templates/js.php';?>
</body>

</html>