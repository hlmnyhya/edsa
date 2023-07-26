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
                            <form action="<?= base_url('dokumentasi/update/'.$dokumentasi['id']) ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Foto</label>
                                        <div class="col-sm-10">
                                            <div class="border border-1 rounded p-1">
                                                <?php if (!empty($dokumentasi['foto'])) : ?>
                                                    <?php $fotoPaths = explode(',', $dokumentasi['foto']); ?>
                                                    <?php foreach ($fotoPaths as $fotoPath) : ?>
                                                        <div class="mb-2">
                                                            <img src="<?= base_url('uploads/images/' . trim($fotoPath)) ?>" alt="Foto Dokumentasi" style="max-width: 200px; height: auto;">
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <p>Tidak ada foto.</p>
                                                <?php endif; ?>
                                            </div>
                                            <input type="file" class="form-control mt-2" name="foto[]" id="foto" multiple>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Judul</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="judul" type="text" id="judul" value="<?= $dokumentasi['judul'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Jenis</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="jenis" aria-label="Default select example" required>
                                                <option disabled>Pilih Folder</option>
                                                <option value="Patroli" <?= ($dokumentasi['jenis'] == 'Patroli') ? 'selected' : '' ?>>Patroli</option>
                                                <option value="Pertemuan" <?= ($dokumentasi['jenis'] == 'Pertemuan') ? 'selected' : '' ?>>Pertemuan</option>
                                                <option value="Pelayanan" <?= ($dokumentasi['jenis'] == 'Pelayanan') ? 'selected' : '' ?>>Pelayanan</option>
                                                <option value="Sosialisasi" <?= ($dokumentasi['jenis'] == 'Sosialisasi') ? 'selected' : '' ?>>Sosialisasi</option>
                                                <option value="Lainya" <?= ($dokumentasi['jenis'] == 'Lainya') ? 'selected' : '' ?>>Lainya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="tgl" type="date" id="tgl" value="<?= $dokumentasi['tgl'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Keterangan</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="ket" type="text" id="ket" value="<?= $dokumentasi['ket'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Unit</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="id_unit" aria-label="Default select example" required>
                                                <option disabled hidden>Pilih Unit</option>
                                                <?php foreach ($unit as $key => $value) : ?>
                                                    <option value="<?= $value['id'] ?>" <?= ($dokumentasi['id_unit'] == $value['id']) ? 'selected' : '' ?>><?= $value['simbol_unit'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <a href="<?= base_url('dokumentasi') ?>" class="btn btn-success waves-effect waves-light me-2">Kembali</a>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Ubah</button>
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

<!-- jQuery -->
<script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>

<script src="<?= base_url('assets/js/pages/form-element.init.js') ?>"></script>

<script src="<?= base_url('assets/js/app.js') ?>"></script>

</body>

</html>
