<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'_init.php';

require_once SITE_ROOT.DS.'config/db_config.php';
require_once SITE_ROOT.DS.'classes/database.class.php';
require_once SITE_ROOT.DS.'classes/session.class.php';
require_once SITE_ROOT.DS.'classes/photograph.class.php';
require_once SITE_ROOT.DS.'classes/adds.class.php';
require_once SITE_ROOT.DS.'helper/functions.php';

$debug=0;//todo
$dir_path='../';
$edit=false;

if (!$session->is_looged_in()) {
    header('Location:login.php');
    exit();
}


if (isset($_GET['id'])) {
    $edit=true;
    $add_data=Add::load_add($_GET['id']);
}

if (isset($_POST['name'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $contact=$_POST['contact'];
    $category=$_POST['category'];
    $age=$_POST['age'];
    $reg=$_POST['reg'];
    $status=$_POST['status'];
    $color=$_POST['color'];
    $location=$_POST['location'];
    print_prep($_POST);


    $addv=new Add($name,$price,$contact,$category,$age,$reg,$status,$color,$location);
    if (isset($_POST['id'])){
        //update

        $result_set=$addv->update();
        if ($result_set){
            #$message="Photograph uploaded successfully";
            $message="Add Updated successfully";
        }else{
            $message="Could not update add at this time";
        }
    }else{
        //create
        //$addv->attach_pic($photo_success);

        if ($_POST['category']==0) {
            if (isset($_POST['cat'])) {
                //create category
                $q='insert into products (name,count) values("'.$_POST['cat'].'",1)';
                $rs=mysqli_query($database->get_connection(), $q);
                if ($rs) {
                    $addv->category=mysqli_insert_id($database->get_connection());
                }
            }
        }

        $addv->save();
        $photo_filename =mysqli_insert_id($database->get_connection());
        $photo=new Photograph();
        $photo->attach_file($_FILES['file_upload']);
        $photo_success=$photo->save($photo_filename);
        if ($photo_success){
            #$message="Photograph uploaded successfully";
            $message="Add Published successfully";
        }else{
            $message=join("<br/>", $photo->errors);
        }
        print_r($addv);
        print_r($message);


    }
}


?>

<!DOCTYPE html>
<html lang="en">

<?php include_once SITE_ROOT.DS.'public/admin/templates/header.php';?>

<body id="page-top" class="index">
<?php include_once SITE_ROOT.DS.'public/admin/templates/navigation.php';?>



    <!-- Contact Section -->
    <section id="contact" class=main>

        <div class="container">
        <div class="col-md-9">
        <?php  if(isset($message)){  echo $message;   }  ?>

            <form role=form method="post" action="edit.php" enctype="multipart/form-data">

            <div class="col-md-12">
                <div class="form-group col-md-6">

                    <label for="category">Category</label>
                    <?php
                    $q='select id,name from products';
                    $r=mysqli_query($database->get_connection(), $q);


                    ?>

                    <select class="form-control" name="category" id="category">
                    <?php if ($r) {
                        ?><option value="0" selected="selected">Select a category</option><?php
                        while ($cat=mysqli_fetch_assoc($r)) { ?>
                          <option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
                       <?php }

                    } ?>

                    <option value="0">Add New Cat</option>
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="category">New Category</label>
                    <input type="text" class="form-control disabled" value="<?php echo $edit?$add_data['name']:'';?>" name="cat" id="cat">

                    </div>
                </div>
                <div class="form-group">
                <label for="pic">Product Pic</label>
                <input type="file" class="form-control" id="pic" name="file_upload">
                </div>
                <div class="form-group col-md-4">
                <label for="name">Product name</label>
                <input type="text" class="form-control" value="<?php echo $edit?$add_data['name']:'';?>" name="name" id="name">
                </div>
                <div class="form-group col-md-4">
                <label for="reg">Reg No</label>
                <input type="text" class="form-control" value="<?php echo $edit?$add_data['reg']:'';?>" name="reg" id="reg">
                </div>

                <div class="form-group col-md-4">
                <label for="color">Color</label>
                <input type="text" class="form-control" value="<?php echo $edit?$add_data['color']:'';?>" name="color" id="color">
                </div>

                <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" value="<?php echo $edit?$add_data['price']:'';?>" name="price" id="price">
                </div>
                <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" value="<?php echo $edit?$add_data['contact']:'';?>" name="contact" id="contact">
                </div>
                <div class="form-group col-md-6">
                <label for="age">Age</label>
                <input type="text" class="form-control" name="age" value="<?php echo $edit?$add_data['id']:'';?>" id="age">
                </div>
                <div class="form-group col-md-6">
                <label for="location">Location</label>
                <input type="text" class="form-control" value="<?php echo $edit?$add_data['location']:'';?>" name="location" id="location">
                </div>
                <div class="form-group">
                <label for="status">Status</label>
                <textarea class="form-control" id="status" onfocus="this.value='';" name="status"><?php echo $edit?$add_data['status']:'Short description';?></textarea>

                </div>

                <button class="btn btn-primary" type="submit" >Publish Add</button>
                <?php if ($edit){?>
                <input type="hidden" name="id" value"<?php echo $add_data['id'];?>">
                <?php }?>

            </form>
        </div>

        </div>
    </section>

    <?php include_once SITE_ROOT.DS.'public/admin/templates/footer.php';?>


</body>

</html>
