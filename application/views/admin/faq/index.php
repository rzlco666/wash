<!-- Content body -->
<div class="content-body">
    <!-- Content -->
    <div class="content ">

        <div class="page-header">
            <div>
                <h3>Data F.A.Q.</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Admin/'); ?>">Admin</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">F.A.Q.</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary btn-uppercase" data-toggle="modal" data-target="#Modal_Add">
                                    <i class="ti-plus mr-2"></i> Tambah Data
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="mydata" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_data">
									<?php foreach ($faq as $data) : ?>
										<tr>
											<td><?= $data->id; ?></td>
											<td><?= $data->question; ?></td>
											<td><?= $data->answer; ?></td>
											<td>
												<button class="btn btn-primary btn-sm item_aktif" data-toggle="modal" data-target="#Modal_Edit<?= $data->id; ?>">Edit</button>
												<button class="btn btn-danger btn-sm item_nonaktif" data-toggle="modal" data-target="#Modal_Hapus<?= $data->id; ?>">Hapus</button>
											</td>
										</tr>
									<?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Question</th>
                                            <th>Answer</th>
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

    <!-- MODAL ADD -->
        <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<form action="<?php echo site_url('Admin/save_faq') ?>" method="post">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah FAQ Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Question</label>
                            <div class="col-md-10">
                                <input type="text" name="question" id="question" class="form-control" placeholder="Question">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Answer</label>
                            <div class="col-md-10">
                                <input type="text" name="answer" id="answer" class="form-control" placeholder="Answer">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_save" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
			</form>
        </div>
    <!--END MODAL ADD-->

	<?php foreach ($faq as $dataa) :
		$temp = "'$dataa->id'";
		$check2 = $this->db->query("SELECT * FROM faq WHERE id = $temp")->result();
		?>

    <!-- MODAL EDIT -->
    <form action="<?php echo site_url('Admin/update_faq') ?>" method="post">
        <div class="modal fade" id="Modal_Edit<?= $dataa->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit FAQ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ID</label>
                            <div class="col-md-10">
                                <input type="text" name="id" id="id" value="<?= $check2[0]->id ?>" class="form-control" placeholder="ID" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Question</label>
                            <div class="col-md-10">
                                <input type="text" name="question" id="question" value="<?= $check2[0]->question ?>" class="form-control" placeholder="Question">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Answer</label>
                            <div class="col-md-10">
                                <input type="text" name="answer" id="answer" value="<?= $check2[0]->answer ?>" class="form-control" placeholder="Answer">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL EDIT-->

    <!--MODAL DELETE-->
    <form action="<?php echo site_url('Admin/delete_faq') ?>" method="post">
        <div class="modal fade" id="Modal_Hapus<?= $dataa->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete FAQ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>Are you sure to delete this record?</strong>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id" value="<?= $dataa->id; ?>" class="form-control">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL DELETE-->

	<?php endforeach; ?>
