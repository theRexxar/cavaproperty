<div class="container space-top">
	<div class="row bgwhite">
		<div class="columns five">
			<section class="sidebar">
				<div class="row">
					<div class="columns sixteen">
						<form action="">
							<h5>SEARCH PROJECT</h5>
							<div class="input">
								<select name="tipe" id="">
									<option value="tipe 1">Type Property</option>
								</select>	
							</div>
							<div class="input">
								<select name="location" id="">
									<option value="tipe 1">Location</option>
								</select>
							</div>
							<div class="input">
								<select name="bedroom" id="">
									<option value="tipe 1">Beedrooms</option>
								</select>
							</div>
							<div class="input">
								<select name="addtional" id="">
									<option value="tipe 1">Addtional</option>
								</select>
							</div>
							<div class="submit">
								<input type="submit" class="button radius" value="FIND PROJECT">
							</div>
							
						</form>	
					</div>
				</div>
			</section>	
		</div>	
		
		
		<div class="columns eleven">
			<div class="flexslider">
			  	<ul class="slides">
			  	<?php if(isset($banner) && ! empty($banner)) : ?>
			  		<?php foreach($banner AS $banner_list) : ?>
				    <li>
				      	<img src="<?php echo base_url().'files/large/'.$banner_list->image_id.'/900' ?>">
				      	<div class="detail">
				      		<?php echo $banner_list->title; ?> <a href="<?php echo $banner_list->url; ?>">+ DETAILS</a>
				      	</div>
				    </li>
					<?php endforeach; ?>
				<?php endif; ?>
			  	</ul>
			</div>
		</div>
	</div>
</div>