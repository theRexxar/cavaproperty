<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/career') ?>" id="list"><?php echo lang('career_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Career.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/career/create') ?>" id="create_new"><?php echo lang('career_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>