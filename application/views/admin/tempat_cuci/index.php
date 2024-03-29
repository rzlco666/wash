<!-- Content body -->
<div class="content-body">
    <!-- Content -->
    <div class="content ">

        <div class="page-header">
            <div>
                <h3>Data Tempat Cuci</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Admin/'); ?>">Admin</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Tempat Cuci</li>
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
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Pemilik</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Date Created</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_data">
									<?php foreach ($tempat_cuci as $data) : ?>
										<tr>
											<td><?= $data->id; ?></td>
											<td><?= $data->nama; ?></td>
											<td><?= $data->nama_pemilik; ?></td>
											<td><?= $data->alamat; ?></td>
											<td><?= $data->email; ?></td>
											<td><?= $data->hp; ?></td>
											<td><?= $data->date_created; ?></td>
											<td>
												<?php
												switch ($data->kategori) {
													case '1':
														echo "Mobil";
														break;
													case '2':
														echo "Motor";
														break;
													case '3':
														echo "Mobil dan Motor";
														break;
												}
												?>
											</td>
											<td>
												<?php
												switch ($data->status) {
													case '0':
														echo '<span class="badge badge-danger">Dibanned</span>';
														break;
													case '1':
														echo '<span class="badge badge-success">Aktif</span>';
														break;
												}
												?>
											</td>
										</tr>
									<?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Pemilik</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Date Created</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
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
