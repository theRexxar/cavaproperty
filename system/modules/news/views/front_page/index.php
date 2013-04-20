<div class="container space-top news-update">
	
	<div class="absolute right-sidebar">
		<h5>ARCHIVE</h5>
		<?php if(isset($news) && ! empty($news)) : ?>
		<ul>
			<?php 
				$by_year = array();
				foreach($news_date AS $news_dates)
				{
					$by_year[$news_dates['year']][$news_dates['month']]++;
				}

				krsort($by_year);

				foreach($by_year AS $year=>$months) :
			?>
			<li class="acordion">
				<span><?php echo $year; ?></span>
				<ol>
				<?php 
					krsort($months); 

					foreach($months AS $month=>$num) :
				?>
					<li>
						<a href="<?php echo base_url().'news/archive/'.$year.'/'.$month; ?>">
							<?php echo indonesian_date(mktime(0,0,0,$month,1,2010), 'F'); ?>
						</a>
					</li>
				<?php endforeach; ?>
				</ol>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>
	</div>
		
	<?php if(isset($news) && ! empty($news)) : ?>
	<?php foreach($news AS $news_list) : ?>
	<div class="row mb20">
		<div class="columns five">
			<article class="bgwhite sidebar">
				<a href="" class="title">
					<?php echo $news_list->title; ?>
				</a>
				<span class="date">
					<?php echo date('d/m/Y',strtotime($news_list->created_on));?>
				</span>
				<?php
					$desc = explode("</p>", $news_list->description);
					for($i=0; $i < count($desc); $i++)
					{
						if($i==0)
						{
							echo $desc[$i]."</p>";
						}
						else
						{
							echo str_replace("<p>", "<p class='hide'>", $desc[$i])."</p>";
						}
					}
				?>
				<p>
					<a href="<?php echo base_url().'news/detail/'.$news_list->slug; ?>" class="more-detail more">
						<span>+</span> READ MORE
					</a>
				</p>
			</article>
		</div>
		<div class="columns nine end ml10">
			<a href="<?php echo base_url().'uploads/files/'.$news_list->image->filename; ?>" class="cboxElement" id="group1" title="<?php echo $news_list->title; ?>">
				<img src="<?php echo base_url().'files/large/'.$news_list->image_id; ?>" alt="<?php echo $news_list->title; ?>">
			</a>
		</div>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
</div>