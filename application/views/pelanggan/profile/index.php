<?php foreach ($pelanggan as $pelanggan) : ?>
    <!-- Popular Home Chef Section Start Here -->
    <div class="popular-chef single padding-tb">
        <div class="container">
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-12">
                        <article>
                            <div class="chef-item">
                                <div class="chef-inner">
                                    <div class="chef-thumb">
                                        <img src="<?= base_url('assets_pelanggan/'); ?>images/chef/01.jpg" alt="food-chef">
                                    </div>

                                    <div class="chef-content">

                                        <div class="chef-author">
                                            <img src="<?= base_url('uploads/pelanggan/'); ?><?= $pelanggan->image; ?>" alt="chef-author">
                                        </div>
                                        <div class="chef-desc">
                                            <div class="chef-desc-top">
                                                <div class="title">
                                                    <h5><?= $pelanggan->nama; ?></h5>
                                                    <p>Pelanggan</p>
                                                </div>
                                                <div class="scocial-share">
                                                    <a style="color: white;" type="button" class="food-btn" data-toggle="modal" data-target="#editProfile">
                                                        <i class="icofont-settings"></i> Edit Profile
                                                    </a>
                                                    <a style="color: white; background-color: cadetblue;" type="button" class="food-btn" data-toggle="modal" data-target="#editPassword">
                                                        <i class="icofont-ui-password"></i> Edit Password
                                                    </a>
                                                </div>
                                            </div>
                                            <?php
                                            if (!empty($this->session->flashdata('success'))) {
                                            ?>
                                                <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($this->session->flashdata('error'))) {
                                            ?>
                                                <div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('error'); ?></div>
                                            <?php
                                            }
                                            ?>
                                            <div class="chef-desc-middle">
                                                <ul>
                                                    <li><span>Nama</span>: <?= $pelanggan->nama; ?></li>
                                                    <li><span>Email</span>: <?= $pelanggan->email; ?></li>
                                                    <li><span>Username</span>: @<?= (str_replace(' ', '', strtolower($pelanggan->nama))); ?></li>
                                                    <li><span>Bergabung</span>: <?= $pelanggan->date_created; ?></li>
                                                    <li><span>Status</span>: <span class="badge badge-success">Aktif</span></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Home Chef Section Ending Here -->

    <!-- Modal Profile -->
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="contact-from">
                        <form action="<?= base_url('Pelanggan/update_profile') ?>" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="nama" class="col-form-label">Nama:</label>
                                <input type="text" name="nama" id="nama" value="<?= $pelanggan->nama ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-form-label">Email:</label>
                                <input type="email" name="email" id="email" value="<?= $pelanggan->email ?>">
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label">Foto:</label>
                                <input type="file" id="image" name="image">
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

    <!-- Modal Password -->
    <div class="modal fade" id="editPassword" tabindex="-1" role="dialog" aria-labelledby="editPasswordLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPasswordLabel">Edit Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="contact-from">
                        <form action="<?= base_url('Pelanggan/update_password') ?>" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="nama" class="col-form-label">Password Lama (Encrypted):</label>
                                <input type="password" id="nama" value="<?= $pelanggan->password ?>">
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Password Baru:</label>
                                <input type="password" name="password" id="password">
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
<?php endforeach; ?>