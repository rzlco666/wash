<!-- Content body -->
<div class="content-body">
    <!-- Content -->
    <div class="content ">

        <div class="page-header">
            <div>
                <h3>Data Transaksi</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Pemilik/'); ?>">Pemilik</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <!-- <div class="card-body">
                                <button type="button" class="btn btn-primary btn-uppercase" data-toggle="modal" data-target="#Modal_Add">
                                    <i class="ti-plus mr-2"></i> Tambah Data
                                </button>
                            </div> -->
                            <div class="card-body">
                                <table id="mydata" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Pemesan</th>
                                            <th>#</th>
                                            <th>Jadwal</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($transaksi as $tempat_cuci) : ?>
                                            <tr>
                                                <td><?= $tempat_cuci->order_id; ?></td>
                                                <td><?= $tempat_cuci->nama; ?></td>

                                                <td>
                                                    <p>Waktu Transaksi : </br> <?= format_indo($tempat_cuci->transaction_time); ?></p>
                                                    <?php
                                                    switch ($tempat_cuci->kendaraan) {
                                                        case 1:
                                                            echo "<p>Jenis : Cuci Mobil</p>";
                                                            break;
                                                        case 2:
                                                            echo "<p>Jenis : Cuci Motor</p>";
                                                            break;
                                                    }
                                                    ?>
                                                </td>

                                                <td><?= format_indo($tempat_cuci->tanggal_pesan); ?></td>

                                                <td>
                                                    <b><?= rupiah($tempat_cuci->gross_amount); ?></b>
                                                    <p>
                                                        <?php $text = $tempat_cuci->payment_type;
                                                        $string = str_replace('_', ' ', $text);
                                                        echo ucwords($string);
                                                        echo ' ' . strtoupper($tempat_cuci->bank) ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <?php
                                                    switch ($tempat_cuci->status_code) {
                                                        case 201:
                                                            echo "<span class='badge badge-warning'>Pending</span>";
                                                            break;
                                                        case 200:
                                                            echo "<span class='badge badge-success'>Lunas</span>";
                                                            break;
                                                        default:
                                                            echo "<span class='badge badge-danger'>Dibatalkan</span>";
                                                            break;
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>#</th>
                                            <th>Jadwal</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- ./ Content -->