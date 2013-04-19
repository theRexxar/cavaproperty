<div class="container space-top contact">
	<div class="row">
		<div class="columns five">
			<section class="sidebar bgwhite">
				<div class="row">
					<div class="columns fourteen offset-by-one">
						<h5>CONTACT US</h5>
						<strong>SALES & MARKETING</strong>
						<ul class="block-grid one-up list-contact">
							<li><a href="#contact1" data-id="0" class="text-green">Mail Service</a></li>
							<li><a href="#contact2" data-id="1" class="text-green">Phone Service</a></li>
						</ul>
					<?php if(isset($office) && ! empty($office)) : ?>
						<?php foreach($office AS $office_list) : ?>
						<strong><?php echo strtoupper($office_list->title) ?></strong>
						<p>
							<?php echo str_replace(array("<p>","</p>"), "", $office_list->address); ?>
							<br>
							Ph. <span class="text-green"><?php echo $office_list->phone; ?></span>
							<br>
							Fax. <span class="text-green"><?php echo $office_list->fax; ?></span>
						</p>
						<?php endforeach; ?>
					<?php endif; ?>
					</div>
				</div>
			</section>
		</div>
		<div class="columns eleven scroll-content">
			<div class="row scroll-container">
				<div class="bgwhite ml10" id="contact1">
					<article>
						<h5 class="text-green">Mail Service</h5>
						<p>Please fill the form below, our agent need your short bio to contact you. Thank you.</p>
						<div class="row">
							<div class="columns twelve">

								<?php if (isset($mail_error)) : ?>
			                        <!-- error message --> 
			                        <div class="alert-box secondary">
						                <?php echo $mail_error; ?>
						                <a href="" class="close">×</a>
						            </div>
			                    <?php endif; ?>

			                    <?php if(! empty($mail_message)) : ?>
			                         <!-- success message --> 
			                        <div class="alert-box success">
						                <?php echo $mail_message; ?>
						                <a href="" class="close">×</a>
						            </div>
			                    <?php endif; ?> 

								<form action="<?php echo base_url().'contact' ?>" method="post" autocomplete="on">
									<div class="input">
										<input type="text" name="name" placeholder="Full Name*" required>
									</div>
									<div class="input">
										<input type="email" name="email" placeholder="Email Address*" required>
									</div>
									<div class="input">
										<input type="text" name="subject" placeholder="Subject*" required>
									</div>
									<div class="input">
										<textarea name="message" id="" cols="30" rows="5" required></textarea>
									</div>
									<div class="left message">
										* required field
									</div>
									<div class=" right">
										<input type="submit" name="submit_mail" class="send" value="SEND">
									</div>
								</form>	
							</div>
						</div>
					</article>
				</div>
				<div class="bgwhite ml10" id="contact2">
					<article>
						<h5 class="text-green">PHONE SERVICE</h5>
						<p>Please fill the form below, our agent need your short bio to contact you. Thank you.</p>
						<div class="row">
							<div class="columns twelve">

								<?php if (isset($phone_error)) : ?>
			                        <!-- error message --> 
			                        <div class="alert-box secondary">
						                <?php echo $phone_error; ?>
						                <a href="" class="close">×</a>
						            </div>
			                    <?php endif; ?>

			                    <?php if(! empty($phone_message)) : ?>
			                         <!-- success message --> 
			                        <div class="alert-box success">
						                <?php echo $phone_message; ?>
						                <a href="" class="close">×</a>
						            </div>
			                    <?php endif; ?> 

								<form action="<?php echo base_url().'contact' ?>" method="post">
									<div class="input">
										<input type="text" name="name" placeholder="Full Name*" required>
									</div>
									<div class="input">
										<input type="text" name="phone" placeholder="Phone Number*" required>
									</div>
									<div class="input">
										<input type="text" name="other_phone" placeholder="Other Phone Number*" required>
									</div>
									<div class="input">
										<input type="text" name="subject" placeholder="subject*" required>
									</div>
									<div class="left message">
										* required field
									</div>
									<div class=" right">
										<input type="submit" name="submit_phone" class="send" value="SEND">
									</div>
								</form>	
							</div>
						</div>
					</article>
				</div>
			</div>
		</div>
	</div>
</div>