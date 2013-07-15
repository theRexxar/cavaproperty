<div class="container space-top profile">
	<div class="row">
		<div class="columns five">
			<section class="sidebar bgwhite">
				<div class="row">
					<p class="f16 text-g">HELLO, <span class="text-g"><?php echo strtoupper($user->first_name." ".$user->last_name); ?></span></p>

					<p>
						<a href="<?php echo base_url()."member/profile"; ?>">+ EDIT PROFILE</a><br>
						<a href="<?php echo base_url()."member/schedule"; ?>">+ MY SCHEDULE</a>
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

					<?php if(! empty($related_property)) : ?>
					<div class="left mt20">
						<h5>RELATED LISTING</h5>
						<div class="thumbnail">
							<ul class="">
							<?php foreach($related_property AS $related_property_list) : ?>
								<li class="">
									<a href="<?php echo base_url().'project/detail/'.$related_property_list->slug_developer.'/'.$related_property_list->slug; ?>">
										<span><?php echo $related_property_list->title; ?> <small>+ MORE DETAIL</small></span>
									</a>
									<img src="<?php echo base_url().'files/large/'.$related_property_list->image_id.'/200/200/fit' ?>" alt="">
								</li>
							<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<?php endif; ?>
					
				</div>
			</section>	
		</div>	

		<div class="columns nine end ml10 bgwhite">
			<div class="member-area bgwhite update-profile">
			<?php if($status == "1") : ?>
				<p>
					Reset password success, Your new password: <strong><?php echo $new_pass; ?></strong>. Please change your password <a href="<?php echo base_url('member/profile'); ?>" style="text-decoration: underline;">here</a>.
				</p>
			<?php elseif($status == "2") : ?>
				<p>
					Invalid confirmation code
				</p>
			<?php elseif($status == "3") : ?>
				<p>
					Email not registered
				</p>
			<?php endif; ?>
			</div>
		</div>

	</div>

	<div class="absolute right-sidebar">
		<!-- News Widget -->
        <?php echo Modules::run('news/news_widget'); ?>
	</div>

</div>