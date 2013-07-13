<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(5) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/banner/groups') ?>" id="list"><?php echo lang('banner_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Banner.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(5) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/banner/groups/create') ?>" id="create_new"><?php echo lang('banner_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>