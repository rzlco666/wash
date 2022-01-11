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
                            <h5>Login</h5>
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
                            <form action="<?= base_url('Pelanggan/login_proses'); ?>" method="POST" class="d-flex flex-wrap justify-content-between">
                                <input class="w-100" type="email" name="email" placeholder="Your Email">
                                <?php echo form_error('email', '<div class="text-danger"><small>', '</small></div>'); ?>
                                <input class="w-100" type="password" name="password" placeholder="Your Password">
                                <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>'); ?>
                                <button type="submit" class="food-btn style-2"><span>Sign in</span></button>
                            </form>
                            <p class="text-muted">Don't have an account? <a href="<?= base_url('Pelanggan/register'); ?>">Register now!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Us Section Ending Here -->