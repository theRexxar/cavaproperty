<div class="admin-box">

    <span class="form-horizontal">

        <span class="heading-section">Personal Info</span>
            
        <div class="control-group">
            <span class="detail-label">Name :</span>
            <div class='detail-content'>
                <?php echo $calendar_detail->title_member.' '.$calendar_detail->first_name_member.' '.$calendar_detail->last_name_member; ?>
            </div>
        </div>

        <div class="control-group">
            <span class="detail-label">Phone :</span>
            <div class='detail-content'>
                <?php echo $calendar_detail->phone_member; ?>
            </div>
        </div>

        <div class="control-group">
            <span class="detail-label">Mobile Phone :</span>
            <div class='detail-content'>
                <?php echo $calendar_detail->mobile_phone_member; ?>
            </div>
        </div>

        <div class="control-group">
            <span class="detail-label">Email :</span>
            <div class='detail-content'>
                <a href="mailto:<?php echo $calendar_detail->email_member; ?>">
                    <?php echo $calendar_detail->email_member; ?>
                </a>
            </div>
        </div>

        <div class="control-group">
            <span class="detail-label">City :</span>
            <div class='detail-content'>
                <?php echo $calendar_detail->city_member; ?>
            </div>
        </div>


        <span class="heading-section">Calendar Info</span>

        <div class="control-group">
            <span class="detail-label">Status :</span>
            <div class='detail-content'>
                <?php echo ucfirst($calendar_detail->status); ?>
            </div>
        </div>
        
        <div class="control-group">
            <span class="detail-label">Property Name :</span>
            <div class='detail-content'>
                <?php echo $calendar_detail->title_property; ?>
            </div>
        </div>

        <div class="control-group">
            <span class="detail-label">Date :</span>
            <div class='detail-content'>
                <?php echo ! empty($calendar_detail->date) ? date('d F Y',strtotime($calendar_detail->date)) : "--"; ?>
            </div>
        </div>

        <div class="control-group">
            <span class="detail-label">Submit Date :</span>
            <div class='detail-content'>
                <?php echo ! empty($calendar_detail->created_on) ? date('d F Y - H:i:s',strtotime($calendar_detail->created_on)) : "--"; ?>
            </div>
        </div>


        <div class="form-actions">
            <br/>
            <?php
                if(isset($_SERVER['HTTP_REFERER']))
                {
                    echo anchor($_SERVER['HTTP_REFERER'], "Back", 'class="btn btn-warning"');
                }
                else
                {
                    echo anchor(base_url().'admin/content/marketing/marketing_calendar', "Back", 'class="btn btn-warning"');
                }
            ?>
        </div>
              
    </span>

</div>
