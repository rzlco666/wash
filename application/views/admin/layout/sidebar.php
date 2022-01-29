        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- begin::navigation -->
            <div class="navigation">
                <div class="navigation-header">
                    <span>Navigation</span>
                    <a href="#">
                        <i class="ti-close"></i>
                    </a>
                </div>
                <div class="navigation-menu-body">
                    <ul>
                        <li>
                            <a <?php if ($title == 'Dashboard') {
                                    echo 'class="active"';
                                } ?> href="<?= base_url('Admin/'); ?>">
                                <span class="nav-link-icon">
                                    <i data-feather="pie-chart"></i>
                                </span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon">
                                    <i data-feather="briefcase"></i>
                                </span>
                                <span>Tempat Cuci</span>
                            </a>
                            <ul>
                                <li>
                                    <a <?php if ($title == 'Data Tempat Cuci') {
                                            echo 'class="active"';
                                        } ?> href="<?= base_url('Admin/tempat_cuci'); ?>">Data Tempat Cuci</a>
                                </li>
                                <li>
                                    <a <?php if ($title == 'Data Pemilik') {
                                            echo 'class="active"';
                                        } ?> href="<?= base_url('Admin/pemilik'); ?>">Data Pemilik</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a <?php if ($title == 'Data Transaksi') {
                                    echo 'class="active"';
                                } ?> href="<?= base_url('Admin/transaksi'); ?>">
                                <span class="nav-link-icon">
                                    <i data-feather="dollar-sign"></i>
                                </span>
                                <span>Data Transaksi</span>
                            </a>
                        </li>
                        <li>
                            <a <?php if ($title == 'Data Pelanggan') {
                                    echo 'class="active"';
                                } ?> href="<?= base_url('Admin/pelanggan'); ?>">
                                <span class="nav-link-icon">
                                    <i data-feather="users"></i>
                                </span>
                                <span>Data Pelanggan</span>
                            </a>
                        </li>
                        <li>
                            <a <?php if ($title == 'F.A.Q.') {
                                    echo 'class="active"';
                                } ?> href="<?= base_url('Admin/faq'); ?>">
                                <span class="nav-link-icon">
                                    <i data-feather="help-circle"></i>
                                </span>
                                <span>F.A.Q.</span>
                            </a>
                        </li>
                        <li>
                            <a <?php if ($title == 'Profile') {
                                    echo 'class="active"';
                                } ?> href="<?= base_url('Admin/profile'); ?>">
                                <span class="nav-link-icon">
                                    <i data-feather="user"></i>
                                </span>
                                <span>Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end::navigation -->