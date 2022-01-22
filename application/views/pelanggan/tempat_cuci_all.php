    <!-- Page Header Section Start Here -->
    <section class="page-header style-2">
        <div class="container">
            <div class="page-title text-center">
                <h3>Tempat Cuci</h3>
                <ul class="breadcrumb">
                    <li><a href="<?= base_url('Pelanggan/'); ?>">Home</a></li>
                    <li>Tempat Cuci</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Page Header Section Ending Here -->

    <!-- Popular Food Section Start Here -->
    <section class="popular-foods padding-tb style-2">
        <div class="container">
            <div class="section-wrapper">
                <div class="row">
                    <?php foreach ($tempat_cuci as $tempat_cuci) : ?>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="p-food-item">
                                <div class="p-food-inner">
                                    <div class="p-food-thumb">
                                        <a href="<?= base_url('Pelanggan/tempat/') . $tempat_cuci->id; ?>"><img style="width: 340px; height: 250px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto2/'); ?><?= $tempat_cuci->foto2; ?>" alt="p-food"></a>
                                        <span><?= rupiah($tempat_cuci->harga_motor); ?> - <?= rupiah2($tempat_cuci->harga_mobil); ?></span>
                                    </div>
                                    <div class="p-food-content">
                                        <div class="p-food-author">
                                            <a href="<?= base_url('Pelanggan/tempat/') . $tempat_cuci->id; ?>"><img style="width: 60px; height: 60px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto1/'); ?><?= $tempat_cuci->foto1; ?>" alt="food-author"></a>
                                        </div>
                                        <h6><a href="<?= base_url('Pelanggan/tempat/') . $tempat_cuci->id; ?>"><?= $tempat_cuci->nama; ?></a></h6>
                                        <div class="p-food-group">
                                            <span><?= implode(' ', array_slice(explode(' ', $tempat_cuci->deskripsi), 0, 5)); ?> ...</span>
                                        </div>
                                        <ul class="del-time">
                                            <li>
                                                <i class="icofont-cycling-alt"></i>
                                                <div class="time-tooltip">
                                                    <div class="time-tooltip-holder">
                                                        <span class="tooltip-label">Delivery time</span>
                                                        <span class="tooltip-info">Your order will be delivered in 20 minutes.</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <i class="icofont-stopwatch"></i>
                                                <div class="time-tooltip">
                                                    <div class="time-tooltip-holder">
                                                        <span class="tooltip-label">Pickup time</span>
                                                        <span class="tooltip-info">You can pickup order in 20 minutes.</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="p-food-footer">
                                            <div class="left">
                                                <div class="rating">
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                </div>
                                            </div>
                                            <div class="right"><i class="icofont-home"></i><?= $tempat_cuci->alamat; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular Food Section Ending Here -->