<?= $this->include('partials/main') ?>

<head>

    <?= $title_meta ?>
    <!-- Bootstrap Css -->
    <?= $this->include('partials/head-css') ?>
</head>

<?= $this->include('partials/body') ?> <!-- Begin page -->
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
                            <form action="anggota/save" method="post">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama Anggota</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="nm_anggota" type="text" id="nm_anggota" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">NRP</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="nrp" type="number" id="nrp" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Pangkat</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="pangkat" aria-label="Default select example" required>
                                                <option selected disabled>Pilih Pangkat</option>
                                                <option value="BRIGADIR">BRIGADIR</option>
                                                <option value="BRIPTU">BRIPTU</option>
                                                <option value="BRIPKA">BRIPKA</option>
                                                <option value="IPDA">IPDA</option>
                                                <option value="IPTU">IPTU</option>
                                                <option value="AIPTU">AIPTU</option>
                                                <option value="AIPDA">AIPDA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="id_jabatan" aria-label="Default select example" required>
                                                <option selected disabled hidden>Pilih Jabatan</option>
                                                <?php foreach ($jabatan as $key => $value) : ?>
                                                    <option value="<?= $value['id'] ?>"><?= $value['simbol_jabatan'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="tgl_lahir" type="date" id="tgl_lahir" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="jk" aria-label="Default select example" required>
                                                <option selected disabled>-</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <a href="<?= base_url('anggota') ?>" type="submit" class="btn btn-success waves-effect waves-light me-2">Kembali</a>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Tambah</button>
                                    </div>
                                </div>
                            </form>
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

</body>

</html>