<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($project) ) {
    $project = (array)$project;
}
$id = isset($project['id']) ? $project['id'] : '';
?>
<div class="admin-box">
    <h3>Create Property</h3>

    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <!-- Type -->
        <div class="control-group <?php echo form_error('type_id') ? 'error' : ''; ?>">
            <?php echo form_label('Type'. lang('bf_form_label_required'), 'type_id', array('class' => "control-label") ); ?>
            <div class='controls'>
                <select name="type_id" id="type_id" no_parent="1" style="width: 230px;" >
                    <?php foreach($category AS $category_list) : ?>
                    <optgroup label="<?php echo $category_list->title; ?>">
                        <?php foreach($category_list->type AS $type_list) : ?>
                        <option value="<?php echo $type_list->id; ?>" <?php echo isset($project['type_id']) && $type_list->id == $project['type_id'] ? 'selected="selected"' : ""; ?> ><?php echo $type_list->title; ?></option>
                        <?php endforeach; ?>
                    </optgroup>
                    <?php endforeach; ?>
                </select>
                <span class="help-inline"><?php echo form_error('type_id'); ?></span>
            </div>
        </div>

        <!-- Title -->
        <div class="control-group <?php echo form_error('title') ? 'error' : ''; ?>">
            <?php echo form_label('Title'. lang('bf_form_label_required'), 'title', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="title" type="text" name="title" maxlength="255" value="<?php echo set_value('title', isset($project['title']) ? $project['title'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('title'); ?></span>
            </div>
        </div>

        <!-- Slug -->
        <div class="control-group <?php echo form_error('slug') ? 'error' : ''; ?>">
            <?php echo form_label('Slug'. lang('bf_form_label_required'), 'slug', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="slug" type="text" name="slug" maxlength="255" value="<?php echo set_value('slug', isset($project['slug']) ? $project['slug'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('slug'); ?></span>
            </div>
        </div>

        <!-- Location -->
        <div class="control-group <?php echo form_error('location') ? 'error' : ''; ?>">
            <?php echo form_label('Location'. lang('bf_form_label_required'), 'location', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="location" type="text" name="location" maxlength="255" value="<?php echo set_value('location', isset($project['location']) ? $project['location'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('location'); ?></span>
            </div>
        </div>

        <!-- Size -->
        <div class="control-group <?php echo form_error('size') ? 'error' : ''; ?>">
            <?php echo form_label('Size'. lang('bf_form_label_required'), 'size', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="size" type="text" name="size" maxlength="255" value="<?php echo set_value('size', isset($project['size']) ? $project['size'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('size'); ?></span>
            </div>
        </div>

        <!-- Bedroom -->
        <div class="control-group <?php echo form_error('bedroom') ? 'error' : ''; ?>">
            <?php echo form_label('Bedroom'. lang('bf_form_label_required'), 'bedroom', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="bedroom" type="text" name="bedroom" maxlength="3" style="width: 20px;" value="<?php echo set_value('bedroom', isset($project['bedroom']) ? $project['bedroom'] : ''); ?>"  />
                Bedroom(s)
                <span class="help-inline"><?php echo form_error('bedroom'); ?></span>
            </div>
        </div>

        <!-- Facility -->
        <div class="control-group <?php echo form_error('facility') ? 'error' : ''; ?>">
            <?php echo form_label('Facility'. lang('bf_form_label_required'), 'facility', array('class' => "control-label") ); ?>
            <div class='controls'>
                <?php 
                    echo form_textarea( array( 
                                                'name'  => 'facility', 
                                                'id'    => 'facility', 
                                                'rows'  => '5', 
                                                'cols'  => '80', 
                                                'class' => 'wysiwyg-advanced', 
                                                'value' => set_value('facility', isset($project['facility']) ? $project['facility'] : '') 
                                                ) 
                                        )
                ?>
                <span class="help-inline"><?php echo form_error('facility'); ?></span>
            </div>
        </div>

        <!-- Condition -->
        <div class="control-group <?php echo form_error('condition') ? 'error' : ''; ?>">
            <?php echo form_label('Condition'. lang('bf_form_label_required'), 'condition', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="condition" type="text" name="condition" maxlength="255" value="<?php echo set_value('condition', isset($project['condition']) ? $project['condition'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('condition'); ?></span>
            </div>
        </div>

        <!-- Additional -->
        <div class="control-group <?php echo form_error('additional') ? 'error' : ''; ?>">
            <?php echo form_label('Additional', 'additional', array('class' => "control-label") ); ?>
            <div class='controls'>
                <?php 
                    echo form_textarea( array( 
                                                'name'  => 'additional', 
                                                'id'    => 'additional', 
                                                'rows'  => '5', 
                                                'cols'  => '80', 
                                                'class' => 'wysiwyg-advanced', 
                                                'value' => set_value('additional', isset($project['additional']) ? $project['additional'] : '') 
                                                ) 
                                        )
                ?>
                <span class="help-inline"><?php echo form_error('additional'); ?></span>
            </div>
        </div>
        
        <!-- Image -->
        <div class="control-group <?php echo form_error('image_id') ? 'error' : '' ?>">
            <?php echo form_label('Image'. lang('bf_form_label_required'), 'image', array('class' => "control-label") ); ?>
            <div class="controls">
                <span id="span_image_id"> 
                    <input type="hidden" id="image_id" name="image_id" value="<?php echo isset($project['image_id']) ? $project['image_id'] : ''; ?>" />
                    <img width="200" src="<?php echo isset($project['image_id']) && !empty($project['image_id']) ? site_url('files/thumb/'.$project['image_id'].'/200/fit') : img_path().'no_image.jpg'; ?>" />
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
                <?php if(isset($project->image_gallery) && $project->image_gallery !== false) : ?>
                <p id="no-image" style="display:none;">Empty image gallery.</p>
                    <?php foreach($project->image_gallery as $image) : ?>
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
            <input type="submit" name="save" class="btn btn-primary" value="Create Property" />
            or <?php echo anchor(SITE_AREA .'/content/project/project_property', lang('project_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>