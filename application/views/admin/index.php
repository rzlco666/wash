<!-- Content body -->
<div class="content-body">
	<!-- Content -->
	<div class="content ">
		<div class="page-header d-md-flex justify-content-between">
			<?php foreach ($admin as $admin) : ?>
				<div>
					<h3>Selamat datang, <?= $admin->nama; ?></h3>
					<p class="text-muted">Halaman ini menunjukkan ikhtisar untuk ringkasan akun Anda.</p>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between">
							<h6 class="card-title mb-2">Pendapatan bulanan</h6>
							<div class="d-flex justify-content-between">
								<a href="#" class="btn btn-floating">
									<i class="ti-reload"></i>
								</a>
								<div class="dropdown">
									<a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="ti-more-alt"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
						</div>
						<p class="text-muted mb-4">Periksa bagaimana kinerja keuangan Anda untuk bulan ini</p>
						<div id="saless"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row">

				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between">
							<h6 class="card-title mb-2">Pencucian Mobil</h6>
							<div class="dropdown">
								<a href="#" class="btn btn-floating" data-toggle="dropdown">
									<i class="ti-more-alt"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
						<div>
							<div class="list-group list-group-flush">
								<?php //if $pendapatan mobil isnt empty
								if ($pendapatan_mobil != null) :
									foreach ($pendapatan_mobil as $pendapatan_mobil) : ?>
										<div class="list-group-item d-flex justify-content-between align-items-center px-0">
											<div>
												<h5>Bulan</h5>
												<div><?= $pendapatan_mobil->bulan; ?></div>
											</div>
										</div>
										<div class="list-group-item d-flex justify-content-between align-items-center px-0">
											<div>
												<h5>Pendapatan</h5>
												<div>Jumlah pendapatan bulan ini</div>
											</div>
											<h3 class="text-success mb-0">Rp. <?= number_format($pendapatan_mobil->jumlah, 0, ',', '.') ?></h3>
										</div>
										<div class="list-group-item d-flex justify-content-between align-items-center px-0">
											<div>
												<h5>Pencucian</h5>
												<div>Total pencucian bulan ini</div>
											</div>
											<div>
												<h3 class="text-info mb-0"><?= $pendapatan_mobil->pencucian; ?></h3>
											</div>
										</div>
									<?php endforeach;
								else:
									?>
									<div class="list-group-item d-flex justify-content-between align-items-center px-0">
										<div>
											<h5>Bulan</h5>
											<div><?php
												echo date('M Y');
												?></div>
										</div>
									</div>
									<div class="list-group-item d-flex justify-content-between align-items-center px-0">
										<div>
											<h5>Pendapatan</h5>
											<div>Jumlah pendapatan bulan ini</div>
										</div>
										<h3 class="text-success mb-0">Rp. <?= number_format(0, 0, ',', '.') ?></h3>
									</div>
									<div class="list-group-item d-flex justify-content-between align-items-center px-0">
										<div>
											<h5>Pencucian</h5>
											<div>Total pencucian bulan ini</div>
										</div>
										<div>
											<h3 class="text-info mb-0">0</h3>
										</div>
									</div>
								<?php
								endif;
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between">
							<h6 class="card-title mb-2">Pencucian Motor</h6>
							<div class="dropdown">
								<a href="#" class="btn btn-floating" data-toggle="dropdown">
									<i class="ti-more-alt"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
						<div>
							<div class="list-group list-group-flush">
								<?php
								if ($pendapatan_motor != null) :
									foreach ($pendapatan_motor as $pendapatan_motor) : ?>
										<div class="list-group-item d-flex justify-content-between align-items-center px-0">
											<div>
												<h5>Bulan</h5>
												<div><?= $pendapatan_motor->bulan; ?></div>
											</div>
										</div>
										<div class="list-group-item d-flex justify-content-between align-items-center px-0">
											<div>
												<h5>Pendapatan</h5>
												<div>Jumlah pendapatan bulan ini</div>
											</div>
											<h3 class="text-success mb-0">Rp. <?= number_format($pendapatan_motor->jumlah, 0, ',', '.') ?></h3>
										</div>
										<div class="list-group-item d-flex justify-content-between align-items-center px-0">
											<div>
												<h5>Pencucian</h5>
												<div>Total pencucian bulan ini</div>
											</div>
											<div>
												<h3 class="text-info mb-0"><?= $pendapatan_motor->pencucian; ?></h3>
											</div>
										</div>
									<?php endforeach;
								else:
									?>
									<div class="list-group-item d-flex justify-content-between align-items-center px-0">
										<div>
											<h5>Bulan</h5>
											<div><?php
												echo date('M Y');
												?></div>
										</div>
									</div>
									<div class="list-group-item d-flex justify-content-between align-items-center px-0">
										<div>
											<h5>Pendapatan</h5>
											<div>Jumlah pendapatan bulan ini</div>
										</div>
										<h3 class="text-success mb-0">Rp. <?= number_format(0, 0, ',', '.') ?></h3>
									</div>
									<div class="list-group-item d-flex justify-content-between align-items-center px-0">
										<div>
											<h5>Pencucian</h5>
											<div>Total pencucian bulan ini</div>
										</div>
										<div>
											<h3 class="text-info mb-0">0</h3>
										</div>
									</div>
								<?php
								endif;
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body text-center">
						<h6 class="card-title mb-2 text-center">Total Saldo</h6>
						<p class="mb-0 text-muted">Total pendapatan transaksi lunas dan telah selesai dicuci</p>
						<hr>
						<?php
						foreach ($saldo_total as $saldo) {
							?>
							<div class="font-size-40 font-weight-bold">Rp. <?= number_format($saldo->saldo, 0, ',', '.') ?></div>
						<?php } ?>
						<hr>
						<p class="font-weight-bold">Pencucian Bulanan</p>
						<div id="ecommerce-activity-chartt"></div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between">
							<h6 class="card-title">Ulasan</h6>
							<a href="<?= site_url('Admin/rating') ?>" class="link-1">View All</a>
						</div>
						<div class="card-scroll" style="height: 430px">
							<ul class="list-group list-group-flush">
								<?php foreach ($rating as $rating) : ?>
									<li class="list-group-item d-flex px-0 py-4">
										<div class="flex-grow-1">
											<div class="d-flex justify-content-between">
												<a href="#">
													<h6><?= $rating->nama_pelanggan ?></h6>
													<ul class="list-inline mb-1">
														<?php if ($rating->rating == 1) { ?>
															<i data-feather="star" class="text-warning"></i>
														<?php } elseif ($rating->rating == 2) { ?>
															<i data-feather="star" class="text-warning"></i>
															<i data-feather="star" class="text-warning"></i>
														<?php } elseif ($rating->rating == 3) { ?>
															<i data-feather="star" class="text-warning"></i>
															<i data-feather="star" class="text-warning"></i>
															<i data-feather="star" class="text-warning"></i>
														<?php } elseif ($rating->rating == 4) { ?>
															<i data-feather="star" class="text-warning"></i>
															<i data-feather="star" class="text-warning"></i>
															<i data-feather="star" class="text-warning"></i>
															<i data-feather="star" class="text-warning"></i>
														<?php } elseif ($rating->rating == 5) { ?>
															<i data-feather="star" class="text-warning"></i>
															<i data-feather="star" class="text-warning"></i>
															<i data-feather="star" class="text-warning"></i>
															<i data-feather="star" class="text-warning"></i>
															<i data-feather="star" class="text-warning"></i>
														<?php } ?>
													</ul>
												</a>
												<div class="ml-auto">
													<div class="dropdown">
														<a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
															<i class="ti-more-alt"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right">
															<a href="#" class="dropdown-item">View</a>
															<a href="#" class="dropdown-item">Send Message</a>
														</div>
													</div>
												</div>
											</div>
											<p class="mb-0"><?= $rating->feedback ?></p>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="text-center">
							<h6 class="card-title mb-4 text-center">Total pendapatan bulan ini</h6>
							<?php
							if ($pendapatan_bulan_ini != null) :
								foreach ($pendapatan_bulan_ini as $pendapatan_bulan_ini) : ?>
									<h2 class="font-size-35 font-weight-bold text-center">Rp. <?= number_format($pendapatan_bulan_ini->jumlah, 0, ',', '.') ?></h2>
								<?php endforeach;
							else:
								?>
								<h2 class="font-size-35 font-weight-bold text-center">Rp. <?= number_format(0, 0, ',', '.') ?></h2>
							<?php
							endif;
							?>
							<p>Bagan ini menunjukkan total pendapatan bulan ini.</p>
						</div>
					</div>
				</div>
				<div class="card bg-info-bright">
					<div class="card-body">
						<div class="text-center">
							<h6 class="card-title mb-4 text-center">Total pendapatan bulan lalu</h6>
							<?php
							if ($pendapatan_bulan_lalu != null) :
								foreach ($pendapatan_bulan_lalu as $pendapatan_bulan_lalu) : ?>
									<h2 class="font-size-35 font-weight-bold text-center">Rp. <?= number_format($pendapatan_bulan_lalu->jumlah, 0, ',', '.') ?></h2>
								<?php endforeach;
							else:
								?>
								<h2 class="font-size-35 font-weight-bold text-center">Rp. <?= number_format(0, 0, ',', '.') ?></h2>
							<?php
							endif;
							?>
							<p>Bagan ini menunjukkan total pendapatan bulan lalu.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between mb-4">
							<div>
								<h6 class="card-title mb-1">Perbandingan pendapatan bulan ini</h6>
							</div>
							<div>
								<a href="#" class="btn btn-floating">
									<i class="fa fa-refresh"></i>
								</a>
								<div class="dropdown">
									<a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="ti-more-alt"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
						</div>
						<div id="monthly-saless"></div>
						<ul class="list-inline text-center">
							<li class="list-inline-item">
								<i class="fa fa-circle mr-1" style="color:#FF657A;"></i> Mobil <br>
							</li>
							<li class="list-inline-item">
								<i class="fa fa-circle mr-1 text-primary"></i> Motor <br>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-body">
				<h6 class="card-title">Transaksi Terbaru</h6>
				<div class="table-responsive">
					<table id="recent-orders" class="table">
						<thead>
						<tr>
							<th>Order ID</th>
							<th>Pemesan</th>
							<th>#</th>
							<th>Jadwal</th>
							<th>Total</th>
							<th>Status Transaksi</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($transaksi as $tempat_cuci) : ?>
							<tr>
								<td><?= $tempat_cuci->order_id; ?></td>
								<td><?= $tempat_cuci->nama; ?></td>

								<td>
									<p><b><?= $tempat_cuci->nama_usaha; ?></b></p>
									<p>Waktu Transaksi : </br> <?= format_indo($tempat_cuci->transaction_time); ?></p>
									<?php
									switch ($tempat_cuci->kendaraan) {
										case 1:
											echo "<p>Jenis : Cuci Mobil</p>";
											break;
										case 2:
											echo "<p>Jenis : Cuci Motor</p>";
											break;
									}
									?>
								</td>

								<td><?= format_indo($tempat_cuci->tanggal_pesan); ?></td>

								<td>
									<?= rupiah($tempat_cuci->gross_amount); ?>
									<p>
										<?php $text = $tempat_cuci->payment_type;
										$string = str_replace('_', ' ', $text);
										echo ucwords($string);
										echo ' ' . strtoupper($tempat_cuci->bank) ?></br>
										No. VA : <?= $tempat_cuci->va_number; ?>
									</p>
								</td>
								<td>
									<?php
									switch ($tempat_cuci->status_code) {
										case 201:
											echo "<span class='badge badge-warning'>Pending</span>";
											break;
										case 200:
											echo "<span class='badge badge-success'>Lunas</span>";
											break;
										default:
											echo "<span class='badge badge-danger'>Dibatalkan</span>";
											break;
									}
									?>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- Modal -->

	</div>
	<!-- ./ Content -->
