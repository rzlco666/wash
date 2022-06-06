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
                             <div class="card-body">
								 <div class="col-md-12">
									 <div class="row">
										 <div class="col-md-4">
											 <span>Pilih dari tanggal</span>
											 <div class="input-group">
												 <input type="text" class="form-control pickdate date_range_filter" name="" >
												 <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
											 </div>
										 </div>
										 <div class="col-md-4">
											 <span>Sampai tanggal</span>
											 <div class="input-group">
												 <input type="text" class="form-control pickdate date_range_filter2" name="">
												 <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
											 </div>
										 </div>
									 </div>
								 </div>
                            </div>
                            <div class="card-body">
                                <table id="tabelData" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Pemesan</th>
                                            <th>Transaksi</th>
                                            <th>#</th>
                                            <th>Total</th>
                                            <th>Pembayaran</th>
                                            <th>Status</th>
                                            <!--<th>Aksi</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($transaksi as $tempat_cuci) : ?>
                                            <tr>
                                                <td><?= $tempat_cuci->order_id; ?></td>
                                                <td><?= $tempat_cuci->nama; ?></td>
                                                <td><?= $tempat_cuci->transaction_time; ?></td>
                                                <td>
                                                    <p><b>Waktu Transaksi : </b></br>
                                                        <?= format_indo2($tempat_cuci->transaction_time); ?></br>
                                                        <?= format_indo3($tempat_cuci->transaction_time); ?>
                                                    </p>
                                                    <?php
                                                    switch ($tempat_cuci->kendaraan) {
                                                        case 1:
                                                            echo "<b><p>Jenis : </b>Cuci Mobil</p>";
                                                            break;
                                                        case 2:
                                                            echo "<b><p>Jenis : </b>Cuci Motor</p>";
                                                            break;
                                                    }
                                                    ?>
                                                    <p><b>Jadwal : </b></br> <?= format_indo($tempat_cuci->tanggal_pesan); ?></p>
                                                </td>

                                                <td>
                                                    <b><?= rupiah($tempat_cuci->gross_amount); ?></b>
                                                    <p>
                                                        <?php $text = $tempat_cuci->payment_type;
                                                        $string = str_replace('_', ' ', $text);
                                                        echo ucwords($string);
                                                        echo '</br>' . strtoupper($tempat_cuci->bank) ?>
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
                                                <td>
                                                    <?php
                                                    switch ($tempat_cuci->status) {
                                                        case 1:
                                                            echo "<span class='badge badge-warning'>Belum Diproses</span>";
                                                            break;
                                                        case 2:
                                                            echo "<span class='badge badge-primary'>Diproses</span>";
                                                            break;
                                                        case 3:
                                                            echo "<span class='badge badge-success'>Selesai</span>";
                                                            break;
                                                        default:
                                                            echo "<span class='badge badge-danger'>Dibatalkan</span>";
                                                            break;
                                                    }
                                                    ?>
                                                </td>
                                                <!--<td>
                                                    <?php
/*                                                    if ($tempat_cuci->status_code == 200) {
                                                        switch ($tempat_cuci->status) {
                                                            case 1:
                                                    */?>
                                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Modal_Proses">
                                                                    Diproses
                                                                </button>
                                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#Modal_Batal">
                                                                    Batalkan
                                                                </button>
                                                            <?php
/*                                                                break;
                                                            case 2:
                                                            */?>
                                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Modal_Selesai">
                                                                    Selesai
                                                                </button>
                                                            <?php
/*                                                                break;
                                                            case 3:
                                                            */?>
                                                                <span class='badge badge-success'>Selesai</span>
                                                            <?php
/*                                                                break;
                                                            default:
                                                            */?>
                                                                <span class='badge badge-danger'>Dibatalkan</span>
                                                        <?php
/*                                                                break;
                                                        }
                                                    } elseif ($tempat_cuci->status_code == 201) {
                                                        */?>
                                                        <span class='badge badge-warning'>Menunggu Lunas</span>
                                                    <?php
/*                                                    } else {
                                                    */?>
                                                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#Modal_Batal">
                                                            Batalkan
                                                        </button>
                                                    <?php
/*                                                    }
                                                    */?>
                                                </td>-->
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
											<th>Order ID</th>
											<th>Pemesan</th>
											<th>Transaksi</th>
											<th>#</th>
											<th>Total</th>
											<th>Pembayaran</th>
											<th>Status</th>
                                            <!--<th>Aksi</th>-->
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

    <?php foreach ($transaksi as $tempat_cuci) : ?>

        <!--MODAL Proses-->
        <div class="modal fade" id="Modal_Proses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Proses Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>Apakah kamu yakin untuk memproses pesanan ini?</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="<?= base_url('Pemilik/proses_transaksi/'); ?><?= $tempat_cuci->order_id; ?>" class="btn btn-primary">Yes</a>
                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL Proses-->

        <!--MODAL Batal-->
        <div class="modal fade" id="Modal_Batal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Batalkan Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>Apakah kamu yakin untuk membatalkan pesanan ini?</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="<?= base_url('Pemilik/batal_transaksi/'); ?><?= $tempat_cuci->order_id; ?>" class="btn btn-primary">Yes</a>
                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL Batal-->

        <!--MODAL Selesai-->
        <div class="modal fade" id="Modal_Selesai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Selesaikan Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>Apakah kamu yakin telah menyelesaikan pesanan ini?</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="<?= base_url('Pemilik/selesai_transaksi/'); ?><?= $tempat_cuci->order_id; ?>" class="btn btn-primary">Yes</a>
                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL Selesai-->

    <?php endforeach; ?>
