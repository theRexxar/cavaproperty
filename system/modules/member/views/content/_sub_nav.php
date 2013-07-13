<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/member') ?>" id="list"><?php echo lang('member_list'); ?></a>
	</li>
	<li <?php echo $this->uri->segment(4) == 'blocked' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/member/blocked') ?>" id="create_new">Blocked Member List</a>
	</li>
	<?php if ($this->auth->has_permission('Member.Content.Create')) : ?>
	<!--<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/member/create') ?>" id="create_new"><?php echo lang('member_new'); ?></a>
	</li>-->
	<?php endif; ?>
</ul>