<?php if (isset($result)) : ?>

<div class="container space-top search">
    <div class="row">
        <div class="columns five bgwhite">
            <section class="sidebar">
                <div class="row">
                    <div class="columns sixteen">
                        <!-- Search Widget -->
                        <?php echo Modules::run('search/search_widget'); ?>
                    </div>
                </div>
            </section>  
        </div>  
        
        <?php foreach($number_of_rows as $key=>$inside) : ?>
        <?php if($inside > 0) : ?>
        <div class="columns eleven search">
            <div class="thumbnail">
                <ul class="overview">
                    <?php foreach($result[$key] AS $result_list) : ?>
                    <li class="">
                        <a href="<?php echo $result_list['link_detail']; ?>">
                            <span>
                                <?php echo $result_list['title']; ?> 
                                <br>
                                <?php 
                                    if(! empty($result_list['bedroom']))
                                    {
                                        echo $result_list['bedroom'].' Bedroom';
                                    }
                                    elseif(! empty($result_list['size_office']))
                                    {
                                        echo 'Size: '.$result_list['size_office'];
                                    }
                                ?>
                                <br> 
                                <?php echo $result_list['price']; ?> 
                                <small>+ MORE DETAIL</small>
                            </span>
                        </a>
                        <img src="<?php echo base_url().'files/large/'.$result_list['image_id'].'/200/200/fit' ?>" alt="">
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>


    </div>
</div>

<?php endif; ?>