<?php
?>

<!-- jQuery -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php if (true) {
   //if page is admin main
}?>
<script>
$(document).ready(function(){


});
function delete_add(id,doc){
	  $.ajax({
      type: "GET",//todo:should be post
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