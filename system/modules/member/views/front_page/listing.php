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
			<nav>
				<a href="<?php echo base_url()."member/profile"; ?>" class="f17">BASIC INFORMATION</a>
				<span class="text-lg f17">LISTING INFORMATION</span>
			</nav>

			<div id="update-profile" class="member-area bgwhite update-profile">
				<?php if (isset($error)) : ?>
                    <!-- error message --> 
                    <div class="alert-box secondary">
		                <?php echo $error; ?>
		                <a href="" class="close">×</a>
		            </div>
                <?php endif; ?>

                <?php if(! empty($message)) : ?>
                     <!-- success message --> 
                    <div class="alert-box success">
		                <?php echo $message; ?>
		            </div>
                <?php endif; ?> 

				<form action="<?php echo base_url().'member/listing' ?>" class="form" method="post">
					<input type="hidden" name="user_id" value="<?php echo $user->id; ?>">

					<div class="block">
						<label for="">Property Type</label>
						<div class="input">
							<select name="type_id">
								<?php foreach($property_type AS $type_list) : ?>
								<?php if($type_list->slug == "apartement" OR $type_list->slug == "house" OR $type_list->slug == "office") : ?>
								<option value="<?php echo $type_list->id; ?>" <?php echo ! empty($user_listing) && $user_listing->type_id == $type_list->id ? "selected='selected'" : ""; ?>>
									<?php echo $type_list->title; ?>
								</option>
								<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="block titles">
						<label for="">Property Status</label>
						<div class="input">
							<select name="status">
								<option value="buy" <?php echo ! empty($user_listing) && $user_listing->status == "buy" ? "selected='selected'" : ""; ?>>
									Buy
								</option>
								<option value="rent" <?php echo ! empty($user_listing) && $user_listing->status == "rent" ? "selected='selected'" : ""; ?>>
									Rent
								</option>
							</select>
						</div>
					</div>

					<div class="block">
						<label for="">Location</label>
						<div class="input">
							<select name="location_id">
								<?php foreach($property_location AS $location_list) : ?>
								<option value="<?php echo $location_list->id ?>" <?php echo ! empty($user_listing) && $user_listing->location_id == $location_list->id ? "selected='selected'" : ""; ?>>
									<?php echo $location_list->title; ?>
								</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<!--<div class="block">
						<label for="">Province</label>
						<div class="input">
							<select name="title" id="">
								<option value="">Jakarta</option>
								<option value="">Jawa Barat</option>
								<option value="">Bali</option>
							</select>
						</div>
					</div>-->

					<div class="block">
						<label for="">City</label>
						<div class="input">
							<select name="city_id">
								<?php foreach($property_city AS $city_list) : ?>
								<option value="<?php echo $city_list->id ?>" <?php echo ! empty($user_listing) && $user_listing->city_id == $city_list->id ? "selected='selected'" : ""; ?>>
									<?php echo $city_list->title; ?>
								</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="block">
						<label for="">Bedrooms</label>
						<div class="input">
							<select name="bedroom">
								<option value="1" <?php echo ! empty($user_listing) && $user_listing->bedroom == "1" ? "selected='selected'" : ""; ?> >1</option>
								<option value="2" <?php echo ! empty($user_listing) && $user_listing->bedroom == "2" ? "selected='selected'" : ""; ?> >2</option>
								<option value="3" <?php echo ! empty($user_listing) && $user_listing->bedroom == "3" ? "selected='selected'" : ""; ?> >3</option>
								<option value="4" <?php echo ! empty($user_listing) && $user_listing->bedroom == "4" ? "selected='selected'" : ""; ?> > > 3</option>
							</select>
						</div>
					</div>

					<!--<div class="block">
						<label for="">Minimum Price</label>
						<div class="input">
							<select name="title" id="">
								<option value="">1.000.000 - 2.000.000</option>
							</select>
						</div>
					</div>

					<div class="block">
						<label for="">Maximum Price</label>
						<div class="input">
							<select name="title" id="">
								<option value="">10.000.000 - 20.000.000</option>
							</select>
						</div>
					</div>-->

					<div class="block">
						<label for=""></label>
						<input type="submit" name="edit_listing" class="left mb20" value="Submit">
					</div>

				</form>
			</div>
		</div>

	</div>

	<div class="absolute right-sidebar">
		<!-- News Widget -->
        <?php echo Modules::run('news/news_widget'); ?>
	</div>

</div>