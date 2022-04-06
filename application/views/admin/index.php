            <!-- Content body -->
            <div class="content-body">
                <!-- Content -->
                <div class="content ">
                    <div class="page-header d-md-flex justify-content-between">
						<?php foreach ($admin as $admin) : ?>
                        <div>
                            <h3>Selamat datang, <?= $admin->nama; ?></h3>
                            <p class="text-muted">Halaman ini menunjukkan ikhtisar untuk ringkasan akun Anda.</p>
                        </div>
						<?php endforeach; ?>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="card-title mb-2">Pendapatan bulanan</h6>
                                        <div class="d-flex justify-content-between">
                                            <a href="#" class="btn btn-floating">
                                                <i class="ti-reload"></i>
                                            </a>
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti-more-alt"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted mb-4">Periksa bagaimana kinerja keuangan Anda untuk bulan ini</p>
                                    <div id="saless"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="card-title mb-2">Report</h6>
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                                <i class="ti-more-alt"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="list-group list-group-flush">
                                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                <div>
                                                    <h5>Stats</h5>
                                                    <div>Last month targets</div>
                                                </div>
                                                <h3 class="text-success mb-0">$1,23M</h3>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                <div>
                                                    <h5>Payments</h5>
                                                    <div>Week's expenses</div>
                                                </div>
                                                <div>
                                                    <h3 class="text-danger mb-0">- $58,90</h3>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                <div>
                                                    <h5>Orders</h5>
                                                    <div>Total products ordered</div>
                                                </div>
                                                <div>
                                                    <h3 class="text-info mb-0">65</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="card-title mb-2">Statistics</h6>
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                                <i class="ti-more-alt"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="list-group list-group-flush">
                                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                <div>
                                                    <h5>Reports</h5>
                                                    <div>Monthly sales reports</div>
                                                </div>
                                                <h3 class="text-primary mb-0">421</h3>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                <div>
                                                    <h5>User</h5>
                                                    <div>Visitors last week</div>
                                                </div>
                                                <div>
                                                    <h3 class="text-success mb-0">+10</h3>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                <div>
                                                    <h5>Sales</h5>
                                                    <div>Total average weekly report</div>
                                                </div>
                                                <div>
                                                    <h3 class="text-primary mb-0">140</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h6 class="card-title mb-2 text-center">Total Saldo</h6>
                                    <p class="mb-0 text-muted">Total pendapatan transaksi lunas dan telah selesai dicuci</p>
                                    <hr>
									<?php
									foreach ($saldo_total as $saldo) {
									?>
                                    <div class="font-size-40 font-weight-bold">Rp. <?= number_format($saldo->saldo, 0, ',', '.') ?></div>
                                    <?php } ?>
									<hr>
                                    <p class="font-weight-bold">Pencucian Bulanan</p>
                                    <div id="ecommerce-activity-chartt"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="card-title">Reviews</h6>
                                        <a href="#" class="link-1">View All</a>
                                    </div>
                                    <div class="card-scroll" style="height: 430px">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex px-0 py-4">
                                                <a href="#" class="flex-shrink-0">
                                                    <figure class="avatar mr-3">
                                                        <img src="<?= base_url('assets_admin/'); ?>media/image/user/man_avatar1.jpg" class="rounded-circle" alt="image">
                                                    </figure>
                                                </a>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between">
                                                        <a href="#">
                                                            <h6>Valentine Maton</h6>
                                                            <ul class="list-inline mb-1">
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">(5)</li>
                                                            </ul>
                                                        </a>
                                                        <div class="ml-auto">
                                                            <div class="dropdown">
                                                                <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="ti-more-alt"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item">View</a>
                                                                    <a href="#" class="dropdown-item">Send Message</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit. Odio,
                                                        tempora.</p>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex px-0 py-4">
                                                <a href="#" class="flex-shrink-0">
                                                    <figure class="avatar mr-3">
                                                        <img src="<?= base_url('assets_admin/'); ?>media/image/user/man_avatar2.jpg" class="rounded-circle" alt="image">
                                                    </figure>
                                                </a>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between">
                                                        <a href="#">
                                                            <h6>Valentine Maton</h6>
                                                            <ul class="list-inline mb-1">
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star-half-o text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star-o"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">(3.5)</li>
                                                            </ul>
                                                        </a>
                                                        <div class="ml-auto">
                                                            <div class="dropdown">
                                                                <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="ti-more-alt"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item">View</a>
                                                                    <a href="#" class="dropdown-item">Send Message</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit. Odio,
                                                        tempora.</p>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex px-0 py-4">
                                                <a href="#" class="flex-shrink-0">
                                                    <figure class="avatar mr-3">
                                                        <img src="<?= base_url('assets_admin/'); ?>media/image/user/man_avatar3.jpg" class="rounded-circle" alt="image">
                                                    </figure>
                                                </a>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between">
                                                        <a href="#">
                                                            <h6>Valentine Maton</h6>
                                                            <ul class="list-inline mb-1">
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star-half-o text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">(4.5)</li>
                                                            </ul>
                                                        </a>
                                                        <div class="ml-auto">
                                                            <div class="dropdown">
                                                                <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="ti-more-alt"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item">View</a>
                                                                    <a href="#" class="dropdown-item">Send Message</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit. Odio,
                                                        tempora.</p>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex px-0 py-4">
                                                <a href="#" class="flex-shrink-0">
                                                    <figure class="avatar mr-3">
                                                        <img src="<?= base_url('assets_admin/'); ?>media/image/user/man_avatar4.jpg" class="rounded-circle" alt="image">
                                                    </figure>
                                                </a>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between">
                                                        <a href="#">
                                                            <h6>Valentine Maton</h6>
                                                            <ul class="list-inline mb-1">
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">
                                                                    <i class="fa fa-star-o"></i>
                                                                </li>
                                                                <li class="list-inline-item mb-0">(4)</li>
                                                            </ul>
                                                        </a>
                                                        <div class="ml-auto">
                                                            <div class="dropdown">
                                                                <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="ti-more-alt"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item">View</a>
                                                                    <a href="#" class="dropdown-item">Send Message</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit. Odio,
                                                        tempora.</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 class="card-title mb-4 text-center">Total sales this month</h6>
                                        <h2 class="font-size-35 font-weight-bold text-center">$1.158,000</h2>
                                        <p>This chart shows total sales. You can use the button below for details of
                                            this
                                            month's sales.</p>
                                        <div class="mt-4">
                                            <a href="#" class="btn btn-primary">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-info-bright">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h6 class="card-title mb-4 text-center">Total sales in the past week</h6>
                                        <h2 class="font-size-35 font-weight-bold text-center">$950,000</h2>
                                        <p>This chart shows total sales. You can use the button below for details of
                                            this
                                            month's sales.</p>
                                        <div class="mt-4">
                                            <a href="#" class="btn btn-primary">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-4">
                                        <div>
                                            <h6 class="card-title mb-1">Monthly Sales</h6>
                                            <p class="small text-muted">Avarage total sales +25,5%</p>
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-floating">
                                                <i class="fa fa-refresh"></i>
                                            </a>
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti-more-alt"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="monthly-sales"></div>
                                    <ul class="list-inline text-center">
                                        <li class="list-inline-item">
                                            <i class="fa fa-circle mr-1 text-success"></i> Bank Card <br>
                                            <small class="text-muted">25,45% over</small>
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="fa fa-circle mr-1 text-primary"></i> Credit Card <br>
                                            <small class="text-muted">75,55% over</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Recent Orders</h6>
                            <div class="table-responsive">
                                <table id="recent-orders" class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Customer</th>
                                            <th>Total Price</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="product-detail.html" class="d-flex align-items-center">
                                                    <img width="40" src="<?= base_url('assets_admin/'); ?>media/image/products/product1.png" class="rounded mr-3" alt="Vase">
                                                    <span>Vase</span>
                                                </a>
                                            </td>
                                            <td>Dollie Bullock</td>
                                            <td>$230</td>
                                            <td>
                                                <span class="badge bg-secondary-bright text-secondary">On pre-order (not
                                                    paid)</span>
                                            </td>
                                            <td>2020/02/28</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-more-alt"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">View Detail</a>
                                                        <a href="#" class="dropdown-item">Send</a>
                                                        <a href="#" class="dropdown-item">Edit</a>
                                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="product-detail.html" class="d-flex align-items-center">
                                                    <img width="40" src="<?= base_url('assets_admin/'); ?>media/image/products/product2.png" class="rounded mr-3" alt="Glasses">
                                                    <span>Glasses</span>
                                                </a>
                                            </td>
                                            <td>Holmes Hines</td>
                                            <td>$300</td>
                                            <td>
                                                <span class="badge bg-success-bright text-success">Payment
                                                    accepted</span>
                                            </td>
                                            <td>2020/08/28</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-more-alt"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">View Detail</a>
                                                        <a href="#" class="dropdown-item">Send</a>
                                                        <a href="#" class="dropdown-item">Edit</a>
                                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="product-detail.html" class="d-flex align-items-center">
                                                    <img width="40" src="<?= base_url('assets_admin/'); ?>media/image/products/product3.png" class="rounded mr-3" alt="Plate">
                                                    <span>Plate</span>
                                                </a>
                                            </td>
                                            <td>Serena Glover</td>
                                            <td>$250</td>
                                            <td>
                                                <span class="badge bg-danger-bright text-danger">Payment error</span>
                                            </td>
                                            <td>2020/08/28</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-more-alt"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">View Detail</a>
                                                        <a href="#" class="dropdown-item">Send</a>
                                                        <a href="#" class="dropdown-item">Edit</a>
                                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="product-detail.html" class="d-flex align-items-center">
                                                    <img width="40" src="<?= base_url('assets_admin/'); ?>media/image/products/product4.png" class="rounded mr-3" alt="Pen">
                                                    <span>Pen</span>
                                                </a>
                                            </td>
                                            <td>Dianne Prince</td>
                                            <td>$550</td>
                                            <td>
                                                <span class="badge bg-success-bright text-success">Payment
                                                    accepted</span>
                                            </td>
                                            <td>2020/08/28</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-more-alt"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">View Detail</a>
                                                        <a href="#" class="dropdown-item">Send</a>
                                                        <a href="#" class="dropdown-item">Edit</a>
                                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="product-detail.html" class="d-flex align-items-center">
                                                    <img width="40" src="<?= base_url('assets_admin/'); ?>media/image/products/product5.png" class="rounded mr-3" alt="Armchair">
                                                    <span>Armchair</span>
                                                </a>
                                            </td>
                                            <td>Morgan Pitts</td>
                                            <td>$280</td>
                                            <td>
                                                <span class="badge bg-warning-bright text-warning">Preparing the
                                                    order</span>
                                            </td>
                                            <td>2020/03/30</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-more-alt"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">View Detail</a>
                                                        <a href="#" class="dropdown-item">Send</a>
                                                        <a href="#" class="dropdown-item">Edit</a>
                                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="product-detail.html" class="d-flex align-items-center">
                                                    <img width="40" src="<?= base_url('assets_admin/'); ?>media/image/products/product6.png" class="rounded mr-3" alt="Flowerpot">
                                                    <span>Flowerpot</span>
                                                </a>
                                            </td>
                                            <td>Merrill Richardson</td>
                                            <td>$128</td>
                                            <td>
                                                <span class="badge bg-info-bright text-info">Awaiting PayPal
                                                    payment</span>
                                            </td>
                                            <td>2020/01/14</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-more-alt"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">View Detail</a>
                                                        <a href="#" class="dropdown-item">Send</a>
                                                        <a href="#" class="dropdown-item">Edit</a>
                                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="product-detail.html" class="d-flex align-items-center">
                                                    <img width="40" src="<?= base_url('assets_admin/'); ?>media/image/products/product7.png" class="rounded mr-3" alt="Wall Clock">
                                                    <span>Wall Clock</span>
                                                </a>
                                            </td>
                                            <td>Krista Mathis</td>
                                            <td>$500</td>
                                            <td>
                                                <span class="badge bg-secondary-bright text-secondary">Shipped</span>
                                            </td>
                                            <td>2020/02/28</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-more-alt"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">View Detail</a>
                                                        <a href="#" class="dropdown-item">Send</a>
                                                        <a href="#" class="dropdown-item">Edit</a>
                                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="product-detail.html" class="d-flex align-items-center">
                                                    <img width="40" src="<?= base_url('assets_admin/'); ?>media/image/products/product8.png" class="rounded mr-3" alt="Desk">
                                                    <span>Desk</span>
                                                </a>
                                            </td>
                                            <td>Frankie Hewitt</td>
                                            <td>$300</td>
                                            <td>
                                                <span class="badge bg-success-bright text-success">Remote payment
                                                    accepted</span>
                                            </td>
                                            <td>2020/02/09</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-more-alt"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">View Detail</a>
                                                        <a href="#" class="dropdown-item">Send</a>
                                                        <a href="#" class="dropdown-item">Edit</a>
                                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="product-detail.html" class="d-flex align-items-center">
                                                    <img width="40" src="<?= base_url('assets_admin/'); ?>media/image/products/product9.png" class="rounded mr-3" alt="Night Light">
                                                    <span>Night Light</span>
                                                </a>
                                            </td>
                                            <td>Hayden Fitzgerald</td>
                                            <td>$200</td>
                                            <td>
                                                <span class="badge bg-success-bright text-success">Delivered</span>
                                            </td>
                                            <td>2020/01/14</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-more-alt"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">View Detail</a>
                                                        <a href="#" class="dropdown-item">Send</a>
                                                        <a href="#" class="dropdown-item">Edit</a>
                                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="product-detail.html" class="d-flex align-items-center">
                                                    <img width="40" src="<?= base_url('assets_admin/'); ?>media/image/products/product10.png" class="rounded mr-3" alt="Shoe">
                                                    <span>Shoe</span>
                                                </a>
                                            </td>
                                            <td>Cole Holcomb</td>
                                            <td>$700</td>
                                            <td>
                                                <span class="badge bg-secondary-bright text-secondary">On pre-order (not
                                                    paid)</span>
                                            </td>
                                            <td>2020/02/28</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-more-alt"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">View Detail</a>
                                                        <a href="#" class="dropdown-item">Send</a>
                                                        <a href="#" class="dropdown-item">Edit</a>
                                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->

                </div>
                <!-- ./ Content -->
