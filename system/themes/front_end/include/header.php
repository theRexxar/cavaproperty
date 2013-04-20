<header>
	<div class="row hide-for-small">
		<div class="columns five">
			<nav class="fix">
				<div class="row">
						<div class="columns nine logo">
							<h1>
								<a href="<?php echo base_url(); ?>">
									<img src="<?php echo config_item('assets_url'); ?>images/logo.png">
								</a>
							</h1>
						</div>
						<div class="columns seven nav">
							<ul>
								<li>
									<a href="<?php echo base_url("about"); ?>" class="<?php echo $this->uri->segment(1) == 'about' ? 'active' : ''; ?>">
										ABOUT CAVA
									</a>
								</li>
								<li>
									<a href="<?php echo base_url("project"); ?>" class="<?php echo $this->uri->segment(1) == 'project' ? 'active' : ''; ?>">
										OUR PROJECTS
									</a>
								</li>
								<li>
									<a href="<?php echo base_url("news"); ?>" class="<?php echo $this->uri->segment(1) == 'news' ? 'active' : ''; ?>">
										NEWS & UPDATES
									</a>
								</li>
								<li>
									<a href="<?php echo base_url("career"); ?>" class="<?php echo $this->uri->segment(1) == 'career' ? 'active' : ''; ?>">
										CAREER
									</a>
								</li>
								<li>
									<a href="<?php echo base_url("contact"); ?>" class="<?php echo $this->uri->segment(1) == 'contact' ? 'active' : ''; ?>">
										CONTACT US
									</a>
								</li>
							</ul>
						</div>
				</div>
			</nav>
		</div>

		<nav class="right member">
			<!--<ul>
				<li><a href="../profile/index.php" class="register text-green"><strong>NICKY SEBASTIAN</strong></a></li>
				<li><a href="" class="register">REGISTER</a></li>
				<li><a href="" class="login">LOGIN</a></li>
			</ul>-->
		</nav>

		<?php //include('member.php'); ?>
	</div>

</header>