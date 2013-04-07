<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/project') ?>" id="list"><?php echo lang('project_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Project.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/project/create') ?>" id="create_new"><?php echo lang('project_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>