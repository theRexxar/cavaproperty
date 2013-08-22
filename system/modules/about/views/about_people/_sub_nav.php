<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(5) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/about/about_people') ?>" id="list"><?php echo lang('about_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('About.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(5) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/about/about_people/create') ?>" id="create_new"><?php echo lang('about_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>