<div class="office" style="display: none;">
	<div class="input">
		<input type="text" name="name" <?php echo $this->input->get('name') ? 'selected="selected"' : ""; ?> placeholder="Building Name">
	</div>
	<!--<div class="input">
		<select name="location" id="">
			<option value="">Location</option>
			<?php foreach($location AS $location_list) : ?>
			<option value="<?php echo $location_list->slug; ?>" <?php echo $this->input->get('location') ==  $location_list->slug ? 'selected="selected"' : ""; ?> >
				<?php echo $location_list->title; ?>
			</option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="input">
		<select name="additional" id="">
			<option value="">Additional</option>
			<option value="furnished" <?php echo $this->input->get('additional') ==  "furnished" ? 'selected="selected"' : ""; ?> >Furnished</option>
			<option value="non_furnished" <?php echo $this->input->get('additional') ==  "non_furnished" ? 'selected="selected"' : ""; ?> >Non Furnished</option>
		</select>
	</div>-->
</div>