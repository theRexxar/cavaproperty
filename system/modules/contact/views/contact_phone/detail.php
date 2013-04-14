<div class="admin-box">
    
    <span class="form-horizontal">
                
        <!-- Name -->
        <div class="control-group">
            <span class="detail-label">Name :</span>
            <div class='detail-content'>
                <?php echo ! empty($form_detail->name) ? ucwords($form_detail->name) : "--"; ?>
            </div>
        </div>
        
        <!-- Phone -->
        <div class="control-group">
            <span class="detail-label">Phone :</span>
            <div class='detail-content'>
                <?php echo ! empty($form_detail->phone) ? $form_detail->phone : "--"; ?>
            </div>
        </div>
        
        <!-- Other Phone -->
        <div class="control-group">
            <span class="detail-label">Other Phone :</span>
            <div class='detail-content'>
                <?php echo ! empty($form_detail->other_phone) ? $form_detail->other_phone : "--"; ?>
            </div>
        </div>
        
        <!-- Subject -->
        <div class="control-group">
            <span class="detail-label">Subject :</span>
            <div class='detail-content'>
                <?php echo ! empty($form_detail->subject) ? $form_detail->subject : "--"; ?>
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