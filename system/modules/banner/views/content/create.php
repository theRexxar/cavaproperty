<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($banner) ) {
    $banner = (array)$banner;
}
$id = isset($banner['id']) ? $banner['id'] : '';
?>
<div class="admin-box">
    <h3>Create Banner</h3>
    
    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <!-- Banner Groups -->
        <div class="control-group <?php echo form_error('group_id') ? 'error' : ''; ?>">
            <?php echo form_label('Group'. lang('bf_form_label_required'), 'group_id', array('class' => "control-label") ); ?>
            <div class='controls'>
                <?php //echo form_dropdown(array('name'=>'group_id','id'=>'group_id','no_parent'=>true), $groups, isset($banner['group_id']) ? $banner['group_id'] : '', array("id" => "group_id")); ?>
                <select name="group_id" id="group_id" no_parent="1" >
                    <?php foreach($groups AS $key=>$val) : ?>
        			<option value="<?php echo $key; ?>" <?php echo isset($banner['group_id']) && $key== $banner['group_id'] ? 'selected="selected"' : ""; ?> ><?php echo $val; ?></option>
                    <?php endforeach; ?>
        		</select>
                <span class="help-inline"><?php echo form_error('group_id'); ?></span>
            </div>
        </div>
        
        <!-- Title -->
        <div class="control-group <?php echo form_error('title') ? 'error' : ''; ?>">
            <?php echo form_label('Title'. lang('bf_form_label_required'), 'title', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="title" type="text" name="title" maxlength="255" value="<?php echo set_value('title', isset($banner['title']) ? $banner['title'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('title'); ?></span>
            </div>
        </div>
        
        <!-- Summary -->
        <div class="control-group <?php echo form_error('summary') ? 'error' : ''; ?>">
            <?php echo form_label('Summary'. lang('bf_form_label_required'), 'summary', array('class' => "control-label") ); ?>
            <div class='controls'>
                <?php 
                    echo form_textarea( array( 
                                                'name'  => 'summary', 
                                                'id'    => 'summary', 
                                                'rows'  => '5', 
                                                'cols'  => '80', 
                                                'class' => 'wysiwyg-advanced', 
                                                'value' => set_value('summary', isset($banner['summary']) ? $banner['summary'] : '') 
                                                ) 
                                        )
                ?>
                <span class="help-inline"><?php echo form_error('summary'); ?></span>
            </div>
        </div>
                
        <!-- Image -->
    	<div class="control-group <?php echo form_error('image_id') ? 'error' : '' ?>">
    		<?php echo form_label('Image'. lang('bf_form_label_required'), 'image', array('class' => "control-label") ); ?>
    		<div class="controls">
    			<span id="span_image_id"> 
    				<input type="hidden" id="image_id" name="image_id" value="<?php echo isset($banner['image_id']) ? $banner['image_id'] : ''; ?>" />
    				<img width="200" src="<?php echo isset($banner['image_id']) && !empty($banner['image_id']) ? site_url('files/thumb/'.$banner['image_id'].'/200/fit') : img_path().'no_image.jpg'; ?>" />
    			</span>
    		</div>
    		<br />
    		<div class="controls">
    			<a href="<?php echo site_url(SITE_AREA.'/content/files/fileman/image/?target=image_id'); ?>" class="btn btn-success btn-upload-iframe" data-target="image_id">Add Image</a>
    			<a href="#" class="btn btn-danger" id="remove_image_id">Remove Image</a>		
    			<?php if (form_error('image_id')) echo '<span class="help-inline">'. form_error('image_id') .'</span>'; ?>					
    		</div>
    	</div>
        
        <!-- URL -->
        <div class="control-group <?php echo form_error('url') ? 'error' : ''; ?>">
            <?php echo form_label('URL'. lang('bf_form_label_required'), 'url', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="url" type="text" name="url" maxlength="255" value="<?php echo set_value('url', isset($banner['url']) ? $banner['url'] : ''); ?>" style="width: 50%;" />
                <span class="help-inline"><?php echo form_error('url'); ?></span>
            </div>
        </div>
        
        <!-- Publish -->
        <div class="control-group <?php echo form_error('publish') ? 'error' : ''; ?>">
            <?php echo form_label('Publish'. lang('bf_form_label_required'), 'publish', array('class' => "control-label") ); ?>
            <div class='controls'>
                <?php $publish = isset($banner['publish']) ? $banner['publish'] : ''; ?>
                <label class="radio">
					<input type="radio" name="publish" value="Y" <?php echo $publish == 'Y' ? 'checked="checked"' : ''; ?> />
					<span>Yes</span>
				</label>
                <label class="radio">
					<input type="radio" name="publish" value="N" <?php echo $publish == 'N' ? 'checked="checked"' : ''; ?> />
					<span>No</span>
				</label>
                <span class="help-inline"><?php echo form_error('banner_publish'); ?></span>
            </div>
        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="submit" class="btn btn-primary" value="Create Banner" />
            or <?php echo anchor(SITE_AREA .'/content/banner', lang('banner_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
