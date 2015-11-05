<?php







?>
<div class="col-md-2c add-item col-sm-12">
	<div class="col-md-12 col-sm-12">

		<div class="row">
		<img src="<?php echo 'images/'.$pic_url.'.jpg';?>" class="add_img">

			<div class="ad-row">
				<span class="ad-name"><?php echo $add['name'];?></span>
				<button class="pull-right btn btn-default">Add <i class="glyphicon glyphicon-shopping-cart"></i></button>
			</div>
			<div class="ad-row">
				<span class="ad-price"><?php echo format_price($add['price']);?> Ksh</span>
			</div>
			<div class="ad-row">
			 <p class="ad-desc"><?php echo $add['status'];?></p>
			</div>


		</div>

	</div>
</div>