<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(5) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/project/project_property') ?>" id="list"><?php echo lang('project_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Project.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(5) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/project/project_property/create') ?>" id="create_new"><?php echo lang('project_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>