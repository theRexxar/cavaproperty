<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/contact') ?>" id="list"><?php echo lang('contact_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Contact.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/contact/create') ?>" id="create_new"><?php echo lang('contact_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>