<?= $this->include('partials/main') ?>

<head>
    <?= $title_meta ?>
    <!-- Bootstrap Css -->
    <?= $this->include('partials/head-css') ?>
    <style>
        iframe {
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
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
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="berkas">Berkas</label>
                                    <div>
                                        <a href="<?= base_url('berkas/show/' . $berkas['berkas']) ?>" target="_blank"><?= $berkas['berkas'] ?></a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nm_berkas">Nama Berkas</label>
                                    <input class="form-control" name="nm_berkas" type="text" id="nm_berkas" value="<?= $berkas['nm_berkas'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="folder">Folder</label>
                                    <input class="form-control" name="folder" type="text" id="folder" value="<?= $berkas['folder'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="id_unit">Unit</label>
                                    <input class="form-control" name="id_unit" type="text" id="id_unit" value="<?= $berkas['simbol_unit'] ?>" readonly>
                                </div>

                                <div class="mt-4 d-flex justify-content-end">
                                <a href="<?= base_url('uploads/' . $berkas['berkas']) ?>" class="btn btn-primary waves-effect waves-light me-2">
                                    <i class="fas fa-download"></i> Unduh Berkas
                                </a>
                                <a href="<?= base_url('berkas') ?>" class="btn btn-success waves-effect waves-light me-2">Kembali</a>
                                </a>
                                </div>
                            </div>
                            
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
