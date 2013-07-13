<div class="admin-box">
    
    <span class="form-horizontal">
                
        <!-- Name -->
        <div class="control-group">
            <span class="detail-label">Name :</span>
            <div class='detail-content'>
                <?php echo ! empty($form_detail->name) ? ucwords($form_detail->name) : "--"; ?>
            </div>
        </div>
        
        <!-- Email -->
        <div class="control-group">
            <span class="detail-label">Email :</span>
            <div class='detail-content'>
                <?php echo ! empty($form_detail->email) ? $form_detail->email : "--"; ?>
            </div>
        </div>
        
        <!-- Subject -->
        <div class="control-group">
            <span class="detail-label">Subject :</span>
            <div class='detail-content'>
                <?php echo ! empty($form_detail->subject) ? $form_detail->subject : "--"; ?>
            </div>
        </div>
        
        <!-- Message -->
        <div class="control-group">
            <span class="detail-label">Message :</span>
            <div class='detail-content'>
                <?php echo ! empty($form_detail->message) ? $form_detail->message : "--"; ?>
            </div>
        </div>
        
        <!-- Created -->
        <div class="control-group">
            <span class="detail-label">Submit Date :</span>
            <div class='detail-content'>
                <?php echo ! empty($form_detail->created_on) ? date('d F Y',strtotime($form_detail->created_on)) : "--"; ?>
            </div>
        </div>
        
        <div class="form-actions">
            <br/>
            <?php echo anchor($_SERVER['HTTP_REFERER'], "Back", 'class="btn btn-warning"'); ?>
        </div>
        
    </span>

</div>