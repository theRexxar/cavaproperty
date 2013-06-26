<div class="container space-top our-project">
	<div class="thumbnail absolute">
		<div id="slider">
			<a href="#" class="buttons prev">left</a>
			<div class="row viewport">
				<ul class="overview">
					<li class="">
						<a href="detail.php">
							<span>SERENIA HILLS <small>+ MORE DETAIL</small></span>
						</a>
						<img src="images/our-project2.jpg" alt="">
					</li>
					<li class="">
						<a href="detail.php">
							<span>SERENIA HILLS <small>+ MORE DETAIL</small></span>
						</a>
						<img src="images/our-project3.jpg" alt="">
					</li>
					<li class="">
						<a href="detail.php">
							<span>TAUM SEMINYAK <small>+ MORE DETAIL</small></span>
						</a>
						<img src="images/our-project1.jpg" alt="">
					</li>
					<li class="">
						<a href="detail.php">
							<span>TAUM SEMINYAK <small>+ MORE DETAIL</small></span>
						</a>
						<img src="images/our-project4.jpg" alt="">
					</li>
					<li class="">
						<a href="detail.php">
							<span>SERENIA HILLS <small>+ MORE DETAIL</small></span>
						</a>
						<img src="images/our-project3.jpg" alt="">
					</li>
					<li class="">
						<a href="detail.php">
							<span>TAUM SEMINYAK <small>+ MORE DETAIL</small></span>
						</a>
						<img src="images/our-project1.jpg" alt="">
					</li>
					
				</ul>
			</div>
			<a href="#" class="buttons next">right</a>
		</div>
	</div>
	<div class="row">
		<div class="columns five">
			<section class="sidebar bgwhite">
				<div class="row">
					<!-- take out for landing -->
					<!-- <div class="columns sixteen">
						<h5>HARRIS - NUSA DUA</h5>
						<p>
							<span class="text-lg">LOCATION</span><br>
							<span class="mlr10">Jl. Sugriwa Ubud. 80571 Bali - Indonesia</span>
						</p>
						<p>
							<span class="text-lg">SIZE</span><br>
							<span class="mlr10">212 <sup>m2</sup></span>
						</p>
						<p>
							<span class="text-lg">BEDROOM</span><br>
							<span class="mlr10">5</span>
						</p>
						<p>
							<span class="text-lg">FACILITY</span><br>
							<span class="mlr10">
								Swimming pool<br>
								Swimming pool<br>
								24 hours security<br>
								Sauna<br>
								Tennis Court
							</span>
						</p>
						<p>
							<span class="text-lg">SIZE</span><br>
							<span class="mlr10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</span><br>
						</p>
						<p class="clear left"><a href="" class="left button-more"><span>+</span> DETAIL PROJECT</a> <a href="" class="right button-more"><span>+</span> MORE PROJECT</a></p>
						
						<p class="hide"><span class="mlr10">Elegant from all sides, Park is perfect for a wide range of environments including open concept spaces and lounges. The winged seat gives a sense of privacy and seclusion while being generous enough to promote multiple seating positions. The molded foam body contains an internal frame with elastic webbing so the whole chair can flex and adapt to the sitter. The marriage of innovative production techniques with considered dimensions creates a contemporary chair that is superbly comfortable and elegantly reduced.</span></p>
						<p class="hide"><span class="mlr10">The upholstered seat sits on a simple precision-made steel base, and expertly sewn and fitted covers create a beautiful tailored appearance.</span></p>
						<p class="hide"><span class="mlr10">A matching Ottoman compliments the aesthetic of the chair.</span></p>

						<p class="clear left mt20"><a href="<?php echo $base_url ?>/includes/finder.php" class="link-button green left" id="finder">FINDER</a></p>
					</div> -->

					<!-- replace for landing -->
					<div class="columns sixteen">
						<h5>OUR PROJECT</h5>
						<p>
							<a href="detail.php" class="active">SETIA BUDI SKY GARDEN</a><br>
							<a href="detail.php">IZZARA</a><br>
							<a href="detail.php">CASSAMORA</a><br>
							<a href="detail.php">SERENA HILLS</a><br>
							<a href="detail.php">ONE BALMORAL</a><br>
							<a href="detail.php">ALILA</a><br>
							<a href="detail.php">WUKU</a><br>
							<a href="detail.php">HARRIS</a>
						</p>

						<div id="finder-container">
							<form action="http://localhost/cava/beta/public/projects/search" methode="GET">
								<h5>SEARCH PROJECT</h5>
								<div class="input">
									<select name="type" id="">
										<option value="">Type Property</option>
										<option value="residential">Residential</option>
										<optgroup label="">
											<option value="res-apartement">Apartement</option>
											<option value="res-condotel">Condotel</option>
											<option value="res-house">House</option>
											<option value="res-villa">Villa</option>
										</optgroup>
										<option value="commercial">Commercial</option>
										<optgroup label="">
											<option value="com-shop">Shop (Ruko)</option>
											<option value="com-office">Office</option>
											<option value="com-factory">Factory</option>
											<option value="com-warehouse">Warehouse</option>
										</optgroup>
									</select>	
								</div>
								<div class="input">
									<select name="location" id="">
										<option value="">Location</option>
										<option value="ID-AC">Aceh</option>
										<option value="ID-BA">Bali</option>
										<option value="ID-BT">Banten</option>
										<option value="ID-BE">Bengkulu</option>
										<option value="ID-GO">Gorontalo</option>
										<option value="ID-JK">Jakarta</option>
										<option value="ID-JA">Jambi</option>
										<option value="ID-JB">Jawa-Barat</option>
										<option value="ID-JT">Jawa-Tengah</option>
										<option value="ID-JI">Jawa-Timur</option>
										<option value="ID-KB">Kalimantan-Barat</option>
										<option value="ID-KS">Kalimantan-Selatan</option>
										<option value="ID-KT">Kalimantan-Tengah</option>
										<option value="ID-KI">Kalimantan-Timur</option>
										<option value="ID-KU">Kalimantan-Utara</option>
										<option value="ID-BB">Kepulauan-Bangka-Belitung</option>
										<option value="ID-KR">Kepulauan-Riau</option>
										<option value="ID-LA">Lampung</option>
										<option value="ID-MA">Maluku</option>
										<option value="ID-MU">Maluku-Utara</option>
										<option value="ID-NB">Nusa-Tenggara-Barat</option>
										<option value="ID-NT">Nusa-Tenggara-Timur</option>
										<option value="ID-PA">Papua</option>
										<option value="ID-PB">Papua-Barat</option>
										<option value="ID-RI">Riau</option>
										<option value="ID-SR">Sulawesi-Barat</option>
										<option value="ID-ST">Sulawesi-Selatan</option>
										<option value="ID-SN">Sulawesi-Tengah</option>
										<option value="ID-SG">Sulawesi-Tenggara</option>
										<option value="ID-SA">Sulawesi-Utara</option>
										<option value="ID-SB">Sumatera-Barat</option>
										<option value="ID-SS">Sumatera-Selatan</option>
										<option value="ID-SU">Sumatera-Utara</option>
										<option value="ID-YO">Yogyakarta</option>
									</select>
								</div>
								<div class="input">
									<select name="bedroom" id="">
										<option value="0">Beedrooms</option>
										<option value="1">1 Beedrooms</option>
										<option value="2">2 Beedrooms</option>
										<option value="3">3 Beedrooms</option>
										<option value="4">4 Beedrooms</option>
										<option value="5">5 Beedrooms</option>
										<option value="6">6 Beedrooms</option>
										<option value="7">7 Beedrooms</option>
										<option value="8">8 Beedrooms</option>
										<option value="9">9 Beedrooms</option>
										<option value="10">10+ Beedrooms</option>
									</select>
								</div>
								<div class="input">
									<input type="text" placeholder="Search" value="" id="" name="q" class="">
								</div>
								<div class="submit">
									<input type="submit" class="button radius" value="FIND PROJECT">
								</div>							
							</form>								
							<a href="#" class="close">x</a>
						</div>
						<p class="clear left mt20"><a href="" class="left button-more"><span>+</span> DETAIL PROJECT</a> <a href="" class="right button-more"><span>+</span> MORE PROJECT</a></p>
						<p class="clear left mt20"><a href="<?php echo $base_url ?>/includes/finder.php" class="link-button green left" id="finder">FINDER</a></p>
					</div>
				</div>
			</section>	
		</div>	
		
		
		<div class="columns eleven">
			<div class="row">
				<div class="columns sixteen">
					<div class="left">

						<div class="flexslider">
						  <ul class="slides">
						    <li>
						      <img src="images/our_project.jpg" alt="Our Project">
						      <div class="detail">
						      	HARRIS - NUSA DUA BALI <a href="">+ DETAILS</a>
						      </div>
						    </li>
						    <li>
						      <img src="images/our_project.jpg" alt="Our Project">
						      <div class="detail">
						      	HARRIS I - NUSA BALI <a href="">+ DETAILS</a>
						      </div>
						    </li>
						    <li>
						      <img src="images/our_project.jpg" alt="Our Project">
						      <div class="detail">
						      	HARRIS II - DUA BALI <a href="">+ DETAILS</a>
						      </div>
						    </li>
						  </ul>
						</div>
						
					</div>
					<div class="right bgwhite">
						<h5>NEWS & UPDATES</h5>
						<ul class="block-grid one-up mobile-one-up">
							<li>
								<a href="">
									<span>22/11/2012</span><br>
									Serenia Hills Project Progress as of November 2012
								</a>
							</li>
							<li>
								<a href="">
									<span>22/11/2012</span><br>
									Serenia Hills Project Progress as of November 2012
								</a>
							</li>
							<li>
								<a href="">
									<span>22/11/2012</span><br>
									Serenia Hills Project Progress as of November 2012
								</a>
							</li>
							<li>
								<a href="">
									<span>22/11/2012</span><br>
									Serenia Hills Project Progress as of November 2012
								</a>
							</li>
							<li><a href="" class="button-more">+ MORE NEWS</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>