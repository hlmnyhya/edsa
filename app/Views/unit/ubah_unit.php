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
                            <form action="<?= base_url('unit/update/'.$unit['id']) ?>" method="post">
                                <?= csrf_field() ?>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama Unit</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="nm_unit" type="text" value="<?= $unit['nm_unit'] ?>" id="nm_unit" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Simbol Unit</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="simbol_unit" value="<?= $unit['simbol_unit'] ?>" type="text" id="simbol_unit" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Kepala Unit</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="id_anggota" aria-label="Default select example" required>
                                                <option selected hidden value="<?= $unit['id_anggota'] ?>"><?= $unit['nm_anggota'] ?></option>
                                                <?php foreach ($anggota as $key => $value) : ?>
                                                    <option value="<?= $value['id'] ?>"><?= $value['nm_anggota'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <a href="<?= base_url('unit') ?>" class="btn btn-success waves-effect waves-light me-2">Kembali</a>
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

</html
