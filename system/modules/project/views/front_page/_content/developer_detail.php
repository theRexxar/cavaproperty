<div class="container space-top our-project">
	<div class="thumbnail absolute">
		<div id="slider">
			<a href="#" class="buttons prev">left</a>
			<div class="row viewport">
			<?php if(isset($property) && ! empty($property)) : ?>
				<ul class="overview">
				<?php foreach($property AS $property_list) : ?>
					<li class="">
						<a href="<?php echo base_url().'project/detail/'.$property_list->slug_developer.'/'.$property_list->slug; ?>">
							<span><?php echo $property_list->title ?> <small>+ MORE DETAIL</small></span>
						</a>
						<img src="<?php echo base_url().'files/large/'.$property_list->image_id.'/200/200/fit' ?>" alt="">
					</li>
				<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			</div>
			<a href="#" class="buttons next">right</a>
		</div>
	</div>
	<div class="row">
		<div class="columns five">
			<section class="sidebar bgwhite">
				<div class="row">
					<!-- replace for landing -->
					<div class="columns sixteen">
						<h5>OUR PROJECT</h5>
						<p>
						<?php if(isset($developer_list) && ! empty($developer_list)) : ?>
							<?php $i=0; foreach($developer_list AS $developer_lists) : $i++; ?>
							<span class="text-lg">
								<?php echo strtoupper($developer_lists->title); ?>
							</span>
							<?php if($i != count($developer_list)) : ?>
							<br>
							<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						</p>
						<p class="clear left mt20"><a href="#" class="link-button green left" id="finder">FINDER</a></p>
					</div>
				</div>
			</section>	
		</div>	
		
		
		<div class="columns eleven">
			<div class="row">
				<div class="columns sixteen">
					<div class="left">
					<?php if(isset($latest_property) && ! empty($latest_property)) : ?>
						<?php foreach($latest_property AS $latest_property_list) : ?>
						<img src="<?php echo base_url().'files/large/'.$latest_property_list->image_id.'/720/360/fit' ?>" alt="">
						<?php endforeach; ?>
					<?php endif; ?>
					</div>
					
					<div class="right bgwhite">
						<h5>NEWS & UPDATES</h5>
						<ul class="block-grid one-up mobile-one-up">
							<li>
								<a href="">
									<span>22/11/2012</span><br>
									Serenia Hills Project Progress as of November 2012
								</a>
							</li>
							<li>
								<a href="">
									<span>22/11/2012</span><br>
									Serenia Hills Project Progress as of November 2012
								</a>
							</li>
							<li>
								<a href="">
									<span>22/11/2012</span><br>
									Serenia Hills Project Progress as of November 2012
								</a>
							</li>
							<li>
								<a href="">
									<span>22/11/2012</span><br>
									Serenia Hills Project Progress as of November 2012
								</a>
							</li>
							<li><a href="" class="button-more">+ MORE NEWS</a></li>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>