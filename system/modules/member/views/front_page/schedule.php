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
					
					<?php //if(! empty($related_property)) : ?>
					<!--<div class="left mt20">
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
					</div>-->
					<?php //endif; ?>
					
				</div>
			</section>	
		</div>	

		<div class="columns nine end ml10 bgwhite">
			<nav>
				<span class="text-lg f17">MY SCHEDULE</span>
			</nav>

			<article>
				<?php if(! empty($calendar)) : ?>
					<table cellpadding="2" cellspacing="2">
						<thead>
							<tr>
								<th>Property</th>
								<th>Date</th>
								<th>Status</th>
								<th>Agent</th>
								<th>Contact</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($calendar AS $calendar_list) : ?>
							<tr>
								<td>
									<?php echo $calendar_list->title_property; ?>
								</td>
								<td>
									<?php echo date('d F Y',strtotime($calendar_list->date)); ?>
								</td>
								<td>
									<?php echo ($calendar_list->status == "confirm" OR $calendar_list->status == "reject") ? ucfirst($calendar_list->status).'ed' : ucfirst($calendar_list->status); ?>
								</td>
								<td>
									<?php echo $calendar_list->name_marketing; ?>
								</td>
								<td>
									<?php echo $calendar_list->phone_marketing; ?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				<?php else : ?>
					<!-- kalo gak ada schedule munculin ini -->
					<p class="f17">YOU HAVE NO SCHEDULE YET</p>
					<p>To make some appointment you can adjust it form <span class="text-bg">Property Listing Detail.</span></p>
				<?php endif; ?>
			</article>
		</div>

	</div>

	<div class="absolute right-sidebar">
		<!-- News Widget -->
        <?php echo Modules::run('news/news_widget'); ?>
	</div>

</div>