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
							<a href="<?php echo base_url().'project/developer/'.$developer_lists->slug; ?>" class="<?php echo $this->uri->segment(3) == $developer_lists->slug ? 'active' : ''; ?>">
								<?php if($developer_lists->highlight == "yes") : ?>
									<strong><?php echo strtoupper($developer_lists->title); ?></strong>
								<?php else : ?>
									<?php echo strtoupper($developer_lists->title); ?>
								<?php endif; ?>
							</a>
							<?php if($i != count($developer_list)) : ?>
							<br>
							<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						</p>

						<div id="finder-container">
							<!-- Search Widget -->
                        	<?php echo Modules::run('search/search_widget'); ?>
                        	<a href="#" class="close">x</a>
						</div>

						<p class="clear left mt20">
							<a href="#finder" class="link-button green left" id="finder">
								FINDER
							</a>
						</p>
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
					<?php else : ?>
						<div class="columns eleven bgwhite">
							<article>
								<h5>EMPTY PROJECT</h5>
							</article>
						</div>
					<?php endif; ?>
					</div>
					
					<div class="right bgwhite">
						<!-- News Widget -->
	                    <?php echo Modules::run('news/news_widget'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>