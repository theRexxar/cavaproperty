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
			<ul>
				<?php 
                    $data_user  = $this->session->userdata('data_user');
                    if($data_user != "") : 
                ?>
				<li><a href="<?php echo base_url().'member/profile' ?>" class="text-green"><strong><?php echo strtoupper($data_user['name']); ?></strong></a></li>
				<li><a href="<?php echo base_url().'member/logout' ?>" class="">LOGOUT</a></li>
				<?php else : ?>
				<li><a href="" class="register">REGISTER</a></li>
				<li><a href="" class="login">LOGIN</a></li>
				<?php endif; ?>
			</ul>
		</nav>

		<?php echo Modules::run('home/member_section'); ?>
	</div>

</header>