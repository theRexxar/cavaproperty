<div class="apartement" style="display: none;">
	<div class="input">
		<!--<input type="text" name="name" <?php echo $this->input->get('name') ? 'selected="selected"' : ""; ?> placeholder="Building Name">-->
		<select name="name" id="">
		<?php if(! empty($apartment)) : ?>
			<?php foreach($apartment AS $apartment_list) : ?>
			<option value="<?php echo $apartment_list->slug; ?>" <?php echo $this->input->get('name') ==  $apartment_list->slug ? 'selected="selected"' : ""; ?> ><?php echo $apartment_list->title; ?></option>
			<?php endforeach; ?>
		<?php endif; ?>
		</select>
	</div>
	<div class="input">
		<select name="bedroom" id="">
			<!--<option value="">Bedroom</option>-->
			<option value="1" <?php echo $this->input->get('bedroom') ==  "1" ? 'selected="selected"' : ""; ?> >1 Bedroom</option>
			<option value="2" <?php echo $this->input->get('bedroom') ==  "2" ? 'selected="selected"' : ""; ?> >2 Bedrooms</option>
			<option value="3" <?php echo $this->input->get('bedroom') ==  "3" ? 'selected="selected"' : ""; ?> >3 Bedrooms</option>
			<!--<option value="3plus" <?php echo $this->input->get('bedroom') ==  "3plus" ? 'selected="selected"' : ""; ?> > > 3 Bedroom</option>-->
		</select>
	</div>
	<!--<div class="input">
		<select name="additional" id="">
			<option value="">Additional</option>
			<option value="furnished" <?php echo $this->input->get('additional') ==  "furnished" ? 'selected="selected"' : ""; ?> >Furnished</option>
			<option value="non_furnished" <?php echo $this->input->get('additional') ==  "non_furnished" ? 'selected="selected"' : ""; ?> >Non Furnished</option>
		</select>
	</div>-->
</div>