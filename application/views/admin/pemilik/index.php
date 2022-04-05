<!-- Content body -->
<div class="content-body">
    <!-- Content -->
    <div class="content ">

        <div class="page-header">
            <div>
                <h3>Data Pemilik</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Admin/'); ?>">Admin</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pemilik</li>
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
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Nama Usaha</th>
                                            <th>Alamat Usaha</th>
                                            <th>Date Created</th>
                                            <th>KTP</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_data">
									<?php foreach ($pemilik as $data) : ?>
										<tr>
											<td><?= $data->id; ?></td>
											<td><?= $data->nama; ?></td>
											<td><?= $data->email; ?></td>
											<td><?= $data->hp; ?></td>
											<td><?= $data->nama_usaha; ?></td>
											<td><?= $data->alamat_usaha; ?></td>
											<td><?= $data->date_created; ?></td>
											<td>
												<a target="_blank" class="image-popup" href="<?= base_url('uploads/pemilik/ktp/'); ?><?= $data->ktp; ?>">
													<img src="<?= base_url('uploads/pemilik/ktp/'); ?><?= $data->ktp; ?>" alt="<?= $data->ktp; ?>" style="width: 50px;">
												</a>
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
											<td>
												<?php if ($data->status == 0) : ?>
													<button class="btn btn-primary btn-sm item_aktif" data-toggle="modal" data-target="#Modal_Aktif<?= $data->id; ?>">Aktifkan</button>
												<?php else : ?>
													<button class="btn btn-danger btn-sm item_nonaktif" data-toggle="modal" data-target="#Modal_Banned<?= $data->id; ?>">Banned</button>
												<?php endif; ?>
											</td>
										</tr>
									<?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Nama Usaha</th>
                                            <th>Alamat Usaha</th>
                                            <th>Date Created</th>
                                            <th>KTP</th>
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
	<?php foreach ($pemilik as $dataa) : ?>
    <!--MODAL Banned-->
    <form action="<?php echo site_url('Admin/banned_pemilik') ?>" method="post">
        <div class="modal fade" id="Modal_Banned<?= $dataa->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Banned Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>Apakah kamu yakin untuk banned akun ini?</strong>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id" value="<?= $dataa->id; ?>" class="form-control">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" id="btn_banned" class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL Banned-->

    <!--MODAL Aktif-->
    <form action="<?php echo site_url('Admin/aktif_pemilik') ?>" method="post">
        <div class="modal fade" id="Modal_Aktif<?= $dataa->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aktifkan Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>Apakah kamu yakin untuk aktifkan akun ini?</strong>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id" value="<?= $dataa->id; ?>" class="form-control">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" id="btn_aktif" class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL Aktif-->
	<?php endforeach; ?>
