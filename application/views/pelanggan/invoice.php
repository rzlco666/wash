<?php foreach ($transaksi as $i) : ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Invoice &mdash; <?= $i->order_id; ?></title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= base_url('assets_pelanggan/'); ?>images/favicon.png" type="image/png">

        <!-- Invoice styling -->
        <style>
            body {
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                text-align: center;
                color: #777;
            }

            body h1 {
                font-weight: 300;
                margin-bottom: 0px;
                padding-bottom: 0px;
                color: #000;
            }

            body h3 {
                font-weight: 300;
                margin-top: 10px;
                margin-bottom: 20px;
                font-style: italic;
                color: #555;
            }

            body a {
                color: #06f;
            }

            .invoice-box {
                max-width: 800px;
                margin: auto;
                padding: 30px;
                border: 1px solid #eee;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                font-size: 16px;
                line-height: 24px;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color: #555;
            }

            .invoice-box table {
                width: 100%;
                line-height: inherit;
                text-align: left;
                border-collapse: collapse;
            }

            .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            }

            .invoice-box table tr td:nth-child(2) {
                text-align: right;
            }

            .invoice-box table tr.top table td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.top table td.title {
                font-size: 45px;
                line-height: 45px;
                color: #333;
            }

            .invoice-box table tr.information table td {
                padding-bottom: 40px;
            }

            .invoice-box table tr.heading td {
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }

            .invoice-box table tr.details td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.item td {
                border-bottom: 1px solid #eee;
            }

            .invoice-box table tr.item.last td {
                border-bottom: none;
            }

            .invoice-box table tr.total td:nth-child(2) {
                border-top: 2px solid #eee;
                font-weight: bold;
            }

            @media only screen and (max-width: 600px) {
                .invoice-box table tr.top table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }

                .invoice-box table tr.information table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }
            }
        </style>
    </head>

    <body>

        <div class="invoice-box">
            <table>
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="<?= base_url('assets_pelanggan/'); ?>images/logo/01.png" alt="Company logo" />
                                </td>

                                <td>
                                    Invoice #: <?= $i->order_id; ?><br />
                                    Created: <?= date("d/m/Y") ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    <?= $i->nama; ?><br />
                                    <?= $i->alamat; ?><br />
                                    <?= $i->email; ?><br />
                                    <?= $i->no_hp; ?>
                                </td>

                                <td>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="heading">
                    <td>Payment Method</td>
                    <td>Status</td>
                </tr>

                <tr class="details">
                    <td><?php $text = $i->payment_type;
                        $string = str_replace('_', ' ', $text);
                        echo ucwords($string); ?> <?= strtoupper($i->bank); ?></td>
                    <td>
                        <?php
                        if ($i->status_code == "200") {
                        ?>
                            Lunas
                        <?php
                        } elseif ($i->status_code == "201") {
                        ?>
                            Pending
                        <?php
                        } else {
                        ?>
                            Dibatalkan
                        <?php
                        }
                        ?>
                    </td>
                </tr>

                <tr class="heading">
                    <td>Item</td>

                    <td>Harga</td>
                </tr>

                <tr class="item">
                    <td>
                        <?php
                        switch ($i->kendaraan) {
                            case 1:
                                echo "Cuci Mobil";
                                break;
                            case 2:
                                echo "Cuci Motor";
                                break;
                        }
                        ?> di 
                        <?= $i->nama_usaha; ?></td>

                    <td>Rp. <?= number_format($i->gross_amount, '0', '', '.'); ?></td>
                </tr>

                <tr class="total">
                    <td></td>

                    <td>Total: Rp. <?= number_format($i->gross_amount, '0', '', '.'); ?></td>
                </tr>
            </table>
        </div>
    </body>

    </html>

<?php endforeach; ?>

<script>
    window.print();
</script>