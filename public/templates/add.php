<?php







?>
<div class="col-md-4 well col-sm-12">
	<div class="col-md-5 col-sm-12">

		<div class="row">
		<img src="<?php echo 'images/'.$pic_url.'.jpg';?>" class="add_img">

			<div class="col-md-12">
				<span class="col-md-6 pull-left"><?php echo $add['name'];?></span>
				<span class="col-md-6 text-left"><?php echo $add['color'];?></span>
			</div>

			<div class="col-md-12">
				<!--Contact-->
				<span class="col-md-12 text-left"><?php echo $add['contact'];?></span>
			</div>
		</div>
	</div>
	<div class="col-md-7 col-sm-12">


		<div class="row">
			<div class="col-md-12">
			<span class="col-md-12 text-center"><?php echo $add['reg'];?></span>
			</div>

			<div class="col-md-12">
			<span class="col-md-5">Price</span><span class="col-md-7"><?php echo format_price($add['price']);?> Ksh</span>
			</div>
			<div class="col-md-12">
			<span class="col-md-5">Age</span><span class="col-md-7"><?php echo $add['age'];?> Yrs</span>
			</div>
			<div class="col-md-12">
			<span class="col-md-5">Location</span><span class="col-md-7"><?php echo $add['location'];?></span>
			</div>
			<div class="col-md-12 text-center"><p><?php echo $add['status'];?></p></div>

		</div>



	</div>
</div>