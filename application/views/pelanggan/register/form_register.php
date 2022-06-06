        <!-- Contact Us Section Start Here -->
        <section class="contact-information padding-tb pb-xl-0">
            <div class="container">
                <div class="section-wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="apps-thumb">
                                <img src="<?= base_url('assets_pelanggan/'); ?>images/apps/01.png" alt="food-apps">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <h5>Register</h5>
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
                            <form action="<?= base_url('Pelanggan/register_proses'); ?>" method="POST" class="d-flex flex-wrap justify-content-between">
                                <input class="w-100" type="text" name="nama" placeholder="Name">
                                <?php echo form_error('nama', '<div class="text-danger"><small>', '</small></div>'); ?>
                                <input class="w-100" type="email" name="email" placeholder="Email">
                                <?php echo form_error('email', '<div class="text-danger"><small>', '</small></div>'); ?>
                                <input class="w-100" type="password" name="password" placeholder="Password">
                                <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>'); ?>
								<input class="w-100" type="text" name="alamat" placeholder="Alamat">
								<?php echo form_error('alamat', '<div class="text-danger"><small>', '</small></div>'); ?>
								<input class="w-100" type="number" name="no_hp" placeholder="No HP">
								<?php echo form_error('no_hp', '<div class="text-danger"><small>', '</small></div>'); ?>
								<input class="w-100" type="number" name="umur" placeholder="Umur">
								<?php echo form_error('umur', '<div class="text-danger"><small>', '</small></div>'); ?>
								<select class="w-100 form-group" name="jenis_kelamin">
									<option value="" disabled selected>Pilih Jenis Kelamin</option>
									<option class="w-100" value="Laki-laki" name="jenis_kelamin">Laki-laki</option>
									<option class="w-100" value="Perempuan" name="jenis_kelamin">Perempuan</option>
								</select>
								<?php echo form_error('jenis_kelamin', '<div class="text-danger"><small>', '</small></div>'); ?>
                                <button type="submit" class="food-btn style-2"><span>Daftar</span></button>
                            </form>
                            <p class="text-muted">Sudah punya akun? <a href="<?= base_url('Pelanggan/login'); ?>">login sekarang!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Us Section Ending Here -->
