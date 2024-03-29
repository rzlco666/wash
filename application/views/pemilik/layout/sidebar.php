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
                                } ?> href="<?= base_url('Pemilik/'); ?>">
                                <span class="nav-link-icon">
                                    <i data-feather="pie-chart"></i>
                                </span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a <?php if ($title == 'Tempat Cuci') {
                                echo 'class="active"';
                            } ?> href="<?= base_url('Pemilik/tempat_cuci'); ?>">
                                <span class="nav-link-icon">
                                    <i data-feather="briefcase"></i>
                                </span>
                                <span>Data Tempat Cuci</span>
                            </a>
                        </li>
						<li>
							<a href="#">
                                <span class="nav-link-icon">
                                    <i data-feather="dollar-sign"></i>
                                </span>
								<span>Data Transaksi</span>
							</a>
							<ul>
								<li>
									<a <?php if ($title == 'Data Transaksi Aktif') {
										echo 'class="active"';
									} ?> href="<?= base_url('Pemilik/transaksi_aktif'); ?>">Transaksi Aktif</a>
								</li>
								<li>
									<a <?php if ($title == 'Data Transaksi') {
										echo 'class="active"';
									} ?> href="<?= base_url('Pemilik/transaksi'); ?>">Histori Transaksi</a>
								</li>
							</ul>
						</li>
						<li>
							<a <?php if ($title == 'Data Rating') {
								echo 'class="active"';
							} ?> href="<?= base_url('Pemilik/rating'); ?>">
                                <span class="nav-link-icon">
                                    <i data-feather="coffee"></i>
                                </span>
								<span>Rating</span>
							</a>
						</li>
                        <li>
                            <a <?php if ($title == 'Profile') {
                                    echo 'class="active"';
                                } ?> href="<?= base_url('Pemilik/profile'); ?>">
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
