<div class="columns sixteen">
	<form action="<?php echo base_url().'search'; ?>" method="get" name="search">
		<h5>SEARCH PROJECT</h5>
		<div class="input">
			<select name="type" id="">
				<option value="">Type</option>
				<?php foreach($category AS $category_list) : ?>
                <optgroup label="<?php echo $category_list->title; ?>">
                    <?php foreach($category_list->type AS $type_list) : ?>
                    <option value="<?php echo $type_list->slug; ?>" <?php echo $this->input->get('type') ==  $type_list->slug ? 'selected="selected"' : ""; ?> >
                    	<?php echo $type_list->title; ?>
                    </option>
                    <?php endforeach; ?>
                </optgroup>
                <?php endforeach; ?>
			</select>	
		</div>
		<div class="input">
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
			<select name="bedroom" id="">
				<option value="">Bedroom</option>
				<option value="2" <?php echo $this->input->get('bedroom') ==  "2" ? 'selected="selected"' : ""; ?> >2 Bedrooms</option>
				<option value="3" <?php echo $this->input->get('bedroom') ==  "3" ? 'selected="selected"' : ""; ?> >3 Bedrooms</option>
				<option value="3plus" <?php echo $this->input->get('bedroom') ==  "3plus" ? 'selected="selected"' : ""; ?> > > 3 Bedroom</option>
			</select>
		</div>
		<!--<div class="input">
			<select name="additional" id="">
				<option value="tipe 1">Addtional</option>
			</select>
		</div>-->
		<div class="submit">
			<input type="submit" class="button radius" value="FIND PROJECT">
		</div>
		
	</form>	
</div>