<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin &mdash; <?= $title; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets_admin/'); ?>media/image/favicon.png" />

    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('assets_admin/'); ?>vendors/bundle.css" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- DataTable -->
    <link rel="stylesheet" href="<?= base_url('assets_admin/'); ?>vendors/dataTable/datatables.min.css" type="text/css">

    <!-- Prism -->
    <link rel="stylesheet" href="<?= base_url('assets_admin/'); ?>vendors/prism/prism.css" type="text/css">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="<?= base_url('assets_admin/'); ?>vendors/datepicker/daterangepicker.css" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="<?= base_url('assets_admin/'); ?>vendors/dataTable/datatables.min.css" type="text/css">

    <!-- App css -->
    <link rel="stylesheet" href="<?= base_url('assets_admin/'); ?>css/app.min.css" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="scrollable-layout">
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-icon"></div>
        <span>Loading...</span>
    </div>
    <!-- ./ Preloader -->

    <!-- Layout wrapper -->
    <div class="layout-wrapper">

        <!-- Header -->
        <div class="header d-print-none">
            <div class="header-container">
                <div class="header-left">
                    <div class="navigation-toggler">
                        <a href="#" data-action="navigation-toggler">
                            <i data-feather="menu"></i>
                        </a>
                    </div>

                    <div class="header-logo">
                        <a href=index.html>
                            <img class="logo" src="<?= base_url('assets_admin/'); ?>media/image/logo.png" alt="logo">
                        </a>
                    </div>
                </div>

                <div class="header-body">
                    <div class="header-body-left">
                        <ul class="navbar-nav">
                            <li class="nav-item mr-3">
                                <div class="header-search-form">
                                    <form>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn">
                                                    <i data-feather="search"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn header-search-close-btn">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown d-none d-md-block">
                                <a href="#" class="nav-link" title="Apps" data-toggle="dropdown">Apps</a>
                                <div class="dropdown-menu dropdown-menu-big">
                                    <div class="border-bottom px-4 py-3 text-center d-flex justify-content-between">
                                        <h5 class="mb-0">Apps</h5>
                                    </div>
                                    <div class="p-3">
                                        <div class="row row-xs">
                                            <div class="col-6">
                                                <a href="chat.html">
                                                    <div class="border-radius-1 text-center mb-3">
                                                        <figure class="avatar avatar-lg border-0">
                                                            <span class="avatar-title bg-primary text-white rounded-circle">
                                                                <i class="width-30 height-30" data-feather="message-circle"></i>
                                                            </span>
                                                        </figure>
                                                        <div class="mt-2">Chat</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a href="mail.html">
                                                    <div class="border-radius-1 text-center mb-3">
                                                        <figure class="avatar avatar-lg border-0">
                                                            <span class="avatar-title bg-secondary text-white rounded-circle">
                                                                <i class="width-30 height-30" data-feather="mail"></i>
                                                            </span>
                                                        </figure>
                                                        <div class="mt-2">Mail</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a href="todo-list.html">
                                                    <div class="border-radius-1 text-center">
                                                        <figure class="avatar avatar-lg border-0">
                                                            <span class="avatar-title bg-info text-white rounded-circle">
                                                                <i class="width-30 height-30" data-feather="check-circle"></i>
                                                            </span>
                                                        </figure>
                                                        <div class="mt-2">Todo List</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a href="file-manager.html">
                                                    <div class="border-radius-1 text-center">
                                                        <figure class="avatar avatar-lg border-0">
                                                            <span class="avatar-title bg-warning text-white rounded-circle">
                                                                <i class="width-30 height-30" data-feather="file"></i>
                                                            </span>
                                                        </figure>
                                                        <div class="mt-2">File Manager</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown d-none d-md-block">
                                <a href="#" class="nav-link" title="Actions" data-toggle="dropdown">Create</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Add Products</a>
                                    <a href="#" class="dropdown-item">Add Category</a>
                                    <a href="#" class="dropdown-item">Add Report</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">Reports</a>
                                    <a href="#" class="dropdown-item">Customers</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="header-body-right">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link mobile-header-search-btn" title="Search">
                                    <i data-feather="search"></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown d-none d-md-block">
                                <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                                    <i class="maximize" data-feather="maximize"></i>
                                    <i class="minimize" data-feather="minimize"></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <?php foreach ($admin as $admin) : ?>
                                    <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                                        <figure class="avatar avatar-sm">
                                            <?php
                                            if ($admin->foto == 'avatar.jpg') {
                                            ?>
                                                <img src="<?= base_url('uploads/admin/def/'); ?><?= $admin->foto; ?>" class="rounded-circle" alt="avatar">
                                            <?php
                                            } else {
                                            ?>
                                                <img src="<?= base_url('uploads/admin/'); ?><?= $admin->foto; ?>" class="rounded-circle" alt="avatar">
                                            <?php
                                            }
                                            ?>
                                        </figure>
                                        <span class="ml-2 d-sm-inline d-none"><?= $admin->nama; ?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                        <div class="text-center py-4">
                                            <figure class="avatar avatar-lg mb-3 border-0">
                                                <?php
                                                if ($admin->foto == 'avatar.jpg') {
                                                ?>
                                                    <img src="<?= base_url('uploads/admin/def/'); ?><?= $admin->foto; ?>" class="rounded-circle" alt="image">
                                                <?php
                                                } else {
                                                ?>
                                                    <img src="<?= base_url('uploads/admin/'); ?><?= $admin->foto; ?>" class="rounded-circle" alt="image">
                                                <?php
                                                }
                                                ?>
                                            </figure>
                                            <h5 class="text-center"><?= $admin->nama; ?></h5>
                                            <div class="mb-3 small text-center text-muted">@<?= (str_replace(' ', '', strtolower($admin->nama))); ?></div>
                                            <a href="<?= base_url('Admin/profile'); ?>" class="btn btn-outline-light btn-rounded">Manage Your Account</a>
                                        </div>
                                        <div class="list-group">
                                            <a href="<?= base_url('Admin/profile'); ?>" class="list-group-item">View Profile</a>
                                            <a href="<?= base_url('Admin/logout'); ?>" class="list-group-item text-danger">Log Out!</a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </li>
                        </ul>
                    </div>
                </div>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item header-toggler">
                        <a href="#" class="nav-link">
                            <i data-feather="arrow-down"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ./ Header -->