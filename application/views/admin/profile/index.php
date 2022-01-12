<!-- Content body -->
<div class="content-body">
    <!-- Content -->
    <div class="content ">

        <div class="page-header">
            <div>
                <h3>Profile</h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Admin/'); ?>">Admin</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav nav-pills flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-item nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Your
                                Profile</a>
                            <a class="nav-item nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Password</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="galeri"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Password</h6>
                                        <?php foreach ($admin as $admin) : ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Old Password (Encrypted)</label>
                                                        <input type="password" value="<?= $admin->password; ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" data-toggle="modal" data-target="#myModalPassword" class="btn btn-primary btn-uppercase">
                                                <i class="ti-settings mr-2"></i> Edit Password
                                            </button>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ./ Content -->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form">
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="form-group text-center" id="preview"></div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="file" id="file" class="custom-file-input">
                                <label class="custom-file-label" for="file">
                                    Pilih Foto
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group" id="fail_upload_msg"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" id="btn_upload" type="submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModalPassword" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-sm" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Admin/edit_password'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>