<!-- Content body -->
<div class="content-body">
    <!-- Content -->
    <div class="content ">

        <div class="page-header">
            <div>
                <h3>Data Pelanggan</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Admin/'); ?>">Admin</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pelanggan</li>
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
                                            <th>Date Created</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_data">
									<?php foreach ($pelanggan as $data) : ?>
									<tr>
										<td><?= $data->id; ?></td>
										<td><?= $data->nama; ?></td>
										<td><?= $data->email; ?></td>
										<td><?= $data->date_created; ?></td>
										<td>
											<?php if ($data->status == 1) : ?>
												<span class="badge badge-success">Aktif</span>
											<?php else : ?>
												<span class="badge badge-danger">Tidak Aktif</span>
											<?php endif; ?>
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
                                            <th>Date Created</th>
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

	<?php foreach ($pelanggan as $dataa) : ?>
    <!--MODAL Banned-->
        <div class="modal fade" id="Modal_Banned<?= $dataa->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
				<form action="<?php echo site_url('Admin/banned_pelanggan') ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Banned Akun</h5>
						<input type="hidden" value="<?= $dataa->id; ?>" name="id">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>Apakah kamu yakin untuk banned akun ini?</strong>
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
    <form action="<?php echo site_url('Admin/aktif_pelanggan') ?>" method="post">
        <div class="modal fade" id="Modal_Aktif<?= $dataa->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aktifkan Akun</h5>
						<input type="hidden" value="<?= $dataa->id; ?>" name="id">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>Apakah kamu yakin untuk aktifkan akun ini?</strong>
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
