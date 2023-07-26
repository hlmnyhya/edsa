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
                            <form action="<?= base_url('regu/update/'.$regu['id']) ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama Regu</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="nm_regu" id="nm_regu" value="<?= $regu['nm_regu'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Anggota Regu</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="id_anggota" aria-label="Default select example" required>
                                                <?php foreach ($anggota as $key => $value) : ?>
                                                    <option value="<?= $value['id'] ?>" <?= ($value['id'] == $regu['id_anggota']) ? 'selected' : '' ?>><?= $value['nm_anggota'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Jadwal Shift</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="id_shift" aria-label="Default select example" required>
                                                <?php foreach ($shift as $key => $value) : ?>
                                                    <option value="<?= $value['id'] ?>" <?= ($value['id'] == $regu['id_shift']) ? 'selected' : '' ?>><?= $value['ket_jaga'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="tgl" class="col-sm-2 col-form-label">Tanggal Mutasi</label>
                                        <div class="col-sm-10">
                                            <?php if (is_array($regu['tgl'])) : ?>
                                                <?php $tgl_mutasi = $regu['tgl'][0]; ?>
                                            <?php else : ?>
                                                <?php $tgl_mutasi = $regu['tgl']; ?>
                                            <?php endif; ?>
                                            <input class="form-control" name="tgl" type="date" id="tgl" value="<?= $tgl_mutasi ?>" required>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <a href="<?= base_url('regu') ?>" class="btn btn-success waves-effect waves-light me-2">Kembali</a>
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
<script src="<?= base_url('assets/libs/select2/js/select2.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/spectrum-colorpicker2/spectrum.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        // Inisialisasi Select2
        $('.select2').select2();

        // Inisialisasi datepicker
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });

        // Inisialisasi touchspin
        $(".touchspin").TouchSpin({
            buttondown_class: "btn btn-primary",
            buttonup_class: "btn btn-primary",
            buttondown_txt: '<i class="mdi mdi-minus"></i>',
            buttonup_txt: '<i class="mdi mdi-plus"></i>'
        });
    });
</script>

<script src="<?= base_url('assets/js/pages/form-advanced.init.js') ?>"></script>

