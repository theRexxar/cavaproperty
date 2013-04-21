<div class="container space-top">
	<div class="row bgwhite">
		<div class="columns five">
			<section class="sidebar">
				<div class="row">
                    <div class="columns sixteen">
                        <!-- Search Widget -->
                        <?php echo Modules::run('search/search_widget'); ?>
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