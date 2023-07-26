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
                            <form action="<?= base_url('mutasi/update/' . $mutasi['id']) ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Nama</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="id_anggota">
                                                <option disabled>Pilih</option>
                                                <?php foreach ($anggota as $key => $value) : ?>
                                                    <option value="<?= $value['id'] ?>" <?= ($value['id'] == $mutasi['id_anggota']) ? 'selected' : '' ?>><?= $value['nm_anggota'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Jenis</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="id_jenis">
                                                <option disabled>Pilih</option>
                                                <?php foreach ($jenis as $key => $value) : ?>
                                                    <option value="<?= $value['id'] ?>" <?= ($value['id'] == $mutasi['id_jenis']) ? 'selected' : '' ?>><?= $value['jenis_mutasi'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Shift</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="id_shift">
                                                <option disabled>Pilih</option>
                                                <?php foreach ($shift as $key => $value) : ?>
                                                    <option value="<?= $value['id'] ?>" <?= ($value['id'] == $mutasi['id_shift']) ? 'selected' : '' ?>><?= $value['ket_jaga'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Tanggal Mutasi</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="tanggal" type="date" id="tanggal" required value="<?= $mutasi['tanggal'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Jam Masuk</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="time" name="jam" id="jam" value="<?= $mutasi['jam'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Mutasi Kegiatan</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="mutasi" id="mutasi" value="<?= $mutasi['mutasi'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Keterangan Mutasi</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="ket_mutasi" id="ket_mutasi" value="<?= $mutasi['ket_mutasi'] ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label text-end"></label>
                                        <div class="col-sm-10">
                                            <div class="card border rounded p-3">
                                                <!-- Buku Register -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="barang_buku">Barang Buku Register</label>
                                                        <input class="form-control" type="text" name="barang_buku" id="barang_buku" value="<?= $mutasi['barang_buku'] ?>">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_buku">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_buku" id="jumlah_buku" placeholder="Jumlah Buku" value="<?= $mutasi['jumlah_buku'] ?>">
                                                    </div>
                                                </div>

                                                <!-- Senpi SS1-V1 -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="barang_senpiss">Barang Senpi SS1-V1</label>
                                                        <input class="form-control" type="text" name="barang_senpiss" id="barang_senpiss" value="<?= $mutasi['barang_senpiss'] ?>">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_senpiss">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_senpiss" id="jumlah_senpiss" placeholder="Jumlah Senpi SS1-V1" value="<?= $mutasi['jumlah_senpiss'] ?>">
                                                    </div>
                                                </div>

                                                <!-- Senpi RM -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="barang_senpirm">Barang Senpi RM</label>
                                                        <input class="form-control" type="text" name="barang_senpirm" id="barang_senpirm" value="<?= $mutasi['barang_senpirm'] ?>">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_senpirm">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_senpirm" id="jumlah_senpirm" placeholder="Jumlah Senpi RM" value="<?= $mutasi['jumlah_senpirm'] ?>">
                                                    </div>
                                                </div>

                                                <!-- Senpi Revolver -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="barang_senpirev">Barang Senpi Rev</label>
                                                        <input class="form-control" type="text" name="barang_senpirev" id="barang_senpirev" value="<?= $mutasi['barang_senpirev'] ?>">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_senpirev">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_senpirev" id="jumlah_senpirev" placeholder="Jumlah Senpi Revolver" value="<?= $mutasi['jumlah_senpirev'] ?>">
                                                    </div>
                                                </div>

                                                <!-- Kejahatan -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="kejadian_kejahatan">Kejadian Kejahatan</label>
                                                        <input class="form-control" type="text" name="kejadian_kejahatan" id="kejadian_kejahatan" value="<?= $mutasi['kejadian_kejahatan'] ?>">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_kejahatan">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_kejahatan" id="jumlah_kejahatan" placeholder="Jumlah Kejadian Kejahatan" value="<?= $mutasi['jumlah_kejahatan'] ?>">
                                                    </div>
                                                </div>

                                                <!-- Pelanggaran -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="kejadian_pelanggaran">Kejadian Pelanggaran</label>
                                                        <input class="form-control" type="text" name="kejadian_pelanggaran" id="kejadian_pelanggaran" value="<?= $mutasi['kejadian_pelanggaran'] ?>">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_pelanggaran">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_pelanggaran" id="jumlah_pelanggaran" placeholder="Jumlah Kejadian Pelanggaran" value="<?= $mutasi['jumlah_pelanggaran'] ?>">
                                                    </div>
                                                </div>

                                                <!-- Kejadian Lain -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="kejadian_lain">Kejadian Lain</label>
                                                        <input class="form-control" type="text" name="kejadian_lain" id="kejadian_lain" value="<?= $mutasi['kejadian_lain'] ?>">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_lain">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_lain" id="jumlah_lain" placeholder="Jumlah Kejadian Lain" value="<?= $mutasi['jumlah_lain'] ?>">
                                                    </div>
                                                </div>

                                                <!-- Tahanan Laki-laki -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="tahanan_laki">Tahanan Laki-laki</label>
                                                        <input class="form-control" type="text" name="tahanan_laki" id="tahanan_laki" value="<?= $mutasi['tahanan_laki'] ?>">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_tahananlaki">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_tahananlaki" id="jumlah_tahananlaki" placeholder="Jumlah Tahanan Laki-laki" value="<?= $mutasi['jumlah_tahananlaki'] ?>">
                                                    </div>
                                                </div>

                                                <!-- Tahanan Perempuan -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="tahanan_perempuan">Tahanan Perempuan</label>
                                                        <input class="form-control" type="text" name="tahanan_perempuan" id="tahanan_perempuan" value="<?= $mutasi['tahanan_perempuan'] ?>">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_tahananper">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_tahananper" id="jumlah_tahananper" placeholder="Jumlah Tahanan Perempuan" value="<?= $mutasi['jumlah_tahananper'] ?>">
                                                    </div>
                                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="<?= base_url('mutasi') ?>" class="btn btn-success waves-effect waves-light me-2">Kembali</a>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                                </div>
                            </div>
                            </form>
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

<script>
    $(document).ready(function() {
        // Select2
        $('.select2').select2();

        // Datepicker
        $('#tanggal').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });

        // Timepicker
        $('#jam').timepicker({
            showMeridian: false,
            icons: {
                up: 'mdi mdi-chevron-up',
                down: 'mdi mdi-chevron-down'
            }
        });

        // Colorpicker
        $('#colorpicker').spectrum({
            type: "text"
        });

        // Touchspin
        $('#touchspin').TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%',
            buttondown_class: 'btn btnPrimary',
            buttonup_class: 'btn btn-primary'
        });
    });
</script>

</body>

</html>
