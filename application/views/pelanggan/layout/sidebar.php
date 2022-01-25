<body>
    <!-- preloader -->
    <div class="preloader">
        <div class="load loade">
            <hr />
            <hr />
            <hr />
            <hr />
        </div>
    </div>
    <!-- preloader -->

    <!-- search area -->
    <div class="search-area">
        <div class="search-input">
            <div class="search-close">
                <span></span>
                <span></span>
            </div>
            <form>
                <input type="text" name="text" placeholder="*Search Here.......">
            </form>
        </div>
    </div>
    <!-- search area -->

    <!-- Mobile Menu Start Here -->
    <div class="mobile-menu">
        <nav class="mobile-header d-xl-none">
            <div class="header-logo">
                <a href="<?= base_url('Pelanggan/index'); ?>" class="logo"><img src="<?= base_url('assets_pelanggan/'); ?>images/logo/01.png" alt="logo"></a>
            </div>
            <div class="header-bar">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
        <nav class="menu">
            <div class="mobile-menu-area d-xl-none">
                <div class="mobile-menu-area-inner scrollbar">
                    <div class="mobile-search">
                        <input type="text" placeholder="Search Here.........">
                        <button type="submit"><i class="icofont-search-2"></i></button>
                    </div>
                    <ul>
                        <li><a class="<?php if ($title == 'Landing') {
                                            echo 'active';
                                        } ?>" href="<?= base_url('Pelanggan/index'); ?>">Home</a></li>
                        <li>
                            <a href="#0">Tempat Cuci</a>
                            <ul>
                                <li><a href="<?= base_url('Pelanggan/tempat_cuci'); ?>">Tempat Cuci</a></li>
                            </ul>
                        </li>
                        <?php if ($this->session->userdata('is_login') == TRUE) : ?>
                            <li>
                                <a class="<?php if ($title == 'Transaksi') {
                                                echo 'active';
                                            } ?>" href="#0">Transaksi</a>
                                <ul>
                                    <li><a class="<?php if ($title == 'Transaksi') {
                                                        echo 'active';
                                                    } ?>" href="<?= base_url('Pelanggan/transaksi'); ?>">Transaksi</a></li>
                                </ul>
                            </li>
                        <?php else : ?>
                        <?php endif; ?>
                        <li>
                            <a class="<?php if ($title == 'F.A.Q.') {
                                            echo 'active';
                                        } ?>" href="#0">Contact</a>
                            <ul>
                                <li><a class="<?php if ($title == 'F.A.Q.') {
                                                    echo 'active';
                                                } ?>" href="<?= base_url('Pelanggan/faq'); ?>">F.A.Q.</a></li>
                            </ul>
                        </li>
                        <li>
                            <?php if ($this->session->userdata('is_login') == FALSE) : ?>
                                <a class="<?php if ($title == 'Login' || $title == 'Register') {
                                                echo 'active';
                                            } ?>" href="#0">Profile</a>
                                <ul>
                                    <li><a class="<?php if ($title == 'Register') {
                                                        echo 'active';
                                                    } ?>" href="<?= base_url('Pelanggan/register'); ?>">Daftar</a></li>
                                    <li><a class="<?php if ($title == 'Login') {
                                                        echo 'active';
                                                    } ?>" href="<?= base_url('Pelanggan/login'); ?>">Login</a></li>
                                </ul>
                            <?php else : ?>
                                <a class="<?php if ($title == 'Profile') {
                                                echo 'active';
                                            } ?>" href="#0">Hi, <?= $this->session->userdata('nama') ?></a>
                                <ul>
                                    <li><a class="<?php if ($title == 'Profile') {
                                                        echo 'active';
                                                    } ?>" href="<?= base_url('Pelanggan/profile'); ?>">Profile</a></li>
                                    <li><a href="<?= base_url('Pelanggan/logout'); ?>">Logout</a></li>
                                </ul>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Mobile Menu Ending Here -->

    <!-- header section start -->
    <header class="header-section d-xl-block d-none">
        <div class="container-fluid">
            <div class="header-area">
                <div class="logo">
                    <a href="<?= base_url('Pelanggan/index'); ?>"><img src="<?= base_url('assets_pelanggan/'); ?>images/logo/01.png" alt="logo"></a>
                </div>
                <div class="main-menu">
                    <ul>
                        <li><a class="<?php if ($title == 'Landing') {
                                            echo 'active';
                                        } ?>" href="<?= base_url('Pelanggan/index'); ?>">Home</a></li>
                        <li>
                            <a href="#0">Tempat Cuci</a>
                            <ul>
                                <li><a href="<?= base_url('Pelanggan/tempat_cuci'); ?>">Tempat Cuci</a></li>
                            </ul>
                        </li>
                        <?php if ($this->session->userdata('is_login') == TRUE) : ?>
                            <li>
                                <a class="<?php if ($title == 'Transaksi') {
                                                echo 'active';
                                            } ?>" href="#0">Transaksi</a>
                                <ul>
                                    <li><a class="<?php if ($title == 'Transaksi') {
                                                        echo 'active';
                                                    } ?>" href="<?= base_url('Pelanggan/transaksi'); ?>">Transaksi</a></li>
                                </ul>
                            </li>
                        <?php else : ?>
                        <?php endif; ?>
                        <li>
                            <a class="<?php if ($title == 'F.A.Q.') {
                                            echo 'active';
                                        } ?>" href="#0">Contact</a>
                            <ul>
                                <li><a class="<?php if ($title == 'F.A.Q.') {
                                                    echo 'active';
                                                } ?>" href="<?= base_url('Pelanggan/faq'); ?>">F.A.Q.</a></li>
                            </ul>
                        </li>
                        <li>
                            <?php if ($this->session->userdata('is_login') == FALSE) : ?>
                                <a class="<?php if ($title == 'Login' || $title == 'Register') {
                                                echo 'active';
                                            } ?>" href="#0">Profile</a>
                                <ul>
                                    <li><a class="<?php if ($title == 'Register') {
                                                        echo 'active';
                                                    } ?>" href="<?= base_url('Pelanggan/register'); ?>">Daftar</a></li>
                                    <li><a class="<?php if ($title == 'Login') {
                                                        echo 'active';
                                                    } ?>" href="<?= base_url('Pelanggan/login'); ?>">Login</a></li>
                                </ul>
                            <?php else : ?>
                                <a class="<?php if ($title == 'Profile') {
                                                echo 'active';
                                            } ?>" href="#0">Hi, <?= $this->session->userdata('nama') ?></a>
                                <ul>
                                    <li><a class="<?php if ($title == 'Profile') {
                                                        echo 'active';
                                                    } ?>" href="<?= base_url('Pelanggan/profile'); ?>">Profile</a></li>
                                    <li><a href="<?= base_url('Pelanggan/logout'); ?>">Logout</a></li>
                                </ul>
                            <?php endif; ?>
                        </li>
                        <li>
                            <div class="search-start">
                                <i class="icofont-search-2"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- header section ending -->