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
