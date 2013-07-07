<div id="login" class="member-area bgwhite slide">
	<i class="close"></i>
	<?php if (validation_errors()) : ?>
        <div class="notification error fade-me">
    	   <?php echo validation_errors(); ?>
        </div>
    <?php endif; ?> 
    
	<form action="<?php echo base_url().'member/submit_login' ?>" class="form" method="post">
		<div class="input">
			<input type="email" placeholder="Email" value="" id="" name="email" class="" required autofocus>
		</div>
		<div class="input">
			<input type="password" placeholder="Password" value="" id="" name="password" class="" required>
		</div>
		<input type="submit" class="right" value="Login">
		<a href="" class="forgot-pass left">Forgot Password</a>
	</form>
</div>

<div id="forgot-pass" class="member-area bgwhite slide">
	<i class="close"></i>
	<form action="<?php echo base_url().'member/forgot_password' ?>" class="form" method="post">
		<div class="input">
			<input type="email" placeholder="Insert Your Email" value="" id="" name="email" class="" required autofocus>
		</div>
		<input type="submit" class="right" value="submit">
		<p class="clear left">Your old-password will be send to your registered email address.</p>
	</form>
</div>

<div id="register" class="member-area bgwhite slide">
	<i class="close"></i>
	<form action="<?php echo base_url().'member/submit_sign_up' ?>" class="form" method="post">
		<div class="block titles">
			<label for="">Title</label>
			<div class="input">
				<select name="title" id="">
					<option value="Mr" <?php echo isset($_POST['title']) && $_POST['title'] == "Mr" ? "selected='selected'" : ""; ?> >Mr</option>
					<option value="Mrs" <?php echo isset($_POST['title']) && $_POST['title'] == "Mrs" ? "selected='selected'" : ""; ?> >Mrs</option>
					<option value="Miss" <?php echo isset($_POST['title']) && $_POST['title'] == "Miss" ? "selected='selected'" : ""; ?> >Miss</option>
				</select>
			</div>
		</div>

		<div class="block">
			<label for="">First Name</label>
			<div class="input">
				<input type="text" name="first_name" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ""; ?>" class="" required autofocus>
			</div>
		</div>

		<div class="block">
			<label for="">Last Name</label>
			<div class="input">
				<input type="text" name="last_name" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : ""; ?>" class="" required >
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
						<option value="<?php echo $tgl; ?>" <?php echo isset($_POST['date']) && $_POST['date'] == $tgl ? "selected='selected'" : ""; ?> ><?php echo $tgl; ?></option>
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
                        <option value="<?php echo $ia; ?>" <?php echo isset($_POST['month']) && $_POST['month'] == $ia ? "selected='selected'" : ""; ?>><?php echo $bln; ?></option>
                    <?php
                        } 
                    ?>
				</select>
			</div>

			<div class="input year">
				<select name="year" id="">
					<?php for ($i=1940; $i< 1996; $i++):?>
						<option value="<?php echo $i;?>" <?php echo isset($_POST['year']) && $_POST['year'] == $i ? "selected='selected'" : ""; ?>><?php echo $i;?></option>
					<?php endfor;?>
				</select>
			</div>
		</div>

		<div class="block">
			<label for="">Address</label>
			<div class="input">
				<textarea name="address" id=""><?php echo isset($_POST['address']) ? $_POST['address'] : ""; ?></textarea>
			</div>
		</div>

		<div class="block">
			<label for="">City</label>
			<div class="input">
				<input type="text" name="city" value="<?php echo isset($_POST['city']) ? $_POST['city'] : ""; ?>" class="" required>
			</div>
		</div>

		<div class="block">
			<label for="">Postal Code</label>
			<div class="input">
				<input type="text" name="postal_code" value="<?php echo isset($_POST['postal_code']) ? $_POST['postal_code'] : ""; ?>" class="" required >
			</div>
		</div>

		<div class="block">
			<label for="">Email Address</label>
			<div class="input">
				<input type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""; ?>" class="" required>
			</div>
		</div>

		<div class="block">
			<label for="">Password</label>
			<div class="input">
				<input type="password" name="password" class="" required>
			</div>
		</div>

		<div class="block">
			<label for="">Re-type Password</label>
			<div class="input">
				<input type="password" name="re_password" class="" required>
			</div>
		</div>

		<div class="block">
			<label for="">Phone</label>
			<div class="input">
				<input type="text" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ""; ?>" class="" required>
			</div>
		</div>

		<div class="block">
			<label for="">Mobile Phone</label>
			<div class="input">
				<input type="text" name="mobile_phone" value="<?php echo isset($_POST['mobile_phone']) ? $_POST['mobile_phone'] : ""; ?>" class="" required>
			</div>
		</div>

		<div class="block">
			<label for="">Property</label>
			<div class="input">
				<?php foreach($property_type AS $types) : ?>
				<input type="checkbox" name="property_type[]" value="<?php echo $types->id ?>" <?php echo isset($_POST['property_type']) && $_POST['property_type'] == $types->id ? 'checked="checked"': ''; ?> ><?php echo $types->title ?><br>
				<?php endforeach; ?>
			</div>
		</div>

		<input type="submit" class="right" value="submit">
	</form>
</div>