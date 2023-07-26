<?= $this->include('partials/main') ?>

<head>
    <?= $title_meta ?>
    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/libs/select2/css/select2.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/libs/spectrum-colorpicker2/spectrum.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') ?>" rel="stylesheet">

    <?= $this->include('partials/head-css') ?>
</head>

<?= $this->include('partials/body') ?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <?= $page_title ?>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Detail Mutasi</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Nama</th>
                                                <td><?= $mutasi['nm_anggota'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jenis</th>
                                                <td><?= $mutasi['jenis_mutasi'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Shift</th>
                                                <td><?= $mutasi['ket_jaga'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Mutasi</th>
                                                <td><?= $mutasi['tanggal'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jam Masuk</th>
                                                <td><?= $mutasi['jam'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Mutasi Kegiatan</th>
                                                <td><?= $mutasi['mutasi'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Keterangan Mutasi</th>
                                                <td><?= $mutasi['ket_mutasi'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Barang Buku Register</th>
                                                <td><?= $mutasi['barang_buku'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Buku</th>
                                                <td><?= $mutasi['jumlah_buku'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Barang Senpi SS1-V1</th>
                                                <td><?= $mutasi['barang_senpiss'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Senpi SS1-V1</th>
                                                <td><?= $mutasi['jumlah_senpiss'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Barang Senpi RM</th>
                                                <td><?= $mutasi['barang_senpirm'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Senpi RM</th>
                                                <td><?= $mutasi['jumlah_senpirm'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Barang Senpi Rev</th>
                                                <td><?= $mutasi['barang_senpirev'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Senpi Rev</th>
                                                <td><?= $mutasi['jumlah_senpirev'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Kejadian Kejahatan</th>
                                                <td><?= $mutasi['kejadian_kejahatan'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Kejadian Kejahatan</th>
                                                <td><?= $mutasi['jumlah_kejahatan'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Kejadian Pelanggaran</th>
                                                <td><?= $mutasi['kejadian_pelanggaran'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Kejadian Pelanggaran</th>
                                                <td><?= $mutasi['jumlah_pelanggaran'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Kejadian Lain</th>
                                                <td><?= $mutasi['kejadian_lain'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Kejadian Lain</th>
                                                <td><?= $mutasi['jumlah_lain'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tahanan Laki-laki</th>
                                                <td><?= $mutasi['tahanan_laki'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Tahanan Laki-laki</th>
                                                <td><?= $mutasi['jumlah_tahananlaki'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tahanan Perempuan</th>
                                                <td><?= $mutasi['tahanan_perempuan'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Tahanan Perempuan</th>
                                                <td><?= $mutasi['jumlah_tahananper'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end" style="margin-top: 10px;">
                                    <a href="<?= base_url('mutasi') ?>" class="btn btn-primary" style="margin-right: 10px;">Kembali</a>
                                    <button onclick="window.print()" class="btn btn-primary">Cetak</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?= $this->include('partials/right-sidebar') ?>
<!-- /Right-bar -->

<?= $this->include('partials/vendor-scripts') ?>

<!-- bs custom file input plugin -->
<script src="<?= base_url('assets/libs/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pages/form-element.init.js') ?>"></script>
<script src="<?= base_url('assets/js/app.js') ?>"></script>
<script src="<?= base_url('assets/libs/select2/js/select2.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/spectrum-colorpicker2/spectrum.min.js') ?>"></script>
</body>

</html>
