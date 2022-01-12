<style>
    .myaccordion {
        margin: 50px auto;
        box-shadow: 0 0 1px rgba(0, 0, 0, 0.1);
    }

    .myaccordion .card,
    .myaccordion .card:last-child .card-header {
        border: none;
    }

    .myaccordion .card-header {
        border-bottom-color: #EDEFF0;
        background: transparent;
    }

    .myaccordion .fa-stack {
        font-size: 18px;
    }

    .myaccordion .btn {
        width: 100%;
        font-weight: bold;
        color: #fb524f;
        padding: 0;
    }

    .myaccordion .btn-link:hover,
    .myaccordion .btn-link:focus {
        text-decoration: none;
    }

    .myaccordion li+li {
        margin-top: 10px;
    }
</style>

<!-- Food Product Section Style 2 Start here -->
<section class="product style-2 padding-tb" style="background-image: url(<?= base_url('assets_pelanggan/'); ?>css/bg-image/product-2.jpg);">
    <div class="container">
        <div class="section-header">
            <h3>F.A.Q.</h3>
            <p>Frequently Asked Questions</p>
        </div>
        <div class="section-wrapper">
            <div id="burger" class="tabcontent">
                <div class="row no-gutters">
                    <div class="col-lg-12 col-12">
                        <div id="accordion" class="myaccordion">
                            <?php foreach ($faq as $faq) : ?>
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="d-flex align-items-center justify-content-between btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <?= $faq->question; ?>
                                                <span>
                                                    <i class="icofont-arrow-right"></i>
                                                </span>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <p><?= $faq->answer; ?>
                                            </p>
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
</section>
<!-- Food Product Section Style 2 Ending here -->