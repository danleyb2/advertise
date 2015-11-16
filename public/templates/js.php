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
          $('#search-input')[0].setAttribute('placeholder','Search '+t.target.selectedOptions[0].text);
      };

      function moreAvailable(){
            el=$('#bs-example-navbar-collapse-2 ul')[0];
            return(el.offsetHeight<el.scrollHeight ||
                    el.offsetWidth<el.scrollWidth);
        }
      if(moreAvailable()){
	  $('#more-cat').toggleClass('hide');
	  $('#less-cat').toggleClass('hide');
      //}else{

        $('#more-cat').click(function (evt) {
            evt.preventDefault();
            el=$('#bs-example-navbar-collapse-2 ul')[0];
            if(moreAvailable()){
                $('#bs-example-navbar-collapse-2 ul').animate({'height':'+=51px'}, function () {
                    if(!moreAvailable()) {
                    $('#more-cat').html('Close <i class="glyphicon glyphicon-remove-circle "></i>');
                }
                });
                $('#less-cat').html('Less <i class="glyphicon glyphicon-arrow-up "></i>');
            }else{
                $('#bs-example-navbar-collapse-2 ul').animate({'height':'50px'}, function () {
                    $('#more-cat').html('More <i class="glyphicon glyphicon-arrow-down "></i>');
                    $('#less-cat').html('All <i class="glyphicon glyphicon-circle-arrow-down"></i>');
                });
            }

        });
        $('#less-cat').click(function (evt) {
            evt.preventDefault();
            el=$('#bs-example-navbar-collapse-2 ul')[0];
            if(el.offsetHeight<=50){
                $('#bs-example-navbar-collapse-2 ul').animate({'height': el.scrollHeight+'px'}, function () {
                    $('#more-cat').html('Close <i class="glyphicon glyphicon-remove-circle "></i>');
                    $('#less-cat').html('Less <i class="glyphicon glyphicon-arrow-up"></i>');

                });

            }else{
                $('#bs-example-navbar-collapse-2 ul').animate({'height': '-=51px'}, function () {
                    $('#more-cat').html('More <i class="glyphicon glyphicon-arrow-down "></i>');
                    if(el.offsetHeight<=50){
                        $('#less-cat').html('All <i class="glyphicon glyphicon-circle-arrow-down"></i>');
                    }
                });
            }

        });

      }
</script>

