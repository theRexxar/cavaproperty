<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/about') ?>" id="list"><?php echo lang('about_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('About.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/about/create') ?>" id="create_new"><?php echo lang('about_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>