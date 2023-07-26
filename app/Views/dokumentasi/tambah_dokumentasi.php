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
                            <form action="<?= base_url('dokumentasi/save') ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Foto</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="foto[]" id="foto" multiple required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Judul</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="judul" type="text" id="judul" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Jenis</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="jenis" aria-label="Default select example" required>
                                                <option selected disabled>Pilih Folder</option>
                                                <option value="Patroli">Patroli</option>
                                                <option value="Pertemuan">Pertemuan</option>
                                                <option value="Pelayanan">Pelayanan</option>
                                                <option value="Sosialisasi">Sosialisasi</option>
                                                <option value="Lainya">Lainya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="tgl" type="date" id="tgl" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Keterangan</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="ket" type="text" id="ket" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Unit</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="id_unit" aria-label="Default select example" required>
                                                <option selected disabled hidden>Pilih Unit</option>
                                                <?php foreach ($unit as $key => $value) : ?>
                                                    <option value="<?= $value['id'] ?>"><?= $value['simbol_unit'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <a href="<?= base_url('dokumentasi') ?>" class="btn btn-success waves-effect waves-light me-2">Kembali</a>
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

<script>
    // Memuat fungsi ini saat halaman selesai dimuat
    document.addEventListener('DOMContentLoaded', function () {
        // Inisialisasi plugin bs-custom-file-input
        bsCustomFileInput.init();

        // Menambahkan event listener ketika input file diubah
        document.querySelector('#foto').addEventListener('change', function (event) {
            // Menghapus semua preview foto yang ada sebelumnya
            document.querySelector('#preview-foto').innerHTML = '';

            // Mengambil file yang dipilih oleh user
            const files = Array.from(event.target.files);

            // Membuat preview untuk setiap file foto yang dipilih
            files.forEach(function (file) {
                const reader = new FileReader();

                // Membaca data URL foto yang dipilih
                reader.onload = function (event) {
                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.classList.add('preview-foto');

                    // Menambahkan preview foto ke dalam div dengan id "preview-foto"
                    document.querySelector('#preview-foto').appendChild(img);
                };

                reader.readAsDataURL(file);
            });
        });
    });
</script>

</body>

</html>
