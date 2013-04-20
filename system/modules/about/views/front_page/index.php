<div class="container about-us">
	<div class="row">
		<div class="columns five bgwhite">
			<section class="sidebar">
				<div class="row">
				<?php if(isset($landing_page) && ! empty($landing_page)) : ?>
					<?php foreach($landing_page As $landing_page_list) : ?>
					<div class="columns sixteen">
						<h5><?php echo $landing_page_list->title; ?></h5>
						<?php echo $landing_page_list->description; ?>
					</div>
					<?php endforeach; ?>
				<?php endif; ?>
				</div>
			</section>	
		</div>	
		
		
		<div class="columns eleven">
			<div id="isotope-container">

			<?php if(isset($people) && ! empty($people)) : ?>
				<?php $i=0; foreach($people AS $people_list) : $i++; ?>
				<?php
					switch ($i) 
					{
						case '1' : $class1 = "columns eight"; $class2 = "columns eight left"; $class3 = "detail-bio"; break;
						case '2' : $class1 = "columns sixteen"; $class2 = "columns sixteen top"; $class3 = "detail-bio show-left"; break;
						case '3' : $class1 = "columns eight right"; $class2 = "columns eight"; $class3 = "detail-bio"; break;
						case '4' : $class1 = "columns sixteen bottom"; $class2 = "columns sixteen"; $class3 = "detail-bio show-left"; break;
						case '5' : $class1 = "columns eight right"; $class2 = "columns eight"; $class3 = "detail-bio"; break;
					}
				?>
				<div class="item<?php echo ($i==1 OR $i==3 OR $i==5) ? ' double' : ''; ?>" data-id="<?php echo $i; ?>">
					<div class="row">
						<?php if($i==1 OR $i==2) : ?>
						<div class="<?php echo $class1; ?>">
							<img src="<?php echo base_url().'files/large/'.$people_list->image_id.'/200/200' ?>" alt="">		
						</div>
						<div class="<?php echo $class2; ?>">
							<span>
								<?php echo $people_list->name; ?> <br>
								<small><?php echo $people_list->position; ?></small>
							</span>
						</div>
						<?php else : ?>
						<div class="<?php echo $class1; ?>">
							<span>
								<?php echo $people_list->name; ?> <br>
								<small><?php echo $people_list->position; ?></small>
							</span>
						</div>
						<div class="<?php echo $class2; ?>">
							<img src="<?php echo base_url().'files/large/'.$people_list->image_id.'/200/200' ?>" alt="">		
						</div>
						<?php endif; ?>
					</div>
					<div class="<?php echo $class3; ?>">
						<strong>BIO</strong>
						<?php echo $people_list->description; ?>
						<i class="close"></i>
					</div>
				</div>
				<?php endforeach; ?>
			<?php endif; ?>

			</div>
		</div>
	</div>
</div>