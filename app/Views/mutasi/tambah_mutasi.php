
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
                            <form action="<?= base_url('mutasi/save') ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Nama</label>
                                        <div class="col-sm-10">
                                        <input class="form-control" type="hidden" name="id_anggota" value="<?= session()->id_anggota ?>">
                                        <input class="form-control" type="text" name=""  value="<?= session()->name ?>" readonly>

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Jenis</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="id_jenis">
                                                <option disabled selected>Pilih</option>
                                                <?php foreach ($jenis as $key => $value) : ?>
                                                    <option value="<?= $value['id'] ?>"><?= $value['jenis_mutasi'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                   <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-end">Shift</label>
                                    <div class="col-sm-10">
                                        <?php
                                        date_default_timezone_set('Asia/Makassar');
                                        $current_time = date("H:i");

                                        // Determine the shift based on the current time
                                        $selected_shift_id = ($current_time >= '20:00' || $current_time < '08:00') ? 3 : 2;

                                        ?>
                                        <select class="form-control select2" name="id_shift" readonly>
                                            <?php foreach ($shift as $value) : ?>
                                                <?php if ($value['id'] == $selected_shift_id) : ?>
                                                    <option value="<?= $value['id'] ?>" selected>
                                                        <?= $value['ket_jaga'] ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>

                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Tanggal Mutasi</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="tanggal" type="date" id="tanggal" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="jam" class="col-sm-2 col-form-label text-end">Jam Masuk</label>
                                        <div class="col-sm-10">
                                            <?php 
                                            date_default_timezone_set('Asia/Makassar');
                                            $timenow = date("H:i");
                                            ?>
                                            <input class="form-control" type="time" name="jam" id="jam" value="<?= $timenow ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Mutasi Kegiatan</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="mutasi" id="mutasi">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Keterangan Mutasi</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="ket_mutasi" id="ket_mutasi">
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
                                                        <input class="form-control" type="text" name="barang_buku" id="barang_buku">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_buku">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_buku" id="jumlah_buku" placeholder="Jumlah Buku">
                                                    </div>
                                                </div>

                                                <!-- Senpi SS1-V1 -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="barang_senpiss">Barang Senpi SS1-V1</label>
                                                        <input class="form-control" type="text" name="barang_senpiss" id="barang_senpiss">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_senpiss">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_senpiss" id="jumlah_senpiss" placeholder="Jumlah Senpi SS1-V1">
                                                    </div>
                                                </div>

                                                <!-- Senpi RM -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="barang_senpirm">Barang Senpi RM</label>
                                                        <input class="form-control" type="text" name="barang_senpirm" id="barang_senpirm">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_senpirm">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_senpirm" id="jumlah_senpirm" placeholder="Jumlah Senpi RM">
                                                    </div>
                                                </div>

                                                <!-- Senpi Revolver -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                    <label for="barang_senpirev">Barang Senpi Rev</label>
                                                        <input class="form-control" type="text" name="barang_senpirev" id="barang_senpirev">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_senpirev">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_senpirev" id="jumlah_senpirev" placeholder="Jumlah Senpi Revolver">
                                                    </div>
                                                </div>

                                                <!-- Kejahatan -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="kejadian_kejahatan">Kejadian Kejahatan</label>
                                                        <input class="form-control" type="text" name="kejadian_kejahatan" id="kejadian_kejahatan">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_kejahatan">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_kejahatan" id="jumlah_kejahatan" placeholder="Jumlah Kejadian Kejahatan">
                                                    </div>
                                                </div>

                                                <!-- Pelanggaran -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="kejadian_pelanggaran">Kejadian Pelanggaran</label>
                                                        <input class="form-control" type="text" name="kejadian_pelanggaran" id="kejadian_pelanggaran">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_pelanggaran">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_pelanggaran" id="jumlah_pelanggaran" placeholder="Jumlah Kejadian Pelanggaran">
                                                    </div>
                                                </div>

                                                <!-- Kejadian Lain -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="kejadian_lain">Kejadian Lain</label>
                                                        <input class="form-control" type="text" name="kejadian_lain" id="kejadian_lain">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_lain">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_lain" id="jumlah_lain" placeholder="Jumlah Kejadian Lain">
                                                    </div>
                                                </div>

                                                <!-- Tahanan Laki-laki -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="tahanan_laki">Tahanan Laki-laki</label>
                                                        <input class="form-control" type="text" name="tahanan_laki" id="tahanan_laki">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_tahananlaki">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_tahananlaki" id="jumlah_tahananlaki" placeholder="Jumlah Tahanan Laki-laki">
                                                    </div>
                                                </div>

                                                <!-- Tahanan Perempuan -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label for="tahanan_perempuan">Tahanan Perempuan</label>
                                                        <input class="form-control" type="text" name="tahanan_perempuan" id="tahanan_perempuan">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="jumlah_tahananper">Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah_tahananper" id="jumlah_tahananper" placeholder="Jumlah Tahanan Perempuan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                        <a href="<?= base_url('mutasi') ?>" class="btn btn-success waves-effect waves-light me-2">Kembali</a>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Tambah</button>
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
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary'
        });
    });
</script>

</body>

</html>

