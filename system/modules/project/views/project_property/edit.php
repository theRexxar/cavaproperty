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
    <h3>Edit Property</h3>

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

        <!-- Developer -->
        <div class="control-group <?php echo form_error('developer_id') ? 'error' : ''; ?>">
            <?php echo form_label('Developer'. lang('bf_form_label_required'), 'developer_id', array('class' => "control-label") ); ?>
            <div class='controls'>
                <select name="developer_id" id="developer_id" no_parent="1" style="width: 230px;" >
                    <?php foreach($developer AS $developer_list) : ?>
                    <option value="<?php echo $developer_list->id; ?>" <?php echo isset($project['developer_id']) && $developer_list->id == $project['developer_id'] ? 'selected="selected"' : ""; ?> ><?php echo $developer_list->title; ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="help-inline"><?php echo form_error('developer_id'); ?></span>
            </div>
        </div>

        <!-- Marketing Agent -->
        <div class="control-group <?php echo form_error('marketing_id') ? 'error' : ''; ?>">
            <?php echo form_label('Marketing Agent'. lang('bf_form_label_required'), 'marketing_id', array('class' => "control-label") ); ?>
            <div class='controls'>
                <select name="marketing_id" id="marketing_id" no_parent="1" style="width: 230px;" >
                    <?php foreach($marketing AS $marketing_list) : ?>
                    <option value="<?php echo $marketing_list->id; ?>" <?php echo isset($project['marketing_id']) && $marketing_list->id == $project['marketing_id'] ? 'selected="selected"' : ""; ?> ><?php echo $marketing_list->name; ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="help-inline"><?php echo form_error('marketing_id'); ?></span>
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
        <div class="control-group <?php echo form_error('location_id') ? 'error' : ''; ?>">
            <?php echo form_label('Location'. lang('bf_form_label_required'), 'location_id', array('class' => "control-label") ); ?>
            <div class='controls'>
                <select name="location_id" id="location_id" no_parent="1" style="width: 230px;" >
                    <?php foreach($location AS $location_list) : ?>
                    <option value="<?php echo $location_list->id; ?>" <?php echo isset($project['location_id']) && $location_list->id == $project['location_id'] ? 'selected="selected"' : ""; ?> ><?php echo $location_list->title; ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="help-inline"><?php echo form_error('location_id'); ?></span>
            </div>
        </div>

        <!-- Address -->
        <div class="control-group <?php echo form_error('address') ? 'error' : ''; ?>">
            <?php echo form_label('Address', 'address', array('class' => "control-label") ); ?>
            <div class='controls'>
                <?php 
                    echo form_textarea( array( 
                                                'name'  => 'address', 
                                                'id'    => 'address', 
                                                'rows'  => '5', 
                                                'cols'  => '80', 
                                                'style' =>  'width: 300px;',
                                                'value' => set_value('address', isset($project['address']) ? $project['address'] : '') 
                                                ) 
                                        )
                ?>
                <span class="help-inline"><?php echo form_error('address'); ?></span>
            </div>
        </div>

        <!-- Size -->
        <div class="control-group <?php echo form_error('size') ? 'error' : ''; ?>">
            <?php echo form_label('Size', 'size', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="size" type="text" name="size" maxlength="255" value="<?php echo set_value('size', isset($project['size']) ? $project['size'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('size'); ?></span>
            </div>
        </div>

        <!-- Bedroom -->
        <div class="control-group <?php echo form_error('bedroom') ? 'error' : ''; ?>">
            <?php echo form_label('Bedroom', 'bedroom', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="bedroom" type="text" name="bedroom" maxlength="3" style="width: 20px;" value="<?php echo set_value('bedroom', isset($project['bedroom']) ? $project['bedroom'] : ''); ?>"  />
                Bedroom(s)
                <span class="help-inline"><?php echo form_error('bedroom'); ?></span>
            </div>
        </div>

        <!-- Facility -->
        <div class="control-group <?php echo form_error('facility') ? 'error' : ''; ?>">
            <?php echo form_label('Facility', 'facility', array('class' => "control-label") ); ?>
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
            <?php echo form_label('Condition', 'condition', array('class' => "control-label") ); ?>
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

        <!-- Youtube -->
        <div class="control-group <?php echo form_error('youtube') ? 'error' : ''; ?>">
            <?php echo form_label('Youtube ID', 'youtube', array('class' => "control-label") ); ?>
            <div class='controls'>
                http://www.youtube.com/watch?v=
                <input id="youtube" type="text" name="youtube" maxlength="255" value="<?php echo set_value('youtube', isset($project['youtube']) ? $project['youtube'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('youtube'); ?></span>
                <br>
                <span class="help-inline">
                    <i>Ex: http://www.youtube.com/watch?v=<strong>YJ66_zLvE8k</strong></i>
                </span>
            </div>
        </div>

        <!-- Vimeo -->
        <div class="control-group <?php echo form_error('vimeo') ? 'error' : ''; ?>">
            <?php echo form_label('Vimeo ID', 'vimeo', array('class' => "control-label") ); ?>
            <div class='controls'>
                http://vimeo.com/
                <input id="vimeo" type="text" name="vimeo" maxlength="255" value="<?php echo set_value('vimeo', isset($project['vimeo']) ? $project['vimeo'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('vimeo'); ?></span>
                <br>
                <span class="help-inline">
                    <i>Ex: http://vimeo.com/<strong>7102325</strong></i>
                </span>
            </div>
        </div>

        <!-- Highlight -->
        <div class="control-group <?php echo form_error('highlight') ? 'error' : ''; ?>">
            <?php echo form_label('Highlight'. lang('bf_form_label_required'), 'highlight', array('class' => "control-label") ); ?>
            <div class='controls'>
                <label class="radio">
                    <input id="highlight" type="radio" name="highlight" value="yes" <?php echo $project[highlight] == "yes" ? "checked='checked'" : "" ?> >
                    <span>Yes</span>
                </label>
                <label class="radio">
                    <input id="highlight" type="radio" name="highlight" value="no" <?php echo $project[highlight] == "no" ? "checked='checked'" : "" ?> >
                    <span>No</span>
                </label>
                <span class="help-inline"><?php echo form_error('highlight'); ?></span>
            </div>
        </div>
        
        <!-- Image -->
        <div class="control-group <?php echo form_error('image_id') ? 'error' : '' ?>">
            <?php echo form_label('Image'. lang('bf_form_label_required'), '', array('class' => "control-label") ); ?>
            <div class="controls">
                <span id="span_image_id"> 
                    <input type="hidden" id="image_id" name="image_id" value="<?php echo isset($project['image_id']) ? $project['image_id'] : ''; ?>" />
                    <img width="200" src="<?php echo isset($project['image_id']) && !empty($project['image_id']) ? site_url('files/thumb/'.$project['image_id'].'/200/fit') : img_path().'no_image.jpg'; ?>" />
                </span>
            </div>
            <br />
            <div class="controls">
                <a href="<?php echo site_url(SITE_AREA.'/content/files/fileman/image/?target=image_id'); ?>" class="btn btn-success btn-upload-iframe" data-target="image_id">Add Image</a>
                <a href="#" id="delete-button" class="btn btn-danger delete-image" rel="<?php echo $project['id']; ?>">Remove Image</a>        
                <?php if (form_error('image_id')) echo '<span class="help-inline">'. form_error('image_id') .'</span>'; ?>                  
            </div>
        </div>
        
        <!-- Gallery -->
        <div class="control-group">
            <?php echo form_label('Gallery', '', array('class' => "control-label") ); ?>
            <div class='controls'>
                <span id="gallery">
                <?php if(isset($project['image_gallery']) && $project['image_gallery'] !== false) : ?>
                    <?php foreach($project['image_gallery'] as $image) : ?>
                    <span class="img-gallery">
                        <input type="hidden" name="gallery_id[]" value="<?php echo $image->id; ?>">
                        <img width="100" height="100" src="<?php echo site_url('files/thumb/'.$image->file_id.'/100/100/fit'); ?>" />&nbsp;
                        <a href="#" class="btn btn-danger delete-gallery" rel="<?php echo $image->id; ?>">Remove</a>
                        <br />
                        <textarea name="caption_update[]" placeholder="Caption" style="margin-top: 5px;"><?php echo $image->caption; ?></textarea>
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
                    <a href="<?php echo site_url(SITE_AREA.'/content/files/fileman/image/?target=gallery'); ?>" class="btn btn-success btn-upload-iframe">Select Image</a>
                </span>
            </div>
        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Edit Property" />
            or <?php echo anchor(SITE_AREA .'/content/project/project_property', lang('project_cancel'), 'class="btn btn-warning"'); ?>
            

    <?php if ($this->auth->has_permission('Project.Content.Delete')) : ?>

            or <button type="submit" name="delete" class="btn btn-danger" id="delete-me" onclick="return confirm('<?php echo lang('project_delete_confirm'); ?>')">
            <i class="icon-trash icon-white">&nbsp;</i>&nbsp;<?php echo lang('project_delete_record'); ?>
            </button>

    <?php endif; ?>


        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>

<!-- javascript for delete gallery -->
<script>
    var URL_IMAGE   = '<?php echo site_url(SITE_AREA ."/content/project/project_property/delete_image") ?>' ;
    var URL_GALLERY = '<?php echo site_url(SITE_AREA ."/content/project/project_property/delete_gallery") ?>' ;
</script>