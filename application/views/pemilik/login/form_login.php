<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemilik &mdash; Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets_admin/'); ?>media/image/favicon.png" />

    <!-- Plugin styles -->
    <link rel="stylesheet" href="<?= base_url('assets_admin/'); ?>vendors/bundle.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="<?= base_url('assets_admin/'); ?>css/app.min.css" type="text/css">
</head>

<body class="form-membership">

    <!-- begin::preloader-->
    <div class="preloader">
        <div class="preloader-icon"></div>
    </div>
    <!-- end::preloader -->

    <div class="form-wrapper">

        <!-- logo -->
        <div id="logo">
            <img src="<?= base_url('assets_admin/'); ?>media/image/dark-logo.png" alt="image">
        </div>
        <!-- ./ logo -->


        <h5>Sign in</h5>

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

        <!-- form -->
        <?php echo form_open('Pemilik/login_proses', ''); ?>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            <?php echo form_error('email', '<div class="text-danger"><small>', '</small></div>');?>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>');?>
        </div>
        <div class="form-group d-flex justify-content-between">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
            </div>
            <a href="recovery-password.html">Reset password</a>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        <hr>
        <p class="text-muted">Login with your social media account.</p>
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="#" class="btn btn-floating btn-facebook">
                    <i class="fa fa-facebook"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="btn btn-floating btn-twitter">
                    <i class="fa fa-twitter"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="btn btn-floating btn-dribbble">
                    <i class="fa fa-dribbble"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="btn btn-floating btn-linkedin">
                    <i class="fa fa-linkedin"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="btn btn-floating btn-google">
                    <i class="fa fa-google"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="btn btn-floating btn-behance">
                    <i class="fa fa-behance"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="btn btn-floating btn-instagram">
                    <i class="fa fa-instagram"></i>
                </a>
            </li>
        </ul>
        <hr>
        <p class="text-muted">Don't have an account?</p>
        <a href="<?= base_url('Pemilik/register'); ?>" class="btn btn-outline-light btn-sm">Register now!</a>
        <?php echo form_close(); ?>
        <!-- ./ form -->


    </div>

    <!-- Plugin scripts -->
    <script src="<?= base_url('assets_admin/'); ?>vendors/bundle.js"></script>

    <!-- App scripts -->
    <script src="<?= base_url('assets_admin/'); ?>js/app.min.js"></script>
</body>

</html>