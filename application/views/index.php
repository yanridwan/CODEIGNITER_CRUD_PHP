<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>CRUD-PHP(Codeigniter)</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4" style="padding-bottom: 5%; ">
                <h1 align="center" style="padding-top:20%">CRUD-PHP</h1>
                <!-- <p style="padding-left:20%;font-family:Brush Script MT">by Yan Ridwan</p> -->
            </div>
            <div class="col-md-12">
                <div class="nav justify-content-end" style="padding-bottom:2%">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
                </div>
                <table class="table table-striped" border="1px">
                    <thead align="center">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody align="center" id="tampil_barang">
                        <?php $no = 1;
                        foreach ($barang as $data) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->barang_nama ?></td>
                                <td>Rp<?= number_format("$data->barang_harga", 0, ",", ".") ?></td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#editData<?= $data->barang_id ?>" class="btn btn-secondary" style="width: 80px;">Edit</button>
                                    <!-- <a href="<?= site_url('API/hapus/' . $data->barang_id) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus? <?= $data->barang_nama ?>')"><button type="button" class="btn btn-danger" style="width: 80px;">Hapus</button></a> -->
                                    <button type="button" data-toggle="modal" data-target="#hapusData" class="btn btn-danger" style="width: 80px;">Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahData" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambahForm" method="POST" action="<?= base_url('API/tambah') ?>">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Barang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_barang" id="namaBarang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Harga</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="harga_barang" id="hargaBarang">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <?php $no = 0;
    foreach ($barang as $data) : $no++; ?>
        <div class="modal fade" id="editData<?= $data->barang_id ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?= site_url('API/edit') ?>">
                        <input type="hidden" value="<?= $data->barang_id ?>" name="barang_id">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama Barang</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_barang" id="namaBarang" value="<?= $data->barang_nama ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Harga</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="harga_barang" id="hargaBarang" value="<?= $data->barang_harga ?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Modal Hapus-->
    <div class="modal fade" id="hapusData" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data? <?= $data->barang_id ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= site_url('API/hapus/' . $data->barang_id) ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                </div>
            </div>
        </div>
    </div>


    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->
    <script src="<?= base_url('assets/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('assets/jquery-3.6.0.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>

</body>

</html>