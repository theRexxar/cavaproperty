<div class="container space-top our-project"> 
    <div class="row">
		<div class="columns five bgwhite">
			<section class="sidebar">
                <div class="row">
                    <div class="columns sixteen">
                    	<h5><?php echo $property->title ?></h5>
                                                
                        <div class="container-article">
                            <?php if($property->posting_date != "0000-00-00") : ?>
                            <div class="article">
                                    <span class="text-lg">POSTING DATE</span><br>
                                    <span class="mlr10"><?php echo date('d F Y',strtotime($property->posting_date)) ?></span>
                            </div>
                            <?php endif; ?>

                            <div class="article">
                                    <span class="text-lg">LOCATION</span><br>
                                    <span class="mlr10"><?php echo $property->title_city ?></span>
                            </div>

                            <?php if(! empty($property->address)) : ?>
                            <div class="article">
                                    <span class="text-lg">ADDRESS</span><br>
                                    <span class="mlr10"><?php echo $property->address ?></span>
                            </div>
                            <?php endif; ?>

                            <?php if(! empty($property->size)) : ?>
                            <div class="article">
                                    <span class="text-lg">SIZE</span><br>
                                    <span class="mlr10"><?php echo $property->size ?></span>
                            </div>
                            <?php endif; ?>

                            <?php if(! empty($property->bedroom)) : ?>
                            <div class="article">
                                    <span class="text-lg">BEDROOM</span><br>
                                    <span class="mlr10"><?php echo $property->bedroom ?></span>
                            </div>
                            <?php endif; ?>

                            <?php if(! empty($property->condition) && $property->category == "secondary") : ?>
                            <div class="article">
                                    <span class="text-lg">CONDITION</span><br>
                                    <span class="mlr10">
                                            <p><?php echo $property->condition ?></p>
                                    </span>
                            </div>
                            <?php endif; ?>

                            <?php if(! empty($property->price) && $property->category == "secondary") : ?>
                            <div class="article">
                                    <span class="text-lg">Price</span><br>
                                    <span class="mlr10"><?php echo $property->price ?></span>
                            </div>
                            <?php endif; ?>

                            <?php if(! empty($property->facility)) : ?>
                            <div class="article">
                                    <span class="text-lg">FACILITIES</span><br>
                                    <span class="mlr10">
                                            <?php echo $property->facility ?>
                                    </span>
                            </div>
                            <?php endif; ?>

                            <?php if(! empty($property->additional)) : ?>
                            <div class="article">
                                    <span class="text-lg">ADDITIONAL</span><br>
                                    <span class="mlr10">
                                            <?php echo $property->additional ?>
                                    </span>
                            </div>
                            <?php endif; ?>        
                        </div>
                                                
                        <p class="clear left mt20">
                                <a href="<?php echo base_url().'project'; ?>" class="right button-more">
                                        <span>+</span> MORE PROJECTS
                                </a>
                                <a href="#detail" class="button-detail-project">
                                        <span>+</span> DETAIL PROJECT
                                </a>
                        </p>
                                                
                        <div id="finder-container">
                            <!-- Search Widget -->
                            <?php echo Modules::run('search/search_widget'); ?>
                            <a href="#" class="close">x</a>
                        </div>

                        <p class="clear left mt20">
                                <a href="#finder" class="link-button green left" id="finder">
                                        FINDER
                                </a>
                        </p>
                    </div>
                </div>
            </section>        
    	</div>        
                
                
        <div class="columns eleven">
                <div class="row">
                        <div class="columns sixteen">
                                <div id="carousel" class="carousel module">
                                    <ul>
                                            <?php if(! empty($property->youtube)) : ?>
                                        <li class="video">
                                                <i class="play"></i>
                                                <img src="<?php echo base_url().'files/large/'.$property->image_id.'/720/360/fit' ?>" alt="">
                                                        <div class="video-content">
                                                                <!-- <i class="close">x</i> -->
                                                                <object width="720" height="360">
                                                                        <param name="movie" value="http://www.youtube.com/v/<?php echo $property->youtube; ?>?hl=en_US&amp;version=3"></param>
                                                                        <param name="allowFullScreen" value="true"></param>
                                                                        <param name="allowscriptaccess" value="always"></param>
                                                                        <embed src="http://www.youtube.com/v/<?php echo $property->youtube; ?>?hl=en_US&amp;version=3" type="application/x-shockwave-flash" width="720" height="360" allowscriptaccess="always" allowfullscreen="true"></embed>
                                                                </object>
                                                        </div>
                                        </li>
                                            <?php endif; ?>

                                        <?php if(! empty($property->gallery)) : ?>
                                        <?php foreach($property->gallery AS $gallery_list) : ?>
                                        <li>
                                                <img src="<?php echo base_url().'files/large/'.$gallery_list->file_id.'/720/360/fit' ?>" alt="">
                                                <p class="text">
                                                        <?php echo $gallery_list->caption; ?>
                                                </p>
                                        </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>                     
                                        
                                        <li class="contact">
                                                <article>
                                                        <input type="hidden" id="date-pick" class="schedule">
                                                        <p>Make Appoinment <br>or Contact Our Agent</p>
                                                        <span><?php echo $property->name_marketing; ?></span>
                                                        <span class=""><?php echo $property->phone_marketing; ?></span>
                                                        <a href="mailto:<?php echo $property->email_marketing; ?>?subject=<?php echo $property->title; ?>"><?php echo $property->email_marketing; ?></a>
                                                </article>
                                        </li>                          
                                    </ul>
                                </div>
                        </div>
                </div>
        </div>
    </div>
</div>