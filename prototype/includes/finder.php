<div class="finder">
	<a href="#" class="close">x</a>
	<div class="row">
		<div class="columns sixteen">
			<h5>SEARCH PROJECT</h5>
			<!-- <span class="right"><a href="#primary" class="primary">PRIMARY</a> | <a href="#secodary" class="secondary">SECONDARY</a></span> -->
			<section class="search primary">
				<form action="" id="finder-form">
					<div class="input">
						<select name="" id="">
							<option value="rent">Rent</option>
							<option value="buy">Buy</option>
						</select>	
					</div>
					<div class="input">
						<select name="tipe" id="type-property">
							<option value="">Type Property</option>
							<option value="house">House</option>
							<option value="apartement">Apartement</option>
							<option value="office">Office</option>
						</select>	
					</div>
					<div class="default">
						<div class="input">
							<select name="location" id="" class="disabled" disabled>
								<option value="Location A">Location</option>
							</select>
						</div>
						<div class="input">
							<select name="bedroom" id="" class="disabled" disabled>
								<option value="">Number of Beedrooms</option>
							</select>
						</div>
						<div class="input">
							<select name="addtional" id="" class="disabled" disabled>
								<option value="add">Addtional</option>
							</select>
						</div>
					</div>

					<!-- display house select -->
					<div class="house" style="display:none">
						<div class="input">
							<select name="location" id="">
								<option value="Location A">Location</option>
							</select>
						</div>
						<div class="input">
							<select name="bedroom" id="">
								<option value="">Number of Beedrooms</option>
							</select>
						</div>
					</div>

					<!-- display apartement select -->
					<div class="apartement" style="display:none">
						<div class="input">
							<select name="location" id="">
								<option value="">Building Name</option>
							</select>
						</div>
						<div class="input">
							<select name="bedroom" id="">
								<option value="">Number of Beedrooms</option>
							</select>
						</div>
						<div class="input">
							<select name="additional" id="">
								<option value="">Additional</option>
							</select>
						</div>
					</div>

					<!-- display Office select -->
					<div class="office" style="display:none">
						<div class="input">
							<select name="location" id="">
								<option value="Location A">Location</option>
							</select>
						</div>
						<div class="input">
							<select name="bedroom" id="">
								<option value="">Additional</option>
							</select>
						</div>
					</div>
					<div class="submit">
						<input type="submit" class="button radius" value="FIND PROJECT">
					</div>
				</form>	
			</section>
		</div>
	</div>
</div>