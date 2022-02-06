		<!-- Footer Section Start Here -->
		<footer class="footer">
			<div class="bg-shape-style"></div>
			<div class="container">
				<div class="footer-top">
					<div class="footer-area text-center">
						<div class="footer-logo">
							<a href="index.html"><img src="<?= base_url('assets_pelanggan/'); ?>images/header/footer/01.png" alt="footer-logo"></a>
						</div>
						<div class="scocial-media">
							<a href="#" class="facebook"><i class="icofont-facebook"></i></a>
							<a href="#" class="twitter"><i class="icofont-twitter"></i></a>
							<a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
							<a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
						</div>
						<div class="footer-menu">
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#">How it works?</a></li>
								<li><a href="#">Menus</a></li>
								<li><a href="#">Chefs</a></li>
								<li><a href="#">Recipes</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="footer-bottom text-center">
					<p>Copyright &copy; <?= date('Y'); ?> <a href="#"><span>Wash</span></a> Design by <a href="#"><span>Wash</span></a>.</p>
				</div>
			</div>
		</footer>
		<!-- Footer Section Ending Here -->

		<!-- scrollToTop start here -->
		<a href="#" class="scrollToTop"><i class="icofont-swoosh-up"></i></a>
		<!-- scrollToTop ending here -->



		<!-- <script src="<?= base_url('assets_pelanggan/'); ?>js/jquery.js"></script> -->
		<script src="<?= base_url('assets_pelanggan/'); ?>js/waypoints.min.js"></script>

		<!-- Datepicker -->
		<script src="<?= base_url('assets_admin/'); ?>vendors/datepicker/daterangepicker.js"></script>

		<!-- Select2 -->
		<script src="<?= base_url('assets_admin/'); ?>vendors/select2/js/select2.min.js"></script>

		<script src="<?= base_url('assets_pelanggan/'); ?>js/bootstrap.min.js"></script>
		<script src="<?= base_url('assets_pelanggan/'); ?>js/isotope.pkgd.min.js"></script>
		<script src="<?= base_url('assets_pelanggan/'); ?>js/wow.min.js"></script>
		<script src="<?= base_url('assets_pelanggan/'); ?>js/tab.js"></script>
		<script src="<?= base_url('assets_pelanggan/'); ?>js/swiper.min.js"></script>
		<script src="<?= base_url('assets_pelanggan/'); ?>js/lightcase.js"></script>
		<script src="<?= base_url('assets_pelanggan/'); ?>js/jquery.counterup.min.js"></script>
		<script src="<?= base_url('assets_pelanggan/'); ?>js/functions.js"></script>

		<script>
			$('.select2').select2({
				placeholder: 'Select'
			});
		</script>

		<script>
			var date2 = new Date();
			date2.setDate(date2.getDate());
			console.log(date2);

			var date3 = new Date();
			date3.setDate(date3.getDate() +31);
			console.log(date3);

			$('#datepicker').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
				minDate:date2,
				maxDate:date3,
			});
		</script>

		</body>

		</html>