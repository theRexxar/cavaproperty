<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(5) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/marketing/marketing_calendar') ?>" id="list">Confirmed Calendar</a>
	</li>
	<li <?php echo $this->uri->segment(5) == 'rejected' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/marketing/marketing_calendar/rejected') ?>" id="list">Rejected Calendar</a>
	</li>
	<li <?php echo $this->uri->segment(5) == 'pending' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/marketing/marketing_calendar/pending') ?>" id="list">Pending Calendar</a>
	</li>
	<?php if ($this->auth->has_permission('Marketing.Content.Create')) : ?>
	<!--<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/marketing/create') ?>" id="create_new"><?php echo lang('marketing_new'); ?></a>
	</li>-->
	<?php endif; ?>
</ul>