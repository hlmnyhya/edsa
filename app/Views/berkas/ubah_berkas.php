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
                            <form action="<?= base_url('berkas/update/'.$berkas['id']) ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="berkas" class="col-sm-2 col-form-label">Berkas</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="berkas" id="berkas" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="nm_berkas" class="col-sm-2 col-form-label">Nama Berkas</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="nm_berkas" value="<?= $berkas['nm_berkas'] ?>" type="text" id="nm_berkas" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Folder</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="folder" aria-label="Default select example" required>
                                                <option value="<?= $berkas['folder'] ?>" selected><?= $berkas['folder'] ?></option>
                                                <option disabled>Pilih Folder</option>
                                                <option value="Peraturan">Peraturan</option>
                                                <option value="Pengaduan">Pengaduan</option>
                                                <option value="Pelayanan">Pelayanan</option>
                                                <option value="Lainya">Lainya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Unit</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="id_unit" aria-label="Default select example" required>
                                                <option value="<?= $berkas['id_unit'] ?>" selected><?= $berkas['simbol_unit'] ?></option>
                                                <?php foreach ($unit as $key => $value) : ?>
                                                    <option value="<?= $value['id'] ?>"><?= $value['simbol_unit'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <a href="<?= base_url('berkas') ?>" class="btn btn-success waves-effect waves-light me-2">Kembali</a>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
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
