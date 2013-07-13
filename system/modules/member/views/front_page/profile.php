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
				<span class="text-lg f17">BASIC INFORMATION</span>
				<a href="<?php echo base_url()."member/listing"; ?>" class="f17">LISTING INFORMATION</a>
			</nav>

			<div id="update-profile" class="member-area bgwhite update-profile">
				<?php if (validation_errors()) : ?>
					<!-- alert message --> 
			        <div>
			    	   <?php echo validation_errors(); ?>
			        </div>
	            <?php endif; ?> 

				<form action="<?php echo base_url().'member/submit_edit_profile' ?>" class="form" method="post">
					<input type="hidden" name="user_id" value="<?php echo $user->id; ?>">

					<div class="block titles">
						<label for="">Title</label>
						<div class="input">
							<select name="title" id="">
								<option value="Mr" <?php echo $user->title == "Mr" ? "selected='selected'" : ""; ?>>Mr</option>
								<option value="Mrs" <?php echo $user->title == "Mrs" ? "selected='selected'" : ""; ?>>Mrs</option>
								<option value="Miss" <?php echo $user->title == "Miss" ? "selected='selected'" : ""; ?>>Miss</option>
							</select>
						</div>
					</div>

					<div class="block">
						<label for="">First Name</label>
						<div class="input">
							<input type="text" name="first_name" class="" value="<?php echo ! empty($user->first_name) ? $user->first_name : ""; ?>" required autofocus>
						</div>
					</div>

					<div class="block">
						<label for="">Last Name</label>
						<div class="input">
							<input type="text" name="last_name" class="" value="<?php echo ! empty($user->last_name) ? $user->last_name : ""; ?>" required >
						</div>
					</div>

					<div class="block dob">
						<label for="">Date Of Birth</label>
						<?php
							$dob 	= explode("-", $user->dob);
							$year 	= $dob[0];
							$month 	= $dob[1];
							$date 	= $dob[2];
						?>
						<div class="input date">
							<select name="day" id="">
								<?php for ($i=1; $i<32; $i++):?>
        							<?php if ($i<10) { $tgl = '0'.$i; } else { $tgl = $i; }?>
        							<option value="<?php echo $tgl; ?>" <?php echo ! empty($date) && $date == $tgl ? "selected='selected'" : ""; ?> ><?php echo $tgl; ?></option>
        						<?php endfor;?>
							</select>
						</div>

						<div class="input month">
							<select name="month" id="">
								<?php for ($i=1; $i<13; $i++)
                                    {
                                        if ($i==1)
                                            $bln="January";
                                        elseif ($i==2)
                                            $bln="February";
                                        elseif ($i==3)
                                            $bln="March";
                                        elseif ($i==4)
                                            $bln="April";
                                        elseif ($i==5)
                                            $bln="May";
                                        elseif ($i==6)
                                            $bln="June";
                                        elseif ($i==7)
                                            $bln="July";
                                        elseif ($i==8)
                                            $bln="August";
                                        elseif ($i==9)
                                            $bln="September";
                                        elseif ($i==10)
                                            $bln="October";
                                        elseif ($i==11)
                                            $bln="November";
                                        elseif ($i==12)
                                            $bln="December";
                                        if ($i<10)
                                            $ia='0'.$i;
                                        else
                                            $ia=$i;
                                ?>
                                    <option value="<?php echo $ia; ?>" <?php echo ! empty($month) && $month == $ia ? "selected='selected'" : ""; ?>><?php echo $bln; ?></option>
                                <?php
                                    } 
                                ?>
							</select>
						</div>

						<div class="input year">
							<select name="year" id="">
								<option value="">Year</option>
								<?php for ($i=1940; $i< 1996; $i++):?>
        							<option value="<?php echo $i;?>" <?php echo ! empty($year) && $year == $i ? "selected='selected'" : ""; ?>><?php echo $i;?></option>
        						<?php endfor;?>
							</select>
						</div>
					</div>

					<div class="block">
						<label for="">Address</label>
						<div class="input">
							<textarea name="address" id=""><?php echo ! empty($user->address) ? $user->address : ""; ?></textarea>
						</div>
					</div>

					<div class="block">
						<label for="">City</label>
						<div class="input">
							<input type="text" name="city" class="" value="<?php echo ! empty($user->city) ? $user->city : ""; ?>" required>
						</div>
					</div>

					<div class="block">
						<label for="">Postal Code</label>
						<div class="input">
							<input type="text" name="postal_code" class="" value="<?php echo ! empty($user->postal_code) ? $user->postal_code : ""; ?>" required >
						</div>
					</div>

					<div class="block">
						<label for="">Email Address</label>
						<div class="input">
							<input type="email" name="email" class="" value="<?php echo ! empty($user->email) ? $user->email : ""; ?>" required>
						</div>
					</div>

					<div class="block">
						<label for="">Password</label>
						<div class="input">
							<input type="password" name="password" class="">
						</div>
					</div>

					<div class="block">
						<label for="">Re-type Password</label>
						<div class="input">
							<input type="password" name="re_password" class="">
						</div>
					</div>

					<div class="block">
						<label for="">Phone</label>
						<div class="input">
							<input type="text" name="phone" class="" value="<?php echo ! empty($user->phone) ? $user->phone : ""; ?>" required>
						</div>
					</div>

					<div class="block">
						<label for="">Mobile Phone</label>
						<div class="input">
							<input type="text" name="mobile_phone" class="" value="<?php echo ! empty($user->mobile_phone) ? $user->mobile_phone : ""; ?>" required>
						</div>
					</div>

					<!--<div class="block">
						<label for="">Property</label>
						<div class="input">
							<?php foreach($property_type AS $types) : ?>
							<input type="checkbox" name="property_type[]" value="<?php echo $types->id ?>" <?php echo !empty($user->property_type) && in_array($types->id, $user_types) ? 'checked="checked"': ''; ?> > <?php echo $types->title ?><br>
							<?php endforeach; ?>
						</div>
					</div>-->

					<div class="block">
						<label for=""></label>
						<input type="submit" name="edit_profile" class="left mb20" value="submit">
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