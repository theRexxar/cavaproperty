<div class="office category-type" style="display: <?php echo ($type == "office") ? 'block' : 'none';  ?>">
	<div class="input">
		<!--<input type="text" name="name_office" <?php echo $this->input->get('name_office') ? 'selected="selected"' : ""; ?> placeholder="Building Name">-->
		<select name="name_office" id="">
			<option value="">Office Name</option>
		<?php if(! empty($office)) : ?>
			<?php foreach($office AS $office_list) : ?>
			<option value="<?php echo $office_list->slug; ?>" <?php echo $this->input->get('name_office') ==  $office_list->slug ? 'selected="selected"' : ""; ?> ><?php echo $office_list->title; ?></option>
			<?php endforeach; ?>
		<?php endif; ?>
		</select>
	</div>
	<div class="input">
		<select name="size_office" id="">
			<option value="">Size</option>
			<option value="<100" <?php echo $this->input->get('size_office') ==  '<100' ? 'selected="selected"' : ""; ?> >< 100</option>
			<option value="<250" <?php echo $this->input->get('size_office') ==  '<250' ? 'selected="selected"' : ""; ?> >< 250</option>
			<option value="<500" <?php echo $this->input->get('size_office') ==  '<500' ? 'selected="selected"' : ""; ?> >< 500</option>
			<option value="<1000" <?php echo $this->input->get('size_office') ==  '<1000' ? 'selected="selected"' : ""; ?> >< 1000</option>
			<option value=">1000" <?php echo $this->input->get('size_office') ==  '>1000' ? 'selected="selected"' : ""; ?> >> 1000</option>
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