<div class="container space-top our-project">
	
	<div class="row">
		<div class="columns five bgwhite">
			<section class="sidebar">
				<div class="row">
					<div class="columns sixteen">
						<h5><?php echo $property->title ?></h5>
						<p>
							<span class="text-lg">LOCATION</span><br>
							<span class="mlr10"><?php echo $property->location ?></span>
						</p>
						<p>
							<span class="text-lg">SIZE</span><br>
							<span class="mlr10"><?php echo $property->size ?></span>
						</p>
						<p>
							<span class="text-lg">BEDROOM</span><br>
							<span class="mlr10"><?php echo $property->bedroom ?></span>
						</p>
						<p>
							<span class="text-lg">FACILITY</span><br>
							<span class="mlr10">
								<?php echo $property->facility ?>
							</span>
						</p>
						<p>
							<span class="text-lg">CONDITION</span><br>
							<span class="mlr10">
								<p><?php echo $property->condition ?></p>
							</span>
						</p>
						<p>
							<span class="text-lg">ADDITIONAL</span><br>
							<span class="mlr10">
								<?php echo $property->additional ?>
							</span>
						</p>
						<p class="clear left mt20"><a href="<?php echo base_url().'project/developer/'.$property->slug_developer; ?>" class="right button-more"><span>+</span> MORE PROJECT</a></p>
						<p class="clear left mt20"><a href="#" class="link-button green left">FINDER</a></p>
					</div>
				</div>
			</section>	
		</div>	
		
		
		<div class="columns eleven">
			<div class="row">
				<div class="columns sixteen">
					<div id="carousel" class="carousel module">
					    <ul>
					    	<?php if(! empty($property->youtube)) : ?>
					        <li class="video">
					        	<i class="play"></i>
					        	<img src="<?php echo base_url().'files/large/'.$property->image_id.'/720/360/fit' ?>" alt="">
								<div class="video-content">
									<!-- <i class="close">x</i> -->
									<object width="720" height="360">
										<param name="movie" value="http://www.youtube.com/v/<?php echo $property->youtube; ?>?hl=en_US&amp;version=3"></param>
										<param name="allowFullScreen" value="true"></param>
										<param name="allowscriptaccess" value="always"></param>
										<embed src="http://www.youtube.com/v/<?php echo $property->youtube; ?>?hl=en_US&amp;version=3" type="application/x-shockwave-flash" width="720" height="360" allowscriptaccess="always" allowfullscreen="true"></embed>
									</object>
								</div>
					        </li>
					    	<?php endif; ?>

					        <?php if(! empty($property->gallery)) : ?>
					        <?php foreach($property->gallery AS $gallery_list) : ?>
					        <li>
					        	<img src="<?php echo base_url().'files/large/'.$gallery_list->file_id.'/720/360/fit' ?>" alt="">
					        	<p class="text">
					        		<?php echo $gallery_list->caption; ?>
					        	</p>
					        </li>
					    	<?php endforeach; ?>
					        <?php endif; ?>                     
					        
					        <li class="contact">
					        	<article>
					        		<p>Make Appoinment <br>or Contact Our Agent</p>
					        		<span><?php echo $property->name_marketing; ?></span>
					        		<span class=""><?php echo $property->phone_marketing; ?></span>
					        		<a href="mailto:<?php echo $property->email_marketing; ?>?subject=<?php echo $property->title; ?>"><?php echo $property->email_marketing; ?></a>
					        	</article>
					        </li>                          
					    </ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>