<div class="right bgwhite">
<h5>NEWS & UPDATES</h5>
<?php if(isset($news) && ! empty($news)) : ?>
<ul class="block-grid one-up mobile-one-up">
	<?php foreach($news AS $news_list) : ?>
	<li>
		<a href="<?php echo base_url().'news#'.$news_list->slug; ?>">
			<span><?php echo date('d/m/Y',strtotime($news_list->created_on));?></span>
			<br>
			<?php echo $news_list->title; ?>
		</a>
	</li>
	<?php endforeach; ?>
	<li>
		<a href="<?php echo base_url().'news'; ?>" class="button-more">
			+ MORE NEWS
		</a>
	</li>
</ul>
<?php endif; ?>
</div>