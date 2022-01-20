<!-- Blog Page Section Start Here -->
<?php foreach ($tempat_cuci as $tempat_cuci) : ?>
    <div class="blog-section blog-single recepi-single padding-tb bg-body">
        <div class="container">
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-12">
                        <article>
                            <div class="post-item">
                                <div class="post-inner">
                                    <div class="post-thumb">
                                        <div id="demo" class="carousel slide vert">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="sli-recepi-thumb">
                                                        <img style="height: 400px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto1/'); ?><?= $tempat_cuci->foto1; ?>" alt="shop-single">
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="sli-recepi-thumb">
                                                        <img style="height: 400px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto2/'); ?><?= $tempat_cuci->foto2; ?>" alt="shop-single">
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="sli-recepi-thumb">
                                                        <img style="height: 400px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto3/'); ?><?= $tempat_cuci->foto3; ?>" alt="shop-single">
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="sli-recepi-thumb">
                                                        <img style="height: 400px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto3/'); ?><?= $tempat_cuci->foto3; ?>" alt="shop-single">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-indicators">
                                                <div data-target="#demo" data-slide-to="0" class="item active">
                                                    <img style="height: 100px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto1/'); ?><?= $tempat_cuci->foto1; ?>" alt="shop-single">
                                                </div>
                                                <div data-target="#demo" data-slide-to="1" class="item">
                                                    <img style="height: 100px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto2/'); ?><?= $tempat_cuci->foto2; ?>" alt="shop-single">
                                                </div>
                                                <div data-target="#demo" data-slide-to="2" class="item">
                                                    <img style="height: 100px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto3/'); ?><?= $tempat_cuci->foto3; ?>" alt="shop-single">
                                                </div>
                                                <div data-target="#demo" data-slide-to="3" class="item">
                                                    <img style="height: 100px;object-fit: cover;" src="<?= base_url('uploads/tempat_cuci/foto3/'); ?><?= $tempat_cuci->foto3; ?>" alt="shop-single">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <div class="meta-tag">
                                            <div class="categori">
                                                <a href="#">
                                                    <?php
                                                    switch ($tempat_cuci->kategori) {
                                                        case 1:
                                                            echo "Mobil";
                                                            break;
                                                        case 2:
                                                            echo "Motor";
                                                            break;
                                                        case 3:
                                                            echo "Mobil dan Motor";
                                                            break;
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="rating">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(5.5)</span>
                                            </div>
                                        </div>
                                        <h4><?= $tempat_cuci->nama; ?></h4>
                                        <div class="meta-post">
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
                                        <p>
                                            <?= $tempat_cuci->deskripsi; ?>
                                        </p>
                                        <div class="make-product">
                                            <div class="left">
                                                <div class="title">
                                                    <h6>Kontak</h6>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <span class="left">
                                                            <i class="icofont-double-right"></i>Telp :
                                                        </span>
                                                        <span class="right"><?= $tempat_cuci->hp; ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="left">
                                                            <i class="icofont-double-right"></i>Email :
                                                        </span>
                                                        <span class="right"><?= $tempat_cuci->email; ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="right">
                                                <div class="title">
                                                    <h6>Harga</h6>
                                                </div>
                                                <ul>
                                                    <?php
                                                    switch ($tempat_cuci->kategori) {
                                                        case 1:
                                                            echo "<li>
                                                            <span class='left'>
                                                                <i class='icofont-double-right'></i>Mobil
                                                            </span>
                                                            <span class='right'>" . rupiah($tempat_cuci->harga_mobil) . "</span>
                                                        </li>";
                                                            break;
                                                        case 2:
                                                            echo "<li>
                                                            <span class='left'>
                                                                <i class='icofont-double-right'></i>Motor
                                                            </span>
                                                            <span class='right'>" . rupiah($tempat_cuci->harga_motor) . "</span>
                                                        </li>";
                                                            break;
                                                        case 3:
                                                            echo "
                                                            <li>
                                                            <span class='left'>
                                                                <i class='icofont-double-right'></i>Mobil
                                                            </span>
                                                            <span class='right'>" . rupiah($tempat_cuci->harga_mobil) . "</span>
                                                        </li>
                                                            <li>
                                                            <span class='left'>
                                                                <i class='icofont-double-right'></i>Motor
                                                            </span>
                                                            <span class='right'>" . rupiah($tempat_cuci->harga_motor) . "</span>
                                                        </li>";
                                                            break;
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="scan-area">
                                            <div class="title">
                                                <h6>Alamat <?= $tempat_cuci->nama; ?></h6>
                                            </div>
                                            <div class="scrn-thumb">
                                                <?= $tempat_cuci->alamat; ?>
                                            </div>
                                        </div>
                                        <div class="scan-area">
                                            <div class="title">
                                                <h6>Maps <?= $tempat_cuci->nama; ?></h6>
                                            </div>
                                            <div class="scrn-thumb">
                                                <div class="mapouter">
                                                    <div class="gmap_canvas"><iframe id="gmap_canvas" src="<?= $tempat_cuci->maps; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                                        <style>
                                                            .mapouter {
                                                                position: relative;
                                                                text-align: right;
                                                            }
                                                        </style>
                                                        <style>
                                                            .gmap_canvas {
                                                                overflow: hidden;
                                                                background: none !important;
                                                            }
                                                        </style>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product">
                                <h4 class="title-border">Related Recipes</h4>
                                <div class="section-wrapper">
                                    <div class="row no-gutters">
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="product-item">
                                                <div class="product-thumb">
                                                    <img src="<?= base_url('assets_pelanggan/'); ?>images/food-recipe/01.jpg" alt="food-product">
                                                </div>
                                                <div class="product-content">
                                                    <h6><a href="#">How To Cooking Roast Beef</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="product-item">
                                                <div class="product-thumb">
                                                    <img src="<?= base_url('assets_pelanggan/'); ?>images/food-recipe/02.jpg" alt="food-product">
                                                </div>
                                                <div class="product-content">
                                                    <h6><a href="#">How To Cooking Roast Beef</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="product-item">
                                                <div class="product-thumb">
                                                    <img src="<?= base_url('assets_pelanggan/'); ?>images/food-recipe/03.jpg" alt="food-product">
                                                </div>
                                                <div class="product-content">
                                                    <h6><a href="#">How To Cooking Roast Beef</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="product-item">
                                                <div class="product-thumb">
                                                    <img src="<?= base_url('assets_pelanggan/'); ?>images/food-recipe/02.jpg" alt="food-product">
                                                </div>
                                                <div class="product-content">
                                                    <h6><a href="#">How To Cooking Roast Beef</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="comments" class="comments">
                                <h4 class="title-border">02 Comments</h4>
                                <ul class="comment-list">
                                    <li class="comment" id="li-comment-1">
                                        <div class="com-thumb">
                                            <img alt="" src="<?= base_url('assets_pelanggan/'); ?>images/chef/author/07.jpg" srcset="<?= base_url('assets_pelanggan/'); ?>images/chef/author/07.jpg" class="avatar avatar-90 photo" height="90" width="90">
                                        </div>
                                        <div class="com-content">
                                            <div class="com-title">
                                                <div class="com-title-meta">
                                                    <h6><a href="http://Sk" rel="external nofollow" class="url">Linsa Faith</a></h6>
                                                    <span> October 5, 2018 at 12:41 pm </span>
                                                </div>
                                                <span class="reply">
                                                    <a rel="nofollow" class="comment-reply-link" href="#" aria-label="Reply to Masum"><i class="icofont-reply-all"></i>Reply</a>
                                                </span>
                                            </div>
                                            <p>The inner sanctuary, I throw myself down among the tall grass bye the trckli stream and, as I lie close to the earth</p>
                                            <div class="reply-btn"></div>
                                        </div>
                                        <ul class="comment-list">
                                            <li class="comment" id="li-comment-2">
                                                <div class="com-thumb">
                                                    <img alt="" src="<?= base_url('assets_pelanggan/'); ?>images/chef/author/08.jpg" srcset="<?= base_url('assets_pelanggan/'); ?>images/chef/author/08.jpg" class="avatar avatar-90 photo" height="90" width="90">
                                                </div>
                                                <div class="com-content">
                                                    <div class="com-title">
                                                        <div class="com-title-meta">
                                                            <h6><a href="http://Sk" rel="external nofollow" class="url">James Jusse</a></h6>
                                                            <span> October 5, 2018 at 12:41 pm </span>
                                                        </div>
                                                        <span class="reply">
                                                            <a rel="nofollow" class="comment-reply-link" href="#" aria-label="Reply to Masum"><i class="icofont-reply-all"></i>Reply</a>
                                                        </span>
                                                    </div>
                                                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings spring which I enjoy with my whole heart</p>
                                                    <div class="reply-btn"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="comment-respond">
                                <h4 class="title-border">Leave a Comment</h4>
                                <div class="add-comment">
                                    <form action="/" class="comment-form">
                                        <input name="name" type="text" placeholder="Name">
                                        <input name="email" type="text" placeholder="Email">
                                        <input name="url" type="text" placeholder="Subject">
                                        <textarea id="comment-reply" name="comment" rows="5" placeholder="Type Here Your Comment"></textarea>
                                        <p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"><label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label></p>
                                        <button type="submit" class="food-btn"><span>send comment</span></button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-7 col-12">
                        <aside>
                            <div class="widget widget-author">
                                <div class="widget-header">
                                    <h5>Meet Admin</h5>
                                </div>
                                <div class="widget-wrapper">
                                    <div class="admin-thumb">
                                        <img src="<?= base_url('assets_pelanggan/'); ?>images/chef/author/08.jpg" alt="author">
                                    </div>
                                    <div class="admin-content">
                                        <p>Hey hey! I'm Lindsay and this is my websiteThanks for being here! I'm a yoga instructor I write about all of those...</p>
                                        <div class="scocial-media">
                                            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                                            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                                            <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                                            <a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget recipe-categori">
                                <div class="widget-header">
                                    <h5>Popular Categories</h5>
                                </div>
                                <div class="widget-wrapper section-wrapper">
                                    <div class="row justify-content-center no-gutters">
                                        <div class="col-6">
                                            <div class="recipe-item">
                                                <div class="recipe-thumb">
                                                    <img src="<?= base_url('assets_pelanggan/'); ?>images/food-recipe/01.png" alt="food-recipe">
                                                </div>
                                                <div class="recipe-content">
                                                    <a href="#">Chicken</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="recipe-item">
                                                <div class="recipe-thumb">
                                                    <img src="<?= base_url('assets_pelanggan/'); ?>images/food-recipe/02.png" alt="food-recipe">
                                                </div>
                                                <div class="recipe-content">
                                                    <a href="#">Fast Food</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="recipe-item">
                                                <div class="recipe-thumb">
                                                    <img src="<?= base_url('assets_pelanggan/'); ?>images/food-recipe/03.png" alt="food-recipe">
                                                </div>
                                                <div class="recipe-content">
                                                    <a href="#">sea Fish</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="recipe-item">
                                                <div class="recipe-thumb">
                                                    <img src="<?= base_url('assets_pelanggan/'); ?>images/food-recipe/04.png" alt="food-recipe">
                                                </div>
                                                <div class="recipe-content">
                                                    <a href="#">Hot Pizza</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="recipe-item">
                                                <div class="recipe-thumb">
                                                    <img src="<?= base_url('assets_pelanggan/'); ?>images/food-recipe/05.png" alt="food-recipe">
                                                </div>
                                                <div class="recipe-content">
                                                    <a href="#">Salads</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="recipe-item">
                                                <div class="recipe-thumb">
                                                    <img src="<?= base_url('assets_pelanggan/'); ?>images/food-recipe/06.png" alt="food-recipe">
                                                </div>
                                                <div class="recipe-content">
                                                    <a href="#">soft drink</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="recipe-item">
                                                <div class="recipe-thumb">
                                                    <img src="<?= base_url('assets_pelanggan/'); ?>images/food-recipe/07.png" alt="food-recipe">
                                                </div>
                                                <div class="recipe-content">
                                                    <a href="#">lunch</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="recipe-item">
                                                <div class="recipe-thumb">
                                                    <img src="<?= base_url('assets_pelanggan/'); ?>images/food-recipe/08.png" alt="food-recipe">
                                                </div>
                                                <div class="recipe-content">
                                                    <a href="#">dinner</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget widget-post">
                                <div class="widget-header">
                                    <h5>smith archives</h5>
                                </div>
                                <ul class="widget-wrapper">
                                    <li class="d-flex flex-wrap justify-content-between">
                                        <div class="post-thumb">
                                            <a href="#"><img src="<?= base_url('assets_pelanggan/'); ?>images/popular-food/01.jpg" alt="product"></a>
                                        </div>
                                        <div class="post-content">
                                            <h6><a href="#">Foulate Revunry And Mhare Fnger Tache Fanny</a></h6>
                                            <p>04 February 2019</p>
                                        </div>
                                    </li>
                                    <li class="d-flex flex-wrap justify-content-between">
                                        <div class="post-thumb">
                                            <a href="#"><img src="<?= base_url('assets_pelanggan/'); ?>images/popular-food/02.jpg" alt="product"></a>
                                        </div>
                                        <div class="post-content">
                                            <h6><a href="#">Foulate Revunry And Mhare Fnger Tache Fanny</a></h6>
                                            <p>04 February 2019</p>
                                        </div>
                                    </li>
                                    <li class="d-flex flex-wrap justify-content-between">
                                        <div class="post-thumb">
                                            <a href="#"><img src="<?= base_url('assets_pelanggan/'); ?>images/popular-food/03.jpg" alt="product"></a>
                                        </div>
                                        <div class="post-content">
                                            <h6><a href="#">Foulate Revunry And Mhare Fnger Tache Fanny</a></h6>
                                            <p>04 February 2019</p>
                                        </div>
                                    </li>
                                    <li class="d-flex flex-wrap justify-content-between">
                                        <div class="post-thumb">
                                            <a href="#"><img src="<?= base_url('assets_pelanggan/'); ?>images/popular-food/04.jpg" alt="product"></a>
                                        </div>
                                        <div class="post-content">
                                            <h6><a href="#">Foulate Revunry And Mhare Fnger Tache Fanny</a></h6>
                                            <p>04 February 2019</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="widget widget-instagram">
                                <div class="widget-header">
                                    <h5>smith instagram</h5>
                                </div>
                                <ul class="widget-wrapper d-flex flex-wrap justify-content-center">
                                    <li><a href="#"><img src="<?= base_url('assets_pelanggan/'); ?>images/popular-food/01.jpg" alt="product"></a></li>
                                    <li><a href="#"><img src="<?= base_url('assets_pelanggan/'); ?>images/popular-food/02.jpg" alt="product"></a></li>
                                    <li><a href="#"><img src="<?= base_url('assets_pelanggan/'); ?>images/popular-food/03.jpg" alt="product"></a></li>
                                    <li><a href="#"><img src="<?= base_url('assets_pelanggan/'); ?>images/popular-food/04.jpg" alt="product"></a></li>
                                    <li><a href="#"><img src="<?= base_url('assets_pelanggan/'); ?>images/popular-food/05.jpg" alt="product"></a></li>
                                    <li><a href="#"><img src="<?= base_url('assets_pelanggan/'); ?>images/popular-food/06.jpg" alt="product"></a></li>
                                    <li><a href="#"><img src="<?= base_url('assets_pelanggan/'); ?>images/popular-food/07.jpg" alt="product"></a></li>
                                    <li><a href="#"><img src="<?= base_url('assets_pelanggan/'); ?>images/popular-food/08.jpg" alt="product"></a></li>
                                    <li><a href="#"><img src="<?= base_url('assets_pelanggan/'); ?>images/popular-food/09.jpg" alt="product"></a></li>
                                </ul>
                            </div>

                            <div class="widget widget-tags">
                                <div class="widget-header">
                                    <h5>top tags</h5>
                                </div>
                                <ul class="widget-wrapper d-flex flex-wrap justify-content-xl-between">
                                    <li><a href="#">envato</a></li>
                                    <li><a href="#" class="active">themeforest</a></li>
                                    <li><a href="#">codecanyon</a></li>
                                    <li><a href="#">videohive</a></li>
                                    <li><a href="#">audiojungle</a></li>
                                    <li><a href="#">3docean</a></li>
                                    <li><a href="#">envato</a></li>
                                    <li><a href="#">themeforest</a></li>
                                    <li><a href="#">codecanyon</a></li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Blog Page Section Ending Here -->