<?php if (isset($result)) : ?>

    <?php foreach($number_of_rows as $key=>$inside) : ?>
    <?php if($inside > 0) : ?>
    
    <div>
        <ul>
        <?php foreach($result[$key] AS $result_list) : ?>
          <li>
            <div>
                <?php if($result_list['image_id'] == "") : ?>
                    <img src="<?php echo base_url(); ?>uploads/default/aqua_120x80.png" height="80px" title="No Image" alt="" />
                <?php else : ?>
                    <img src="<?php echo base_url().'files/large/'.$result_list['image_id'].'/100' ?>"  title="<?php echo ucwords($result_list['title']); ?>" alt="" />
                <?php endif; ?>
            </div>
            <div>
                <div>
                    <span><?php echo date('d/m/Y',strtotime($result_list['created_on']));?> - <?php echo strtoupper($result_list['module_name']); ?></span>
                    <a href="<?php echo $result_list['link_detail']; ?>" title="<?php echo ucwords($result_list['title']); ?>"><?php echo ucwords($result_list['title']); ?></a>
                </div>
                <div>
                    <p>
                        <?php 
                            if(isset($result_list['summary']))
                            {
                                $summary = strip_tags($result_list['summary']);
                				echo ( strlen($summary) > 200 ) ? substr($summary,0,200) : $summary;
                            }
                            else
                            {
                				$description = strip_tags($result_list['description']);
                				echo ( strlen($description) > 200 ) ? substr($description,0,200) : $description;
                            }                        
            			?> 
                        <a href="<?php echo $result_list['link_detail']; ?>" title="" class="more">More &gt;</a>
                    </p>
                </div>
            </div>
          </li>
        <?php endforeach; ?>
        </ul>
    </div>
    
    <?php
  		if(isset($nextprev['prev_link']))
		{
			$prev_tag_open='<a href="'.$nextprev['prev_link'].'">';
			$prev_tag_close='</a>';
		}
		elseif(!isset($nextprev['prev_link']))
		{
			$prev_tag_open='<span>';
			$prev_tag_close='</span>';
		}
		
		if(isset($nextprev['next_link']))
		{
			$next_tag_open='<a href="'.$nextprev['next_link'].'">';
			$next_tag_close='</a>';
		}
		elseif(!isset($nextprev['next_link']))
		{
			$next_tag_open='<span>';
			$next_tag_close='</span>';
		}
    ?>
    
    <div>
        <?php echo $prev_tag_open; ?><?php echo $prev_tag_close; ?>
        <?php echo $next_tag_open; ?><?php echo $next_tag_close; ?>
        <ul>
            <?php echo $paging; ?>
        </ul>
    </div>
    
    <?php else : ?>
        <div>
            <div>
                Your search - <b>"<?php echo $keyword; ?>"</b> - did not match any documents.
            </div>
        </div>
        
    <?php endif; ?>
    <?php endforeach; ?>
    
<?php endif; ?>