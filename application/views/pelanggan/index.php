			<!-- Banner Section Start Here -->
			<section class="banner" style="background-image: url(<?= base_url('assets_pelanggan/'); ?>css/bg-image/category-bg3.jpg); background-size: cover;">
				<!-- <div class="shape-1">
			        <img src="<?= base_url('assets_pelanggan/'); ?>images/banner/shape/01.png" alt="banner">
			    </div>
			    <div class="shape-2">
			        <img src="<?= base_url('assets_pelanggan/'); ?>images/banner/shape/02.png" alt="banner">
			    </div> -->
				<div class="banner-area">
					<div class="container">
						<div class="row">
							<div class="col-xl-8 col-12">
								<div class="banner-content">
									<h2>Pelayanan Cuci Kendaraan</h2>
									<form action="/">
										<div class="codexcoder-selectoption">
											<select name="text">
												<option value="1">Cuci Mobil</option>
												<option value="2">Cuci Motor</option>
											</select>
										</div>
										<input type="text" name="type" placeholder="Cari tempat pencucian">
										<button type="submit"><i class="icofont-search-2"></i></button>
									</form>
									<ul>
										<li><span>700+</span>Tempat Cucian</li>
										<li><span>6900+</span>Pelanggan Terlayani</li>
										<li><span>6900+</span>Pengguna Terdaftar</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Banner Section Ending Here -->

			<!-- Popular Food Section Start Here -->
			<section class="popular-foods padding-tb" style="background-color: #fafeff;">
				<div class="container">
					<div class="section-header">
						<h3>Jelajahi Tempat Pencucian</h3>
						<p>Cari tempat cuci mobil maupun motor terlangkap seusai dengan kebutuhan.</p>
					</div>
					<div class="section-wrapper">
						<div class="row">
							<?php foreach ($tempat_cuci as $tempat_cuci) : ?>
								<div class="col-xl-4 col-md-6 col-12">
									<div class="p-food-item">
										<div class="p-food-inner">
											<div class="p-food-thumb">
												<a href="<?= base_url('Pelanggan/tempat/').$tempat_cuci->id; ?>"><img style="width: 340px; height: 250px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto2/'); ?><?= $tempat_cuci->foto2; ?>" alt="p-food"></a>
												<span><?= rupiah($tempat_cuci->harga_motor); ?> - <?= rupiah2($tempat_cuci->harga_mobil); ?></span>
											</div>
											<div class="p-food-content">
												<div class="p-food-author">
													<a href="<?= base_url('Pelanggan/tempat/').$tempat_cuci->id; ?>"><img style="width: 60px; height: 60px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto1/'); ?><?= $tempat_cuci->foto1; ?>" alt="food-author"></a>
												</div>
												<h6><a href="<?= base_url('Pelanggan/tempat/').$tempat_cuci->id; ?>"><?= $tempat_cuci->nama; ?></a></h6>
												<div class="p-food-group">
													<span><?= $tempat_cuci->deskripsi; ?></span>
												</div>
												<ul class="del-time">
													<li>
														<i class="icofont-cycling-alt"></i>
														<div class="time-tooltip">
															<div class="time-tooltip-holder">
																<span class="tooltip-label">Delivery time</span>
																<span class="tooltip-info">Your order will be delivered in 20 minutes.</span>
															</div>
														</div>
													</li>
													<li>
														<i class="icofont-stopwatch"></i>
														<div class="time-tooltip">
															<div class="time-tooltip-holder">
																<span class="tooltip-label">Pickup time</span>
																<span class="tooltip-info">You can pickup order in 20 minutes.</span>
															</div>
														</div>
													</li>
												</ul>
												<div class="p-food-footer">
													<div class="left">
														<div class="rating">
															<i class="icofont-star"></i>
															<i class="icofont-star"></i>
															<i class="icofont-star"></i>
															<i class="icofont-star"></i>
															<i class="icofont-star"></i>
														</div>
													</div>
													<div class="right"><i class="icofont-home"></i><?= $tempat_cuci->alamat; ?></div>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
								</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Popular Food Section Ending Here -->

			<!-- Food Services Section Start here -->
			<section class="food-services padding-tb">
				<div class="container">
					<div class="section-header">
						<h3>Cara Kerja</h3>
						<p>Tersedia cara yang mudah untuk melakukan pelayanan dan pembayaran pencucian.</p>
					</div>
					<div class="section-wrapper">
						<div class="service-item">
							<div class="service-inner">
								<div class="service-thumb">
									<img src="<?= base_url('assets_pelanggan/'); ?>images/service/01.jpg" alt="food-service">
									<span>01 step</span>
								</div>
								<div class="service-content">
									<h6><a href="#">Pilih Tempat Pencucian</a></h6>
								</div>
							</div>
						</div>
						<div class="service-item">
							<div class="service-inner">
								<div class="service-thumb">
									<img src="<?= base_url('assets_pelanggan/'); ?>images/service/02.jpg" alt="food-service">
									<span>02 step</span>
								</div>
								<div class="service-content">
									<h6><a href="#">Pesan dan bayar</a></h6>
								</div>
							</div>
						</div>
						<div class="service-item">
							<div class="service-inner">
								<div class="service-thumb">
									<img src="<?= base_url('assets_pelanggan/'); ?>images/service/03.jpg" alt="food-service">
									<span>03 step</span>
								</div>
								<div class="service-content">
									<h6><a href="#">Datang</a></h6>
								</div>
							</div>
						</div>
						<div class="service-item">
							<div class="service-inner">
								<div class="service-thumb">
									<img src="<?= base_url('assets_pelanggan/'); ?>images/service/04.jpg" alt="food-service">
									<span>04 step</span>
								</div>
								<div class="service-content">
									<h6><a href="#">Pencucian dan Selesai</a></h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Food Services Section Ending here -->

			<!-- Food Apps Section Start here -->
			<!-- <section class="food-apps">
				<div class="bg-shape-style"></div>
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-lg-6 col-12">
							<div class="apps-content padding-tb">
								<div class="section-header">
									<h3>Mezban FoodBakery In Your Mobile! Get Our App</h3>
									<p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use Food Delivery & Takeout App.</p>
									<div class="food-btn-group">
										<a href="#">
											<img src="<?= base_url('assets_pelanggan/'); ?>images/apps/icon/01.png" alt="food-apps">
											<div class="app-download">
												<p>Download it from</p>
												<span>Play Store</span>
											</div>
										</a>
										<a href="#">
											<img src="<?= base_url('assets_pelanggan/'); ?>images/apps/icon/02.png" alt="food-apps">
											<div class="app-download">
												<p>Download it from</p>
												<span>App Store</span>
											</div>
										</a>
									</div>
									<form>
										<div class="field-holder">
											<input class="field-input" type="email" placeholder="Enter your area (Dhaka Bangladesh)">
											<button type="submit" class="field-label-btn">Send Link</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="apps-thumb">
								<img src="<?= base_url('assets_pelanggan/'); ?>images/apps/01.png" alt="food-apps">
							</div>
						</div>
					</div>
				</div>
			</section> -->
			<!-- Food Apps Section Ending here -->

			<!-- Popular Food Section Style 2 Start Here -->
			<section class="popular-foods padding-tb">
				<div class="container">
					<div class="section-header">
						<h3>Popular Weekly Foods</h3>
						<p>Completely network impactful users whereas next-generation applications engage out thinking via tactical action.</p>
					</div>
					<div class="section-wrapper">
						<div class="row">
							<div class="col-lg-6 col-12">
								<div class="p-food-item style-2">
									<div class="p-food-inner">
										<div class="p-food-thumb">
											<img src="<?= base_url('assets_pelanggan/'); ?>images/popular-food/style-2/01.jpg" alt="p-food">
											<span>$20.99</span>
										</div>
										<div class="p-food-content">
											<h6><a href="#">Dragon Express</a></h6>
											<div class="p-food-group">
												<span>Type of food :</span>
												<a href="#">Beef Roast</a>
												<a href="#">Pizza</a>
												<a href="#">Stakes</a>
											</div>
											<ul class="del-time">
												<li><a href="#"><img src="<?= base_url('assets_pelanggan/'); ?>images/chef/author/01.jpg" alt="food-author"></a></li>
												<li>
													<i class="icofont-cycling-alt"></i>
													<div class="time-tooltip">
														<div class="time-tooltip-holder">
															<span class="tooltip-label">Delivery time</span>
															<span class="tooltip-info">Your order will be delivered in 20 minutes.</span>
														</div>
													</div>
												</li>
												<li>
													<i class="icofont-stopwatch"></i>
													<div class="time-tooltip">
														<div class="time-tooltip-holder">
															<span class="tooltip-label">Pickup time</span>
															<span class="tooltip-info">You can pickup order in 20 minutes.</span>
														</div>
													</div>
												</li>
											</ul>
											<div class="p-food-footer">
												<div class="left">
													<div class="rating">
														<i class="icofont-star"></i>
														<i class="icofont-star"></i>
														<i class="icofont-star"></i>
														<i class="icofont-star"></i>
														<i class="icofont-star"></i>
													</div>
												</div>
												<div class="right"><i class="icofont-home"></i>6th Avenue New York</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Popular Food Section Style 2 Ending Here -->


			<!-- top Restaurants section start here -->
			<!-- <section class="restaurant-section padding-tb">
				<div class="container">
					<div class="section-header">
						<h3>Top Restaurants</h3>
						<p>Completely network impactful users whereas next-generation applications engage out thinking via tactical action.</p>
					</div>
					<div class="section-wrapper">
						<div class="top-restaurant">
							<div class="restaurant-item">
								<div class="restaurant-inner">
									<div class="restaurant-thumb">
										<a href="#"><img src="<?= base_url('assets_pelanggan/'); ?>images/restaurant/01.jpg" alt="restaurant"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section> -->
			<!-- top Restaurants section ending here -->


			<!-- Contact From Section Start Here -->
			<!-- <section class="contact-us">
				<div class="bg-shape-style"></div>
				<div class="container">
					<div class="row justify-content-center align-items-center">
						<div class="col-xl-4 col-lg-6 col-12">
							<div class="contact-from">
								<h5>Register Now</h5>
								<form action="/">
									<input type="text" name="name" placeholder="Full Name*">
									<input type="email" name="email" placeholder="Your Eamil*">
									<input type="text" name="number" placeholder="Phone Number">
									<input type="submit" value="Free Registration">
								</form>
							</div>
						</div>
						<div class="col-xl-5 col-lg-6 col-12">
							<div class="contact-home-chef">
								<div class="section-header">
									<h3>Become A HomeChef.</h3>
									<p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use</p>
								</div>
								<div class="section-wrapper">
									<div class="contact-count-item">
										<div class="contact-count-inner">
											<div class="contact-count-thumb">
												<img src="<?= base_url('assets_pelanggan/'); ?>images/contac/icon/01.png" alt="food-contact">
											</div>
											<div class="contact-count-content">
												<h5><span class="counter">24896</span>+</h5>
												<p>Food</p>
											</div>
										</div>
									</div>
									<div class="contact-count-item">
										<div class="contact-count-inner">
											<div class="contact-count-thumb">
												<img src="<?= base_url('assets_pelanggan/'); ?>images/contac/icon/02.png" alt="food-contact">
											</div>
											<div class="contact-count-content">
												<h5><span class="counter">2.5</span>K</h5>
												<p>Clints</p>
											</div>
										</div>
									</div>
									<div class="contact-count-item">
										<div class="contact-count-inner">
											<div class="contact-count-thumb">
												<img src="<?= base_url('assets_pelanggan/'); ?>images/contac/icon/03.png" alt="food-contact">
											</div>
											<div class="contact-count-content">
												<h5><span class="counter">250</span>+</h5>
												<p>Chef</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-12">
							<div class="contact-thumb">
								<img src="<?= base_url('assets_pelanggan/'); ?>images/contac/01.png" alt="food-contact">
							</div>
						</div>
					</div>
				</div>
			</section> -->
			<!-- Contact From Section Ending Here -->

			<!-- Testimonial Section Start Here -->
			<section class="testimonial padding-tb" style="background-image: url(<?= base_url('assets_pelanggan/'); ?>css/bg-image/category-bg.jpg); background-size: cover;">
				<div class="container">
					<div class="section-wrapper">
						<div class="quete-thumb">
							<img src="<?= base_url('assets_pelanggan/'); ?>images/testimonial/icon/01.jpg" alt="food-quete">
						</div>
						<div id="demo" class="carousel slide vert">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<div class="testi-item">
										<p>Extend Accurate Services Long Term High Impact Experiences Interactiv Streamline Team Compelingly Simplify Solutions Before Technicaly Sound Leadership Skills Creative Holstic Process Improvements Proactively Streamline Alternative Niche Markets Forwor Resource Conveniently cultivate pandemic technology and corporate.</p>
										<h6>Somrat Islam <span>(UI Designer)</span></h6>
										<div class="rating">
											<i class="icofont-star"></i>
											<i class="icofont-star"></i>
											<i class="icofont-star"></i>
											<i class="icofont-star"></i>
											<i class="icofont-star"></i>
										</div>
									</div>
								</div>
								<div class="carousel-item">
									<div class="testi-item">
										<p>Extend Accurate Services Long Term High Impact Experiences Interactiv Streamline Team Compelingly Simplify Solutions Before Technicaly Sound Leadership Skills Creative Holstic Process Improvements Proactively Streamline Alternative Niche Markets Forwor Resource Conveniently cultivate pandemic technology and corporate.</p>
										<h6>Somrat Islam <span>(UI Designer)</span></h6>
										<div class="rating">
											<i class="icofont-star"></i>
											<i class="icofont-star"></i>
											<i class="icofont-star"></i>
											<i class="icofont-star"></i>
											<i class="icofont-star"></i>
										</div>
									</div>
								</div>
								<div class="carousel-item">
									<div class="testi-item">
										<p>Extend Accurate Services Long Term High Impact Experiences Interactiv Streamline Team Compelingly Simplify Solutions Before Technicaly Sound Leadership Skills Creative Holstic Process Improvements Proactively Streamline Alternative Niche Markets Forwor Resource Conveniently cultivate pandemic technology and corporate.</p>
										<h6>Somrat Islam <span>(UI Designer)</span></h6>
										<div class="rating">
											<i class="icofont-star"></i>
											<i class="icofont-star"></i>
											<i class="icofont-star"></i>
											<i class="icofont-star"></i>
											<i class="icofont-star"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="carousel-indicators">
								<div data-target="#demo" data-slide-to="0" class="item active">
									<img src="<?= base_url('assets_pelanggan/'); ?>images/testimonial/01.jpg" alt="">
								</div>
								<div data-target="#demo" data-slide-to="1" class="item">
									<img src="<?= base_url('assets_pelanggan/'); ?>images/testimonial/02.jpg" alt="">
								</div>
								<div data-target="#demo" data-slide-to="2" class="item">
									<img src="<?= base_url('assets_pelanggan/'); ?>images/testimonial/03.jpg" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Testimonial Section Ending Here -->