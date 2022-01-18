<!-- Content body -->
<div class="content-body">
    <!-- Content -->
    <div class="content ">

        <div class="page-header">
            <div>
                <h3>Data Tempat Cuci</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Pemilik/'); ?>">Pemilik</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Tempat Cuci</li>
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
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No HP</th>
                                            <th>Email</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Foto 1</th>
                                            <th>Foto 2</th>
                                            <th>Foto 3</th>
                                            <th>Maps</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tempat_cuci as $tempat_cuci) : ?>
                                            <tr>
                                                <td><?= $tempat_cuci->id; ?></td>
                                                <td><?= $tempat_cuci->nama; ?></td>
                                                <td><?= $tempat_cuci->alamat; ?></td>
                                                <td><?= $tempat_cuci->hp; ?></td>
                                                <td><?= $tempat_cuci->email; ?></td>
                                                <td>
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
                                                </td>
                                                <td>
                                                    Harga Cuci Mobil : <?= rupiah($tempat_cuci->harga_mobil); ?> <br>
                                                    Harga Cuci Motor : <?= rupiah($tempat_cuci->harga_motor); ?>
                                                </td>
                                                <td>
                                                    <div class="gallery-container">
                                                        <a target="_blank" href="<?= base_url('uploads/tempat_cuci/foto1/'); ?><?= $tempat_cuci->foto1; ?>" class="image-popup-gallery-item">
                                                            <div class="image-hover">
                                                                <img style="width: 300px;" src="<?= base_url('uploads/tempat_cuci/foto1/'); ?><?= $tempat_cuci->foto1; ?>" class="rounded" alt="image">
                                                                <div class="image-hover-body rounded">
                                                                    <div>
                                                                        <h4 class="mb-2"><?= $tempat_cuci->nama; ?>, Foto 1</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="gallery-container">
                                                        <a target="_blank" href="<?= base_url('uploads/tempat_cuci/foto2/'); ?><?= $tempat_cuci->foto2; ?>" class="image-popup-gallery-item">
                                                            <div class="image-hover">
                                                                <img style="width: 300px;" src="<?= base_url('uploads/tempat_cuci/foto2/'); ?><?= $tempat_cuci->foto2; ?>" class="rounded" alt="image">
                                                                <div class="image-hover-body rounded">
                                                                    <div>
                                                                        <h4 class="mb-2"><?= $tempat_cuci->nama; ?>, Foto 2</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="gallery-container">
                                                        <a target="_blank" href="<?= base_url('uploads/tempat_cuci/foto3/'); ?><?= $tempat_cuci->foto3; ?>" class="image-popup-gallery-item">
                                                            <div class="image-hover">
                                                                <img style="width: 300px;" src="<?= base_url('uploads/tempat_cuci/foto3/'); ?><?= $tempat_cuci->foto3; ?>" class="rounded" alt="image">
                                                                <div class="image-hover-body rounded">
                                                                    <div>
                                                                        <h4 class="mb-2"><?= $tempat_cuci->nama; ?>, Foto 3</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td><?= $tempat_cuci->maps; ?></td>
                                                <td><?= $tempat_cuci->deskripsi; ?></td>
                                                <td>
                                                    <?php
                                                    switch ($tempat_cuci->status) {
                                                        case 0:
                                                            echo "<span class='badge badge-danger'>Nonaktif</span>";
                                                            break;
                                                        case 1:
                                                            echo "<span class='badge badge-success'>Aktif</span>";
                                                            break;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-uppercase">
                                                        <i class="ti-settings mr-2"></i> Edit Tempat Cuci
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No HP</th>
                                            <th>Email</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Foto 1</th>
                                            <th>Foto 2</th>
                                            <th>Foto 3</th>
                                            <th>Maps</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Tempat Cuci</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php foreach ($cuci as $tempat_cuci) : ?>
                    <form action="<?= base_url('Pemilik/update_tempat_cuci') ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <!-- <div class="form-group text-center" id="preview"></div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="file" id="file" class="custom-file-input">
                                <label class="custom-file-label" for="file">
                                    Pilih Foto
                                    </span>
                            </div>
                        </div> -->
                            <div class="form-group">
                                <label>Nama Tempat Cuci :</label>
                                <input type="text" name="nama" value="<?= $tempat_cuci->nama; ?>" class="form-control" placeholder="Nama Tempat Cuci">
                            </div>
                            <div class="form-group">
                                <label>Alamat Tempat Cuci :</label>
                                <input type="text" name="alamat" value="<?= $tempat_cuci->alamat; ?>" class="form-control" placeholder="Alamat Tempat Cuci">
                            </div>
                            <div class="form-group">
                                <label>Telepon :</label>
                                <input type="number" name="hp" value="<?= $tempat_cuci->hp; ?>" class="form-control" placeholder="Telepon">
                            </div>
                            <div class="form-group">
                                <label>Email Tempat Cuci :</label>
                                <input type="email" name="email" value="<?= $tempat_cuci->email; ?>" class="form-control" placeholder="Email Tempat Cuci">
                            </div>
                            <div class="form-group">
                                <label>Maps Tempat Cuci :</label>
                                <input type="text" name="maps" value="<?= $tempat_cuci->maps; ?>" class="form-control" placeholder="Maps Tempat Cuci">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Tempat Cuci :</label>
                                <textarea id="editor" name="deskripsi">
                                <?= $tempat_cuci->deskripsi; ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori Tempat Cucian :</label>
                                <select name="kategori" class="select2" id="kategori">
                                    <option value="1" name="kategori">Mobil</option>
                                    <option value="2" name="kategori">Motor</option>
                                    <option value="3" name="kategori">Mobil dan Motor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga Cuci Mobil :</label>
                                <input type="number" name="harga_mobil" value="<?= $tempat_cuci->harga_mobil; ?>" class="form-control" placeholder="Harga Cuci Mobil">
                            </div>
                            <div class="form-group">
                                <label>Harga Cuci Motor :</label>
                                <input type="number" name="harga_motor" value="<?= $tempat_cuci->harga_motor; ?>" class="form-control" placeholder="Harga Cuci Motor">
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="foto1" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Uplod Foto 1</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="foto2" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Uplod Foto 2</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="foto3" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Uplod Foto 3</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="btn_upload" type="submit">Ubah</button>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>