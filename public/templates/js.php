<?php




?>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- Custom Theme JavaScript -->

<script src="<?php echo $dir_path;?>libs/javascripts/index.js"></script>

 <script type="text/javascript">
      $('#search-select')[0].onchange=function(t){
	      t.bubbles=false;
          s=t;
          $('#search-input')[0].setAttribute('placeholder','Search '+t.target.selectedOptions[0].text);
      };
</script>

