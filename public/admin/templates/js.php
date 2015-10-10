<?php
?>

<!-- jQuery -->
<script type="text/javascript" src="<?php echo $dir_path;?>../assets/javascripts/jquery-1.11.3.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="<?php echo $dir_path;?>../assets/javascripts/bootstrap.min.js"></script>

<?php if (true) {
   //if page is admin main
}?>
<script>
$(document).ready(function(){


});
function delete_add(id,doc){
	  $.ajax({
      type: "GET",
      url: '../actions/ajax.php',
      data: {id: id },
      success: function (data) {
            console.log(data);
            if (data) {
        	console.log(doc);
        	doc.closest('div .add-item').remove();
	    }
      }

  });

}
$(document).ready(function(){
    $(".ete_add").on("click",function(){

    });

});
</script>