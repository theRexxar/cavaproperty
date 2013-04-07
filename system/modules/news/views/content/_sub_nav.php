<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/news') ?>" id="list"><?php echo lang('news_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('News.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/news/create') ?>" id="create_new"><?php echo lang('news_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>