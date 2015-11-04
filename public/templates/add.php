<?php







?>
<div class="col-md-2 well add-item col-sm-12">
	<div class="col-md-12 col-sm-12">

		<div class="row">
		<img src="<?php echo 'images/'.$pic_url.'.jpg';?>" class="add_img">

			<div class="col-md-12">
				<span class=""><?php echo $add['name'];?></span>
			</div>		
			<div class="col-md-12">
				<span class=""><?php echo format_price($add['price']);?> Ksh</span>
			</div>
			<div class="col-md-12"><p><?php echo $add['status'];?></p></div>
			<button class="pull-right"><i class="glyphicon glyphicon-plus-sign"></i>Cart</button>

		</div>

	</div>
</div>