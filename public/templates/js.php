<?php




?>

 <!-- jQuery -->
<script src="<?php echo $dir_path;?>assets/javascripts/jquery-1.11.3.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $dir_path;?>assets/javascripts/bootstrap.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo $dir_path;?>assets/javascripts/index.js"></script>
 <script type="text/javascript">
      $('#search-select')[0].onchange=function(t){
	      t.bubbles=false;
          s=t;
          $('#search-input')[0].setAttribute('placeholder','Search '+t.target.selectedOptions[0].text);
      };
</script>