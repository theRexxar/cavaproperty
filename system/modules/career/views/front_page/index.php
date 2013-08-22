<div class="container space-top career">
	<div class="row">
		<div class="columns five">
			<section class="sidebar bgwhite">
				<div class="row">
					<div class="columns fourteen offset-by-one">
						<h5>CAREER OPPORTUNITY</h5>
						<?php if(isset($career) && ! empty($career)) : ?>
						<ul class="block-grid one-up list-career">
							<?php $i=0; $ii=-1; foreach($career AS $career_list) : $i++; $ii++; ?>
							<li>
								<a href="#career<?php echo $i; ?>" data-id="<?php echo $ii; ?>">
									<?php echo $career_list->title; ?>
								</a>
							</li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
					</div>
				</div>
			</section>
		</div>
		<div class="columns eleven scroll-content">
			<div class="row scroll-container">
			<?php if(isset($career) && ! empty($career)) : ?>
				<?php $iii=0; foreach($career AS $career_list) : $iii++; ?>
				<div class="bgwhite ml10" id="career<?php echo $iii; ?>">
					<article>
						<h6><?php echo strtoupper($career_list->title); ?></h6>
						<?php echo $career_list->summary; ?>
						<strong>JOB DESCRIPTION</strong><br>
						<?php echo $career_list->description; ?>
						<strong>JOB QUALIFICATION</strong>
						<?php echo $career_list->qualification; ?>
						<a href="mailto:career@cavaproperty.com?subject=Application for <?php echo $career_list->title; ?>" class="link-button apply">
							APPLY
						</a>
					</article>
				</div>
				<?php endforeach; ?>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>