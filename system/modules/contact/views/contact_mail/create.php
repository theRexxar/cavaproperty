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
    <h3>Create Mail Form</h3>

    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <!-- Name -->
        <div class="control-group <?php echo form_error('name') ? 'error' : ''; ?>">
            <?php echo form_label('Name'. lang('bf_form_label_required'), 'name', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="name" type="text" name="name" maxlength="255" value="<?php echo set_value('name', isset($contact['name']) ? $contact['name'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('name'); ?></span>
            </div>
        </div>

        <!-- Email -->
        <div class="control-group <?php echo form_error('email') ? 'error' : ''; ?>">
            <?php echo form_label('Email'. lang('bf_form_label_required'), 'email', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="email" type="text" name="email" maxlength="255" value="<?php echo set_value('email', isset($contact['email']) ? $contact['email'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('email'); ?></span>
            </div>
        </div>

        <!-- Subject -->
        <div class="control-group <?php echo form_error('subject') ? 'error' : ''; ?>">
            <?php echo form_label('Subject', 'subject', array('class' => "control-label") ); ?>
            <div class='controls'>
                <input id="subject" type="text" name="subject" maxlength="255" value="<?php echo set_value('subject', isset($contact['subject']) ? $contact['subject'] : ''); ?>"  />
                <span class="help-inline"><?php echo form_error('subject'); ?></span>
            </div>
        </div>

        <!-- Message -->
        <div class="control-group <?php echo form_error('message') ? 'error' : ''; ?>">
            <?php echo form_label('Message', 'message', array('class' => "control-label") ); ?>
            <div class='controls'>
                <?php 
                    echo form_textarea( array( 
                                                'name'  => 'message', 
                                                'id'    => 'message', 
                                                'rows'  => '6', 
                                                'cols'  => '80', 
                                                'class' => 'wysiwyg-advanced', 
                                                'value' => set_value('message', isset($contact['message']) ? $contact['message'] : ''),
                                                ) 
                                        )
                ?>
                <span class="help-inline"><?php echo form_error('message'); ?></span>
            </div>
        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Create Mail Form" />
            or <?php echo anchor(SITE_AREA .'/content/contact/contact_mail', lang('contact_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
