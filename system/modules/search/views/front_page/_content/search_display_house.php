<div class="house category-type" style="display: <?php echo ($type == "house") ? 'block' : 'none';  ?>">
	<div class="input">
		<select name="location_house" id="">
			<option value="">Location</option>
			<?php foreach($location AS $location_list) : ?>
			<option value="<?php echo $location_list->slug; ?>" <?php echo $this->input->get('location_house') ==  $location_list->slug ? 'selected="selected"' : ""; ?> >
				<?php echo $location_list->title; ?>
			</option>
			<?php endforeach; ?>
		</select>
	</div>
	<!--<div class="input">
		<select name="bedroom" id="">
			<option value="">Bedroom</option>
			<option value="2" <?php echo $this->input->get('bedroom') ==  "2" ? 'selected="selected"' : ""; ?> >2 Bedrooms</option>
			<option value="3" <?php echo $this->input->get('bedroom') ==  "3" ? 'selected="selected"' : ""; ?> >3 Bedrooms</option>
			<option value="3plus" <?php echo $this->input->get('bedroom') ==  "3plus" ? 'selected="selected"' : ""; ?> > > 3 Bedroom</option>
		</select>
	</div>-->
</div>