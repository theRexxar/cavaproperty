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
							<span><?php echo $property_list->title ?> <small>+ MORE DETAILS</small></span>
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
						<?php if(isset($developer) && ! empty($developer)) : ?>
							<?php $i=0; foreach($developer AS $developer_list) : $i++; ?>
							<a href="<?php echo base_url().'project/developer/'.$developer_list->slug; ?>" class="<?php echo $this->uri->segment(3) == $developer_list->slug ? 'active' : ''; ?>">
								<?php if($developer_list->highlight == "yes") : ?>
									<strong><?php echo strtoupper($developer_list->title); ?></strong>
								<?php else : ?>
									<?php echo strtoupper($developer_list->title); ?>
								<?php endif; ?>
							</a>
							<?php if($i != count($developer)) : ?>
							<br>
							<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						</p>
						<p class="clear left mt20"><a href="<?php echo $base_url ?>/includes/finder.php" class="link-button green left" id="finder">FINDER</a></p>
					</div>
				</div>
			</section>	
		</div>	
		
		
		<div class="columns eleven">
			<div class="row">
				<div class="columns sixteen">
					<div class="left">
						<img src="<?php echo config_item('assets_url'); ?>images/our_project.jpg" alt="Our Project">
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