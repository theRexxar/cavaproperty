<div class="top">
	<h5>SEARCH PROJECT</h5>
	<!--<span class="right">
		<a href="#primary" id="primary" class="method <?php echo ($this->input->get('category') == "" OR $this->input->get('category') ==  "primary") ? "active" : ""; ?>">PRIMARY</a> | 
		<a href="#secondary" id="secondary" class="method <?php echo $this->input->get('category') ==  "secondary" ? "active" : ""; ?>">SECONDARY</a>
	</span>	-->
</div>

<section class="search">
	<form action="<?php echo base_url().'search'; ?>" method="get" name="search" id="finder-form">
		<input type="hidden" name="category" class="category-method" value="<?php echo $this->input->get('category') == "" ? "primary" : $this->input->get('category'); ?>">

		<div class="input">
			<select name="status" id="method">
				<option value="buy" class="primary" <?php echo $this->input->get('status') ==  "buy" ? 'selected="selected"' : ""; ?>>Buy</option>
				<option value="rent" class="secondary <?php //echo ($this->input->get('category') == "" OR $this->input->get('category') == "primary") ? "hide" : ""; ?>" <?php echo $this->input->get('status') ==  "rent" ? 'selected="selected"' : ""; ?>>Rent</option>
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

		<div class="default">
			<div class="input">
				<select class="disabled" disabled>
					<option>Building Name</option>
				</select>
			</div>
			<div class="input">
				<select class="disabled" disabled>
					<option>Location</option>
				</select>
			</div>
			<div class="input">
				<select class="disabled" disabled>
					<option>Number of Bedrooms</option>
				</select>
			</div>
			<!--<div class="input">
				<select class="disabled" disabled>
					<option>Additional</option>
				</select>
			</div>-->
		</div>

		<!-- Display Apartement Type -->
		<?php include("search_display_apartement.php"); ?>
		<!-- End Display Apartement Type -->

		<!-- Display House Type -->
		<?php include("search_display_house.php"); ?>
		<!-- End Display House Type -->

		<!-- Display Office Type -->
		<?php include("search_display_office.php"); ?>
		<!-- Display Office Type -->

		<div class="submit">
			<input type="submit" class="button radius" value="FIND PROJECT">
		</div>
		
	</form>	
</section>