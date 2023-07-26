<?= $this->include('partials/main') ?>

<head>
    <?= $title_meta ?>
    <!-- Bootstrap Css -->
    <?= $this->include('partials/head-css') ?>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<?= $this->include('partials/body') ?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <!-- Start right Content here -->
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
                                <?php if ($dokumentasi['judul'] != '') : ?>
                                    <div class="row">
                                        <?php
                                        $model = new \App\Models\Dokumentasi();
                                        $fotos = $model->getByJudul($dokumentasi['judul']);
                                        foreach ($fotos as $foto) : ?>
                                            <div class="col-md-3">
                                                <div style="border: 1px solid #ccc; padding: 5px;">
                                                    <img src="<?= base_url('uploads/images/' . $foto['foto']) ?>" alt="Foto Dokumentasi" style="max-width: 100px; height: 100;">
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else : ?>
                                    <p>Judul tidak tersedia</p>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label for="judul">Judul Kegiatan</label>
                                    <input class="form-control" name="judul" type="text" id="judul" value="<?= isset($dokumentasi['judul']) ? $dokumentasi['judul'] : '' ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis Kegiatan</label>
                                    <input class="form-control" name="jenis" type="text" id="jenis" value="<?= isset($dokumentasi['jenis']) ? $dokumentasi['jenis'] : '' ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tgl">Tanggal Kegiatan</label>
                                    <input class="form-control" name="tgl" type="text" id="tgl" value="<?= isset($dokumentasi['tgl']) ? $dokumentasi['tgl'] : '' ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="ket">Keterangan</label>
                                    <input class="form-control" name="ket" type="text" id="ket" value="<?= isset($dokumentasi['ket']) ? $dokumentasi['ket'] : '' ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="id_unit">Unit</label>
                                    <input class="form-control" name="id_unit" type="text" id="id_unit" value="<?= isset($dokumentasi['simbol_unit']) ? $dokumentasi['simbol_unit'] : '' ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-end">
                            <a href="<?= base_url('dokumentasi') ?>" class="btn btn-success waves-effect waves-light me-2" style="margin-right: 10px;">Kembali</a>
                            <button onclick="printData()" class="btn btn-primary waves-effect waves-light">Cetak</button>
                        </div>
                    
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
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

<script>
    function printData() {
        var printContents = document.getElementById("layout-wrapper").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

</body>

</html>
