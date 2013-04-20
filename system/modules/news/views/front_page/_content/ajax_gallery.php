<?php if(isset($gallery) && ! empty($gallery)) : ?>
<?php foreach($gallery AS $gallery_list) : ?>
<a href="<?php echo base_url().'uploads/files/'.$gallery_list->image->filename; ?>" class="cboxElement" id="group1" title="<?php echo $news->title; ?>">
	<img src="<?php echo base_url().'files/large/'.$gallery_list->file_id; ?>" alt="<?php echo $news->title; ?>">
</a>
<?php endforeach; ?>
<?php endif; ?>