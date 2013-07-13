<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($news) ) {
    $news = (array)$news;
}
$id = isset($news['id']) ? $news['id'] : '';
?>
<div class="admin-box">
    <h3>Create News</h3>
    
    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <!-- Title -->
        <div class="control-group <?php echo form_error('title') ? 'error' : ''; ?>">
            <?php echo form_label('Title'. lang('bf_form_label_required'), 'title', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="title" type="text" name="title" maxlength="255" value="<?php echo set_value('title', isset($news['title']) ? $news['title'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('title'); ?></span>
            </div>
        </div>
                    
        <!-- Slug -->
        <div class="control-group <?php echo form_error('slug') ? 'error' : '' ?>">
            <?php echo form_label('Slug'. lang('bf_form_label_required'), 'slug', array('class' => "control-label") ); ?>
            <div class="controls">
                <input id="slug" type="text" name="slug" value="<?php echo set_value('slug', isset($news['slug']) ? $news['slug'] : ''); ?>" />
                <span class="help-inline"><?php echo form_error('slug'); ?></span>
            </div>
        </div>
        
        <!-- Description -->
        <div class="control-group <?php echo form_error('description') ? 'error' : ''; ?>">
            <?php echo form_label('Description'. lang('bf_form_label_required'), 'description', array('class' => "control-label") ); ?>
            <div class='controls'>
                <?php 
                    echo form_textarea( array( 
                                                'name'  => 'description', 
                                                'id'    => 'description', 
                                                'rows'  => '5', 
                                                'cols'  => '80', 
                                                'class' => 'wysiwyg-advanced', 
                                                'value' => set_value('description', isset($news['description']) ? $news['description'] : '') 
                                                ) 
                                        )
                ?>
                <span class="help-inline"><?php echo form_error('description'); ?></span>
            </div>
        </div>

        <!-- Post Date -->
        <div class="control-group <?php echo form_error('post_date') ? 'error' : ''; ?>">
            <?php echo form_label('Post Date'. lang('bf_form_label_required'), 'post_date', array('class' => "control-label") ); ?>
            <div class="controls">
                <input id="date" type="text" name="post_date" value="<?php echo (isset($news) && isset($news['post_date']) && !empty($news['post_date'])) ? date('m/d/Y',$news['post_date']) : ($this->input->post('post_date') ? set_value(date('m/d/Y',strtotime($this->input->post('post_date')))) : date('m/d/Y',time())); ?>"  />
                <span class="help-inline"><?php echo form_error('post_date'); ?></span>
            </div>
        </div>
        
        <!-- Image -->
    	<div class="control-group <?php echo form_error('image_id') ? 'error' : '' ?>">
    		<?php echo form_label('Image'. lang('bf_form_label_required'), 'image', array('class' => "control-label") ); ?>
    		<div class="controls">
    			<span id="span_image_id"> 
    				<input type="hidden" id="image_id" name="image_id" value="<?php echo isset($news['image_id']) ? $news['image_id'] : ''; ?>" />
    				<img width="200" src="<?php echo isset($news['image_id']) && !empty($news['image_id']) ? site_url('files/thumb/'.$news['image_id'].'/200/fit') : img_path().'no_image.jpg'; ?>" />
    			</span>
    		</div>
    		<br />
    		<div class="controls">
    			<a href="<?php echo site_url(SITE_AREA.'/content/files/fileman/image/?target=image_id'); ?>" class="btn btn-success btn-upload-iframe" data-target="image_id">Add Image</a>
    			<a href="#" class="btn btn-danger" id="remove_image_id">Remove Image</a>		
    			<?php if (form_error('image_id')) echo '<span class="help-inline">'. form_error('image_id') .'</span>'; ?>					
    		</div>
    	</div>
        
        <!-- Gallery -->
		<div class="control-group">
			<?php echo form_label('Gallery', '', array('class' => "control-label") ); ?>
			<div class='controls'>
				<span id="gallery">
				<?php if(isset($news->image_gallery) && $news->image_gallery !== false) : ?>
				<p id="no-image" style="display:none;">Empty image gallery.</p>
					<?php foreach($news->image_gallery as $image) : ?>
					<span class="img-gallery">
						<input type="hidden" name="images[]" value="<?php echo $image->file_id; ?>" />
						<img width="100" height="100" src="<?php echo site_url('files/thumb/'.$image->file_id.'/100/100/fill'); ?>" />&nbsp;
						<a href="#" class="btn btn-danger remove-image">Remove</a>
					</span>
					<?php endforeach; ?>
				<?php else: ?>
				    <p id="no-image" style="display:block;">
                        <img width="100" height="100" src="<?php echo config_item('assets_url').'images/no_image.jpg' ?>" />
                    </p>
				<?php endif; ?>
				</span>
                <br />
                <span>
                    <a href="<?php echo site_url(SITE_AREA.'/content/files/fileman/image/?target=gallery'); ?>" class="btn btn-success btn-upload-iframe">Add Image</a>
                </span>
			</div>
		</div>
        


        <div class="form-actions">
            <br/>
            <input type="submit" name="submit" class="btn btn-primary" value="Create News" />
            or <?php echo anchor(SITE_AREA .'/content/news', lang('news_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
