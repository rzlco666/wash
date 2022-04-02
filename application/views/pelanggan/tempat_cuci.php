<?php foreach ($tempat_cuci as $tempat_cuci) : ?>
    <!-- Page Header Section Start Here -->
    <section class="page-header style-2">
        <div class="container">
            <div class="page-title text-center">
                <h3><?= $tempat_cuci->nama; ?></h3>
                <ul class="breadcrumb">
                    <li><a href="<?= base_url('Pelanggan/'); ?>">Home</a></li>
                    <li><?= $tempat_cuci->nama; ?></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Page Header Section Ending Here -->


    <!-- Popular Home Chef Section Start Here -->
    <div class="shop-page single padding-tb pb-0">
        <div class="container">
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        <article>
                            <div class="shop-single">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 col-12">
                                        <div class="swiper-container gallery-top">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="shop-item">
                                                        <div class="shop-thumb">
                                                            <img style="height: 400px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto1/'); ?><?= $tempat_cuci->foto1; ?>" alt="shop-single">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="shop-item">
                                                        <div class="shop-thumb">
                                                            <img style="height: 400px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto2/'); ?><?= $tempat_cuci->foto2; ?>" alt="shop-single">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="shop-item">
                                                        <div class="shop-thumb">
                                                            <img style="height: 400px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto3/'); ?><?= $tempat_cuci->foto3; ?>" alt="shop-single">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="shop-item">
                                                        <div class="shop-thumb">
                                                            <img style="height: 400px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto3/'); ?><?= $tempat_cuci->foto3; ?>" alt="shop-single">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-container gallery-thumbs">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="shop-item">
                                                        <div class="shop-thumb">
                                                            <img style="height: 70px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto1/'); ?><?= $tempat_cuci->foto1; ?>" alt="shop-single">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="shop-item">
                                                        <div class="shop-thumb">
                                                            <img style="height: 70px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto2/'); ?><?= $tempat_cuci->foto2; ?>" alt="shop-single">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="shop-item">
                                                        <div class="shop-thumb">
                                                            <img style="height: 70px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto3/'); ?><?= $tempat_cuci->foto3; ?>" alt="shop-single">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="shop-item">
                                                        <div class="shop-thumb">
                                                            <img style="height: 70px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto3/'); ?><?= $tempat_cuci->foto3; ?>" alt="shop-single">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="shop-single-content">
                                            <div class="title">
                                                <h5><a href="#"><?= $tempat_cuci->nama; ?></a></h5>
                                                <div class="p-food-group">
                                                    <ul>
                                                        <li>
                                                            <i class="icofont-ui-user"></i>
                                                            <a href="#" class="admin">Owner : <?= $tempat_cuci->nama_pemilik; ?></a>
                                                        </li>
                                                        <li>
                                                            <i class="icofont-clock-time"></i>
                                                            <a href="#" class="date">Bergabung : <?= format_indo2($tempat_cuci->date_created); ?></a>
                                                        </li>
                                                        <li>
                                                            <i class="icofont-signal"></i>
                                                            <a href="#" class="skill">Status :
                                                                <?php
                                                                switch ($tempat_cuci->status) {
                                                                    case 0:
                                                                        echo "Nonaktif";
                                                                        break;
                                                                    case 1:
                                                                        echo "Aktif";
                                                                        break;
                                                                }
                                                                ?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="rating">
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <span>(2 Customer Reviews)</span>
                                                </div>
                                            </div>
                                            <div class="desc">
                                                <div class="quyality">
                                                    <p><span>Alamat</span> : <?= $tempat_cuci->alamat; ?></p>
                                                </div>
                                                <?php
                                                switch ($tempat_cuci->kategori) {
                                                    case 1:
                                                        echo "
                                                        <div class='quyality'>
                                                            <p><span>Harga Cuci Mobil</span> : " . rupiah($tempat_cuci->harga_mobil) . "</p>
                                                        </div>";
                                                        break;
                                                    case 2:
                                                        echo "
                                                        <div class='quyality'>
                                                            <p><span>Harga Cuci Motor</span> : " . rupiah($tempat_cuci->harga_motor) . "</p>
                                                        </div>";
                                                        break;
                                                    case 3:
                                                        echo "
                                                        <div class='quyality'>
                                                        <p><span>Harga Cuci Mobil</span> : " . rupiah($tempat_cuci->harga_mobil) . "</p>
                                                    </div>
                                                    <div class='quyality'>
                                                            <p><span>Harga Cuci Motor</span> : " . rupiah($tempat_cuci->harga_motor) . "</p>
                                                        </div>";
                                                        break;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-xl-4 col-md-5 col-12">
                        <aside>
                            <div class="popular-chef-widget">
                                <div class="food-quyality">
                                    <div class="section-header">
                                        <p><span>Pesan</span></p>
                                    </div>
                                    <?php
                                    if ($this->session->userdata('is_login') == FALSE) {
                                    ?>
                                        <div class="section-wrapper">
                                            <p>Sebelum melakukan pemesanan, silahkan login terlebih dahulu <a href="<?= base_url('Pelanggan/login'); ?>">disini</a>.</p>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <form id="payment-form" method="post" action="<?= site_url() ?>Pelanggan/finish">
                                            <input type="hidden" name="result_type" id="result-type" value="">
                                            <input type="hidden" name="result_data" id="result-data" value="">
                                            <div class="section-wrapper">
                                                <?php
                                                switch ($tempat_cuci->kategori) {
                                                    case 1:
                                                        echo "
                                                    <p><span>Harga Cuci Mobil</span> : <h5>" . rupiah($tempat_cuci->harga_mobil) . "</h5></p>";
                                                        break;
                                                    case 2:
                                                        echo "
                                                    <p><span>Harga Cuci Motor</span> : <h5>" . rupiah($tempat_cuci->harga_motor) . "</h5></p>";
                                                        break;
                                                    case 3:
                                                        echo "
                                                    <p><span>Harga Cuci Mobil</span> : <h5>" . rupiah($tempat_cuci->harga_mobil) . "</h5></p>
                                                    <p><span>Harga Cuci Motor</span> : <h5>" . rupiah($tempat_cuci->harga_motor) . "</h5></p>";
                                                        break;
                                                }
                                                ?>
                                                <p>Nama :</p>
                                                <label>
                                                    <input type="hidden" id="id_pelanggan" name="id_pelanggan" value="<?php echo $this->session->userdata('id') ?>">
                                                    <input type="hidden" id="harga_mobil" name="harga_mobil" value="<?= $tempat_cuci->harga_mobil; ?>">
                                                    <input type="hidden" id="harga_motor" name="harga_motor" value="<?= $tempat_cuci->harga_motor; ?>">

                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $this->session->userdata('nama') ?>">
                                                </label>

                                                <p>Alamat :</p>
                                                <label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                                </label>

                                                <p>Email :</p>
                                                <label>
                                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $this->session->userdata('email') ?>">
                                                </label>

                                                <p>No HP :</p>
                                                <label>
                                                    <input type="number" class="form-control" id="no_hp" name="no_hp">
                                                </label>

                                                <?php
                                                if ($tempat_cuci->kategori == 1) :
                                                ?>
                                                    <p>Kendaraan :</p>
                                                    <label>
                                                        <input type="hidden" id="id_tempat_cuci" name="id_tempat_cuci" value="<?= $tempat_cuci->id; ?>">
                                                        <input type="hidden" id="nama_tempat_cuci" name="nama_tempat_cuci" value="<?= $tempat_cuci->nama; ?>">
                                                        <select name="kendaraan" id="kendaraan" class="form-control">
                                                            <option selected disabled>Pilih Kendaraan</option>
                                                            <option value="1" name="kendaraan" id="kendaraan">Mobil</option>
                                                        </select>
                                                    </label>
                                                    <p>Tanggal :</p>
                                                    <label>
                                                        <input type="text" name="tanggal_pesan" class="tanggal_pesan form-control" id="datepicker">
                                                    </label>
                                                <?php
                                                elseif ($tempat_cuci->kategori == 2) :
                                                ?>
                                                    <p>Kendaraan :</p>
                                                    <label>
                                                        <input type="hidden" id="id_tempat_cuci" name="id_tempat_cuci" value="<?= $tempat_cuci->id; ?>">
                                                        <input type="hidden" id="nama_tempat_cuci" name="nama_tempat_cuci" value="<?= $tempat_cuci->nama; ?>">
                                                        <select name="kendaraan" id="kendaraan" class="form-control">
                                                            <option selected disabled>Pilih Kendaraan</option>
                                                            <option value="2" name="kendaraan" id="kendaraan">Motor</option>
                                                        </select>
                                                    </label>
                                                    <p>Tanggal :</p>
                                                    <label>
                                                        <input type="text" name="tanggal_pesan" class="tanggal_pesan form-control" id="datepicker">
                                                    </label>
                                                <?php
                                                elseif ($tempat_cuci->kategori == 3) :
                                                ?>
                                                    <p>Kendaraan :</p>
                                                    <label>
                                                        <input type="hidden" id="id_tempat_cuci" name="id_tempat_cuci" value="<?= $tempat_cuci->id; ?>">
                                                        <input type="hidden" id="nama_tempat_cuci" name="nama_tempat_cuci" value="<?= $tempat_cuci->nama; ?>">
                                                        <select name="kendaraan" class="form-control" id="kendaraan">
                                                            <option selected disabled>Pilih Kendaraan</option>
                                                            <option value="1" name="kendaraan" id="kendaraan">Mobil</option>
                                                            <option value="2" name="kendaraan" id="kendaraan">Motor</option>
                                                        </select>
                                                    </label>
                                                    <p>Tanggal :</p>
                                                    <label>
                                                        <input type="text" name="tanggal_pesan" class="tanggal_pesan form-control" id="datepicker">
                                                    </label>
                                                <?php
                                                endif;
                                                ?>
                                                <input type="submit" style="margin-top: 3vh;" id="pay-button" value="Pesan" class="food-btn style-2" />
                                            </div>
                                        </form>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Home Chef Section Ending Here -->

    <!-- Review Section Start Here -->
    <div class="review single padding-tb">
        <div class="container">
            <div class="section-wrapper">
                <div class="related">
                    <ul class="tab-bar">
                        <li class="tablinks" id="defaultOpen" onclick="openCity(event, 'one')">
                            <span>Deskripsi</span>
                        </li>
                        <li class="tablinks" onclick="openCity(event, 'two')">
                            <span>Maps</span>
                        </li>
                        <li class="tablinks" onclick="openCity(event, 'three')">
                            <span>Review</span>
                        </li>
                        <li class="tablinks" onclick="openCity(event, 'four')">
                            <span>Rekomendasi</span>
                        </li>
                    </ul>

                    <div id="one" class="tabcontent">
                        <div class="Description">
                            <?= $tempat_cuci->deskripsi; ?>
                        </div>
                    </div>

                    <div id="two" class="tabcontent">
                        <div class="Description">
                            <div class="title">
                                <h6>Maps <?= $tempat_cuci->nama; ?></h6>
                            </div>
                            <div class="gmaps-section">
                                <div class="map-area">
                                    <iframe src="<?= $tempat_cuci->maps; ?>" style="border:0" allowfullscreen></iframe>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="three" class="tabcontent">
                        <div class="section-wrapper">
                            <div class="review">
                                <ul class="content">
                                    <li>
                                        <div class="post-thumb">
                                            <img src="<?= base_url('assets_pelanggan/'); ?>images/chef/author/07.jpg" alt="shop">
                                        </div>
                                        <div class="post-content">
                                            <div class="content-area">
                                                <div class="entry-meta">
                                                    <div class="posted-on">
                                                        <a href="#">Britney Doe</a>
                                                        <p>Posted on December 25, 2017 at 6:57 am</p>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                    </div>
                                                </div>
                                                <div class="entry-content">
                                                    <p>Enthusiast build innovativ initiatives before lonterm high-impact awesome theme seo psd porta monetize covalent leadership after without resource.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="post-thumb">
                                            <img src="<?= base_url('assets_pelanggan/'); ?>images/chef/author/08.jpg" alt="shop">
                                        </div>
                                        <div class="post-content">
                                            <div class="entry-meta">
                                                <div class="posted-on">
                                                    <a href="#">Jonathan Doe</a>
                                                    <p>Posted on December 25, 2017 at 6:57 am</p>
                                                </div>
                                                <div class="rating">
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                </div>
                                            </div>
                                            <div class="entry-content">
                                                <p>Enthusiast build innovativ initiatives before lonterm high-impact awesome theme seo psd porta monetize covalent leadership after without resource.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="post-thumb">
                                            <img src="<?= base_url('assets_pelanggan/'); ?>images/chef/author/09.jpg" alt="shop">
                                        </div>
                                        <div class="post-content">
                                            <div class="entry-meta">
                                                <div class="posted-on">
                                                    <a href="#">Mack Zucky</a>
                                                    <p>Posted on December 25, 2017 at 6:57 am</p>
                                                </div>
                                                <div class="rating">
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                </div>
                                            </div>
                                            <div class="entry-content">
                                                <p>Enthusiast build innovativ initiatives before lonterm high-impact awesome theme seo psd porta monetize covalent leadership after without resource.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="post-thumb">
                                            <img src="<?= base_url('assets_pelanggan/'); ?>images/chef/author/08.jpg" alt="shop">
                                        </div>
                                        <div class="post-content">
                                            <div class="entry-meta">
                                                <div class="posted-on">
                                                    <a href="#">Jordi Albae</a>
                                                    <p>Posted on December 25, 2017 at 6:57 am</p>
                                                </div>
                                                <div class="rating">
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                </div>
                                            </div>
                                            <div class="entry-content">
                                                <p>Enthusiast build innovativ initiatives before lonterm high-impact awesome theme seo psd porta monetize covalent leadership after without resource.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="client-review">
                                    <div class="review-form">
                                        <div class="review-title">
                                            <h5>Add A Review</h5>
                                        </div>
                                        <form action="action" class="row">
                                            <div class="col-md-4 col-12">
                                                <input type="text" name="name" placeholder="Full Name">
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <input type="text" name="email" placeholder="Email Adress">
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="ratings">
                                                    <span class="rating-title">Your Rating : </span>
                                                    <div class="rating">
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                        <i class="icofont-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <textarea rows="8" placeholder="Type Here Message"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="food-btn style-2"><span>Submit Review</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="four" class="tabcontent">
                        <div class="popular-foods">
                            <div class="section-wrapper">
                                <div class="row justify-content-center align-items-center">
                                    <?php foreach ($rekomendasi as $rekomendasi) : ?>
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="p-food-item">
                                                <div class="p-food-inner">
                                                    <div class="p-food-thumb">
                                                        <a href="<?= base_url('Pelanggan/tempat/') . $rekomendasi->id; ?>">
                                                            <img style="width: 340px; height: 250px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto2/'); ?><?= $rekomendasi->foto2; ?>" alt="p-food">
                                                        </a>
                                                        <span><?= rupiah($rekomendasi->harga_motor); ?> - <?= rupiah2($rekomendasi->harga_mobil); ?></span>
                                                    </div>
                                                    <div class="p-food-content">
                                                        <div class="p-food-author">
                                                            <a href="<?= base_url('Pelanggan/tempat/') . $rekomendasi->id; ?>"><img style="width: 60px; height: 60px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto1/'); ?><?= $rekomendasi->foto1; ?>" alt="food-author"></a>
                                                        </div>
                                                        <h6><a href="<?= base_url('Pelanggan/tempat/') . $rekomendasi->id; ?>"><?= $rekomendasi->nama; ?></a></h6>
                                                        <div class="p-food-group">
                                                            <span><?= implode(' ', array_slice(explode(' ', $rekomendasi->deskripsi), 0, 5)); ?> ...</span>
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
                                                            <div class="right"><i class="icofont-home"></i><?= $rekomendasi->alamat; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Review Section Ending Here -->

<script type="text/javascript">
    $('#pay-button').click(function(event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        var id_pelanggan = $("#id_pelanggan").val();
        var nama = $("#nama").val();
        var alamat = $("#alamat").val();
        var email = $("#email").val();
        var no_hp = $("#no_hp").val();
        var id_tempat_cuci = $("#id_tempat_cuci").val();
        var nama_tempat_cuci = $("#nama_tempat_cuci").val();
        var harga_mobil = $("#harga_mobil").val();
        var harga_motor = $("#harga_motor").val();
        var kendaraan = $("#kendaraan").val();
        var tanggal_pesan = $(".tanggal_pesan").val();

        $.ajax({
            type: 'POST',
            url: '<?= site_url() ?>/Pelanggan/token',
            data: {
                id_pelanggan: id_pelanggan,
                nama: nama,
                alamat: alamat,
                email: email,
                no_hp: no_hp,
                id_tempat_cuci: id_tempat_cuci,
                nama_tempat_cuci: nama_tempat_cuci,
                harga_mobil: harga_mobil,
                harga_motor: harga_motor,
                kendaraan: kendaraan,
                tanggal_pesan: tanggal_pesan,
            },
            cache: false,

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>
