<h5>SEARCH PROJECT</h5>
<section class="search primary">
	<form action="<?php echo base_url().'search'; ?>" method="get" name="search" id="finder-form">
		<div class="input">
			<select name="status" id="">
				<option value="rent" <?php echo $this->input->get('status') ==  "rent" ? 'selected="selected"' : ""; ?>>Rent</option>
				<option value="buy" <?php echo $this->input->get('status') ==  "buy" ? 'selected="selected"' : ""; ?>>Buy</option>
			</select>	
		</div>

		<div class="input">
			<select name="type" id="type-property">
				<option value="">Type Property</option>
	            <option value="apartement" <?php echo $this->input->get('type') ==  "apartement" ? 'selected="selected"' : ""; ?> >
	            	Apartement
	            </option>
	            <option value="house" <?php echo $this->input->get('type') ==  "house" ? 'selected="selected"' : ""; ?> >
	            	House
	            </option>
	            <option value="office" <?php echo $this->input->get('type') ==  "office" ? 'selected="selected"' : ""; ?> >
	            	Office
	            </option>
			</select>	
		</div>

		<?php if($this->input->get('type') == "") : ?>
		<div class="default">
			<div class="input">
				<select class="disabled" disabled>
					<option>Location</option>
				</select>
			</div>
			<div class="input">
				<select class="disabled" disabled>
					<option>Number of Beedrooms</option>
				</select>
			</div>
			<div class="input">
				<select class="disabled" disabled>
					<option>Additional</option>
				</select>
			</div>
		</div>
		<?php endif; ?>

		<!-- Display Apartement Type -->
		<?php
			if($this->input->get('type') ==  "apartement")
			{
				$display_apartement = "";
			}
			else
			{
				$display_apartement = "display: none";
			}
		?>
		<div class="apartement" style="<?php echo $display_apartement; ?>">
			<div class="input">
				<input type="text" name="name" <?php echo $this->input->get('name') ? 'selected="selected"' : ""; ?> placeholder="Property Name">
			</div>
			<div class="input">
				<select name="bedroom" id="">
					<option value="">Bedroom</option>
					<option value="2" <?php echo $this->input->get('bedroom') ==  "2" ? 'selected="selected"' : ""; ?> >2 Bedrooms</option>
					<option value="3" <?php echo $this->input->get('bedroom') ==  "3" ? 'selected="selected"' : ""; ?> >3 Bedrooms</option>
					<option value="3plus" <?php echo $this->input->get('bedroom') ==  "3plus" ? 'selected="selected"' : ""; ?> > > 3 Bedroom</option>
				</select>
			</div>
			<div class="input">
				<select name="additional" id="">
					<option value="">Additional</option>
					<option value="furnished" <?php echo $this->input->get('additional') ==  "furnished" ? 'selected="selected"' : ""; ?> >Furnished</option>
					<option value="non_furnished" <?php echo $this->input->get('additional') ==  "non_furnished" ? 'selected="selected"' : ""; ?> >Non Furnished</option>
				</select>
			</div>
		</div>
		<!-- End Display Apartement Type -->

		<!-- Display House Type -->
		<?php
			if($this->input->get('type') ==  "house")
			{
				$display_house = "";
			}
			else
			{
				$display_house = "display: none";
			}
		?>
		<div class="house" style="<?php echo $display_house; ?>">
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
		</div>
		<!-- End Display House Type -->

		<!-- Display Office Type -->
		<?php
			if($this->input->get('type') ==  "office")
			{
				$display_office = "";
			}
			else
			{
				$display_office = "display: none";
			}
		?>
		<div class="office" style="<?php echo $display_office; ?>">
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
				<select name="additional" id="">
					<option value="">Additional</option>
					<option value="furnished" <?php echo $this->input->get('additional') ==  "furnished" ? 'selected="selected"' : ""; ?> >Furnished</option>
					<option value="non_furnished" <?php echo $this->input->get('additional') ==  "non_furnished" ? 'selected="selected"' : ""; ?> >Non Furnished</option>
				</select>
			</div>
		</div>
		<!-- Display Office Type -->

		<div class="submit">
			<input type="submit" class="button radius" value="FIND PROJECT">
		</div>
		
	</form>	
</section>