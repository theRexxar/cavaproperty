<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($contact) ) {
    $contact = (array)$contact;
}
$id = isset($contact['id']) ? $contact['id'] : '';
?>
<div class="admin-box">
    <h3>Create Office</h3>

    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <!-- Title -->
        <div class="control-group <?php echo form_error('title') ? 'error' : ''; ?>">
            <?php echo form_label('Title'. lang('bf_form_label_required'), 'title', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="title" type="text" name="title" maxlength="255" value="<?php echo set_value('title', isset($contact['title']) ? $contact['title'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('title'); ?></span>
            </div>
        </div>
        
        <!-- Address -->
        <div class="control-group <?php echo form_error('address') ? 'error' : ''; ?>">
            <?php echo form_label('Address'. lang('bf_form_label_required'), 'address', array('class' => "control-label") ); ?>
            <div class='controls'>
                <?php 
                    echo form_textarea( array( 
                                                'name'  => 'address', 
                                                'id'    => 'address', 
                                                'rows'  => '5', 
                                                'cols'  => '80', 
                                                'class' => 'wysiwyg-advanced', 
                                                'value' => set_value('address', isset($contact['address']) ? $contact['address'] : '') 
                                                ) 
                                        )
                ?>
                <span class="help-inline"><?php echo form_error('address'); ?></span>
            </div>
        </div>
                    
        <!-- Phone -->
        <div class="control-group <?php echo form_error('phone') ? 'error' : '' ?>">
            <?php echo form_label('Phone'. lang('bf_form_label_required'), 'phone', array('class' => "control-label") ); ?>
            <div class="controls">
                <input id="phone" type="text" name="phone" value="<?php echo set_value('phone', isset($contact['phone']) ? $contact['phone'] : ''); ?>" />
                <span class="help-inline"><?php echo form_error('phone'); ?></span>
            </div>
        </div>
                    
        <!-- Fax -->
        <div class="control-group <?php echo form_error('fax') ? 'error' : '' ?>">
            <?php echo form_label('Fax'. lang('bf_form_label_required'), 'fax', array('class' => "control-label") ); ?>
            <div class="controls">
                <input id="fax" type="text" name="fax" value="<?php echo set_value('fax', isset($contact['fax']) ? $contact['fax'] : ''); ?>" />
                <span class="help-inline"><?php echo form_error('fax'); ?></span>
            </div>
        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Create Office" />
            or <?php echo anchor(SITE_AREA .'/content/contact', lang('contact_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
