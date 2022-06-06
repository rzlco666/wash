<!-- Content body -->
<div class="content-body">
	<!-- Content -->
	<div class="content ">

		<div class="page-header">
			<div>
				<h3>Data Rating</h3>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?= base_url('Admin/'); ?>">Admin</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Data Rating</li>
					</ol>
				</nav>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">

				<div class="row">
					<div class="col-md-12">

						<div class="card">
							<!-- <div class="card-body">
								<button type="button" class="btn btn-primary btn-uppercase" data-toggle="modal" data-target="#Modal_Add">
									<i class="ti-plus mr-2"></i> Tambah Data
								</button>
							</div> -->
							<div class="card-body">
								<table id="mydata" class="table table-striped table-bordered">
									<thead>
									<tr>
										<th>Order ID</th>
										<th>Rating</th>
										<th>Feedback</th>
										<th>Pelanggan</th>
										<th>Tempat Cuci</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($rating as $data) : ?>
										<tr>
											<td><?= $data->order_id; ?></td>
											<td>
												<?php if ($data->rating == 1) { ?>
													<i data-feather="star" class="text-warning"></i>
												<?php } elseif ($data->rating == 2) { ?>
													<i data-feather="star" class="text-warning"></i>
													<i data-feather="star" class="text-warning"></i>
												<?php } elseif ($data->rating == 3) { ?>
													<i data-feather="star" class="text-warning"></i>
													<i data-feather="star" class="text-warning"></i>
													<i data-feather="star" class="text-warning"></i>
												<?php } elseif ($data->rating == 4) { ?>
													<i data-feather="star" class="text-warning"></i>
													<i data-feather="star" class="text-warning"></i>
													<i data-feather="star" class="text-warning"></i>
													<i data-feather="star" class="text-warning"></i>
												<?php } elseif ($data->rating == 5) { ?>
													<i data-feather="star" class="text-warning"></i>
													<i data-feather="star" class="text-warning"></i>
													<i data-feather="star" class="text-warning"></i>
													<i data-feather="star" class="text-warning"></i>
													<i data-feather="star" class="text-warning"></i>
												<?php } ?>
											</td>
											<td><?= $data->feedback ?></td>
											<td><?= $data->nama_pelanggan ?></td>
											<td><?= $data->nama_tempat ?></td>
											<td>
												<?php
												switch ($data->status) {
													case 1:
														echo "<span class='badge badge-success'>Aktif</span>";
														break;
													case 0:
														echo "<span class='badge badge-danger'>Nonaktif</span>";
														break;
												}
												?>
											</td>
											<td>
												<?php if ($data->status == 0) : ?>
													<button class="btn btn-primary btn-sm item_aktif" data-toggle="modal" data-target="#Modal_Aktif<?= $data->id_rating; ?>">Aktifkan</button>
												<?php else : ?>
													<button class="btn btn-danger btn-sm item_nonaktif" data-toggle="modal" data-target="#Modal_Banned<?= $data->id_rating; ?>">Banned</button>
												<?php endif; ?>
											</td>
										</tr>
									<?php endforeach; ?>
									</tbody>
									<tfoot>
									<tr>
										<th>Order ID</th>
										<th>Rating</th>
										<th>Feedback</th>
										<th>Pelanggan</th>
										<th>Tempat Cuci</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
	<!-- ./ Content -->

	<?php foreach ($rating as $dataa) : ?>
		<!--MODAL Banned-->
		<div class="modal fade" id="Modal_Banned<?= $dataa->id_rating; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form action="<?php echo site_url('Admin/banned_rating') ?>" method="post">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Banned Akun</h5>
							<input type="hidden" value="<?= $dataa->id_rating; ?>" name="id">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<strong>Apakah kamu yakin untuk nonaktif ulasan ini?</strong>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="id_banned" id="id_banned" class="form-control">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
							<button type="submit" id="btn_banned" class="btn btn-primary">Yes</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!--END MODAL Banned-->

		<!--MODAL Aktif-->
		<form action="<?php echo site_url('Admin/aktif_rating') ?>" method="post">
			<div class="modal fade" id="Modal_Aktif<?= $dataa->id_rating; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Aktifkan Akun</h5>
							<input type="hidden" value="<?= $dataa->id_rating; ?>" name="id">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<strong>Apakah kamu yakin untuk aktifkan ulasan ini?</strong>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="id_aktif" id="id_aktif" class="form-control">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
							<button type="submit" id="btn_aktif" class="btn btn-primary">Yes</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!--END MODAL Aktif-->
	<?php endforeach; ?>
