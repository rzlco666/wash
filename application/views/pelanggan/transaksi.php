<!-- Page Header Section Start Here -->
<section class="page-header style-2">
	<div class="container">
		<div class="page-title text-center">
			<h3>Transaksi</h3>
			<ul class="breadcrumb">
				<li><a href="<?= base_url('Pelanggan/'); ?>">Home</a></li>
				<li>Transaksi</li>
			</ul>
		</div>
	</div>
</section>
<!-- Page Header Section Ending Here -->

<!-- Shop Cart Page Section start here -->
<div class="shop-cart padding-tb">
	<div class="container">
		<div class="section-wrapper">
			<?php
			if (!empty($this->session->flashdata('message'))) {
				?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?php echo $this->session->flashdata('message'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<br/>
				<?php
			}
			?>
			<?php
			if (!empty($this->session->flashdata('error'))) {
				?>
				<div class="alert alert-error alert-dismissible fade show" role="alert">
					<?php echo $this->session->flashdata('error'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<br/>
				<?php
			}
			?>
			<div class="cart-top">
				<table>
					<thead>
					<tr>
						<th>#</th>
						<th>Jadwal</th>
						<th>Total</th>
						<th>Status Transaksi</th>
						<th>Status Pencucian</th>
						<th colspan="2">Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($transaksi as $d) { ?>
						<tr>
							<td class="product-item">
								<div class="p-thumb">
									<a href="<?= base_url('Pelanggan/tempat/') . $d->id_tempat_cuci; ?>"><img
												src="<?= base_url('uploads/tempat_cuci/foto1/'); ?><?= $d->foto1; ?>"
												alt="product"></a>
								</div>
								<div class="p-content">
									<a href="<?= base_url('Pelanggan/tempat/') . $d->id_tempat_cuci; ?>">
										<?= $d->nama_usaha; ?>
									</a>
									<p>
										Order ID : <?= $d->order_id; ?> </br>
										Waktu Transaksi : <?= format_indo($d->transaction_time); ?> </br>
										<?php
										switch ($d->kendaraan) {
											case 1:
												echo "Jenis : Cuci Mobil";
												break;
											case 2:
												echo "Jenis : Cuci Motor";
												break;
										}
										?>
									</p>
								</div>
							</td>
							<td>
								<!-- <p>
                                        Nama : <?= $d->nama; ?></br>
                                        Alamat : <?= $d->alamat; ?></br>
                                        Email : <?= $d->email; ?></br>
                                        No HP : <?= $d->no_hp; ?>
                                    </p> -->
								<p>
									<?= format_indo($d->tanggal_pesan); ?>
								</p>
							</td>
							<td>
								<?= rupiah($d->gross_amount); ?>
								<p>
									<?php $text = $d->payment_type;
									$string = str_replace('_', ' ', $text);
									echo ucwords($string);
									echo ' ' . strtoupper($d->bank) ?></br>
									No. VA : <?= $d->va_number; ?>
								</p>
							</td>
							<td>
								<?php
								if ($d->status_code == "200") {
									?>
									<font color="green">Lunas</font>
									<?php
								} elseif ($d->status_code == "201") {
									?>
									<font color="yellow">Pending</font>
									<?php
								} else {
									?>
									<font color="red">Dibatalkan</font>
									<?php
								}
								?>
							</td>
							<td>
								<?php
								if ($d->status == 1) {
									?>
									<font color="yellow">Menunggu</font>
									<?php
								} elseif ($d->status == 2) {
									?>
									<font color="blue">Diproses</font>
									<?php
								} elseif ($d->status == 3) {
									?>
									<font color="green">Selesai</font>
									<?php
								} else {
									?>
									<font color="red">Dibatalkan</font>
									<?php
								}
								?>
							</td>
							<td>
								<?php
								if ($d->status_code == "200") {
									?>
									<?php
									if ($d->status == 3) {
										?>
										<?php
										$temp = "'$d->order_id'";
										$check = $this->db->query("SELECT * FROM rating WHERE order_id = $temp");
										if ($check->num_rows() > 0) {
											?>
											<a style="color: white;" type="button" data-toggle="modal"
											   data-target="#uprating<?= $d->order_id; ?>"
											   class="button btn btn-success">
												<i class="icofont-ui-rating"></i> Lihat Rating
											</a>
											<?php
										} else {
											?>
											<a style="color: white;" type="button" data-toggle="modal"
											   data-target="#rating<?= $d->order_id; ?>"
											   class="button btn btn-info">
												<i class="icofont-ui-rating"></i> Beri Rating
											</a>
											<?php
										}
										?>

										<a style="color: white;" type="button" data-toggle="modal"
										   data-target="#detailTransaksi<?= $d->order_id; ?>"
										   class="button btn btn-secondary">
											<i class="icofont-info"></i>Detail Transaksi
										</a>
										<?php
									} else {
										?>
										<a style="color: white;" type="button" data-toggle="modal"
										   data-target="#detailTransaksi<?= $d->order_id; ?>"
										   class="button btn btn-secondary">
											<i class="icofont-info"></i>Detail Transaksi
										</a>
										<?php
									}
									?>
									<?php
								} elseif ($d->status_code == "201") {
									?>
									<a href="<?= $d->pdf_url; ?>" class="button btn btn-primary">
										<i class="icofont-pay"></i>Cara Bayar
									</a>
									&nbsp;</br>
									<a style="color: white;" type="button" data-toggle="modal"
									   data-target="#detailTransaksi<?= $d->order_id; ?>"
									   class="button btn btn-secondary">
										<i class="icofont-info"></i>Detail Transaksi
									</a>
									<?php
								} else {
									?>
									<a href="#" class="button btn btn-danger">
										<i class="icofont-close"></i>Dibatalkan
									</a>
									&nbsp;</br>
									<a style="color: white;" type="button" data-toggle="modal"
									   data-target="#detailTransaksi<?= $d->order_id; ?>"
									   class="button btn btn-secondary">
										<i class="icofont-info"></i>Detail Transaksi
									</a>
									<?php
								}
								?>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- Shop Cart Page Section ending here -->

<?php foreach ($transaksi as $d) { ?>
	<!-- Modal Detail -->
	<div class="modal fade" id="detailTransaksi<?= $d->order_id; ?>" tabindex="-1" role="dialog"
		 aria-labelledby="detailTransaksiLabel<?= $d->order_id; ?>" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="detailTransaksiLabel<?= $d->order_id; ?>">Detail Transaksi
						&mdash; <?= $d->order_id; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table>
						<tr>
							<td>Order ID</td>
							<td>:</td>
							<td><?= $d->order_id; ?></td>
						</tr>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><?= $d->nama; ?></td>
						</tr>
						<tr>
							<td style="vertical-align: top;">Billing</td>
							<td style="vertical-align: top;">:</td>
							<td><?= $d->alamat; ?></br><?= $d->email; ?></br><?= $d->no_hp; ?></td>
						</tr>
						<tr>
							<td>Jenis</td>
							<td>:</td>
							<td><?php
								switch ($d->kendaraan) {
									case 1:
										echo "Cuci Mobil";
										break;
									case 2:
										echo "Cuci Motor";
										break;
								}
								?></td>
						</tr>
						<tr>
							<td>Jadwal</td>
							<td>:</td>
							<td><?php echo format_indo($d->tanggal_pesan); ?></td>
						</tr>
						<tr>
							<td>Total Bayar</td>
							<td>:</td>
							<td><?= rupiah($d->gross_amount); ?></td>
						</tr>
						<tr>
							<td>Jenis Pembayaran</td>
							<td>:</td>
							<td><?php $text = $d->payment_type;
								$string = str_replace('_', ' ', $text);
								echo ucwords($string);
								echo ' ' . strtoupper($d->bank) ?></td>
						</tr>
						<tr>
							<td>VA Number</td>
							<td>:</td>
							<td><?= $d->va_number; ?></td>
						</tr>
						<tr>
							<td>Transcation Time</td>
							<td>:</td>
							<td><?php echo format_indo($d->transaction_time); ?></td>
						</tr>
						<tr>
							<td>Status Transaksi</td>
							<td>:</td>
							<td><?php
								if ($d->status_code == "200") {
									?>
									<font color="green"><b>Lunas</b></font>
									<?php
								} elseif ($d->status_code == "201") {
									?>
									<font color="yellow"><b>Pending</b></font>
									<?php
								} else {
									?>
									<font color="red"><b>Dibatalkan</b></font>
									<?php
								}
								?>
							</td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<?php
					if ($d->status_code == "200") {
						?>
						<a target="_blank" href="<?= base_url('Pelanggan/invoice/') . $d->order_id; ?>"
						   class="button btn btn-primary">
							<i class="icofont-print"></i>Cetak Invoice
						</a>
						<?php
					} else {
					}
					?>
					<a style="color: white;" type="button" class="button btn btn-secondary" data-dismiss="modal">
						<i class="icofont-close"></i>Close
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Rating -->
	<div class="modal fade" id="rating<?= $d->order_id; ?>" tabindex="-1" role="dialog"
		 aria-labelledby="rating<?= $d->order_id; ?>" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editProfileLabel">Beri Rating - <?= $d->order_id; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="contact-from">
						<form action="<?= base_url('Pelanggan/tambah_rating') ?>" method="POST"
							  enctype="multipart/form-data">

							<div class="form-group">
								<label for="nama" class="col-form-label">Rating:</label>
								<select class="form-control" name="rating">
									<option value="1" name="rating">
										1
									</option>
									<option value="2" name="rating">
										2
									</option>
									<option value="3" name="rating">
										3
									</option>
									<option value="4" name="rating">
										4
									</option>
									<option value="5" name="rating">
										5
									</option>
								</select>
								<input type="hidden"
									   name="order_id"
									   value="<?= $d->order_id; ?>">
							</div>
							<div class="form-group">
								<label for="nama" class="col-form-label">Feedback:</label>
								<textarea class="form-control" name="feedback"
										  id="feedback" cols="20"
										  rows="5"></textarea>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Update Rating -->
	<div class="modal fade" id="uprating<?= $d->order_id; ?>" tabindex="-1" role="dialog"
		 aria-labelledby="uprating<?= $d->order_id; ?>" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editProfileLabel">Update Rating - <?= $d->order_id; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="contact-from">
						<?php
						$temp2 = "'$d->order_id'";
						$check2 = $this->db->query("SELECT * FROM rating WHERE order_id = $temp2")->result();
						?>
						<form action="<?= base_url('Pelanggan/update_rating/'.$check2[0]->id_rating) ?>" method="POST"
							  enctype="multipart/form-data">

							<div class="form-group">
								<label for="nama" class="col-form-label">Rating:</label>
								<select class="form-control" name="rating">
									<option <?php if($check2[0]->rating === '1'){ echo 'selected="selected"'; } ?> value="1" name="rating">
										1
									</option>
									<option <?php if($check2[0]->rating === '2'){ echo 'selected="selected"'; } ?> value="2" name="rating">
										2
									</option>
									<option <?php if($check2[0]->rating === '3'){ echo 'selected="selected"'; } ?> value="3" name="rating">
										3
									</option>
									<option <?php if($check2[0]->rating === '4'){ echo 'selected="selected"'; } ?> value="4" name="rating">
										4
									</option>
									<option <?php if($check2[0]->rating === '5'){ echo 'selected="selected"'; } ?> value="5" name="rating">
										5
									</option>
								</select>
								<input type="hidden"
									   name="order_id"
									   value="<?= $d->order_id; ?>">
							</div>
							<div class="form-group">
								<label for="nama" class="col-form-label">Feedback:</label>
								<textarea class="form-control" name="feedback"
										  id="feedback" cols="20"
										  rows="5"><?= $check2[0]->feedback ?></textarea>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
