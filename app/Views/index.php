<?= $this->include('partials/main') ?>

<head>
    <?= $title_meta ?>
    <?= $this->include('partials/head-css') ?>
</head>

<?= $this->include('partials/body') ?>

<!-- Begin page -->
<div id="layout-wrapper">
    <?= $this->include('partials/menu') ?>

    <!-- Start right Content here -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Start page title -->
                <?= $page_title ?>
                <!-- End page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-truncate font-size-16 mb-2">Mutasi Kegiatan</p>
                                                <h4 class="mb-0"></h4>
                                            </div>
                                            <div class="text-primary ms-auto">
                                                <a class="stretched-link" href="mutasi"></a>
                                                <i class="ri-calendar-check-line font-size-24"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-arrow-right"></i></span>
                                            <span class="text-muted ms-2"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-truncate font-size-16 mb-2">Dokumentasi Kegiatan</p>
                                                <h4 class="mb-0"></h4>
                                            </div>
                                            <div class="text-primary ms-auto">
                                                <a class="stretched-link" href="dokumentasi"></a>
                                                <i class="ri-file-list-3-line font-size-24"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-arrow-right"></i></span>
                                            <span class="text-muted ms-2"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Data Riwayat Mutasi Kegiatan</h4>
                        <div class="table-responsive">
                            <table class="table table-centered datatable dt-responsive nowrap" data-bs-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 1px">No</th>
                                        <th>Nama</th>
                                        <th>Jenis</th>
                                        <th>Shift</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Mutasi</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tampilData = [
                                        // Tambahkan data lainnya sesuai kebutuhan
                                    ];

                                    $nomor = 0;
                                    foreach ($tampilData as $mutasi) :
                                        $nomor++;
                                    ?>
                                        <tr>
                                            <td><?= $nomor; ?></td>
                                            <td><?= $mutasi['nm_anggota'] ?></td>
                                            <td><?= $mutasi['jenis_mutasi'] ?></td>
                                            <td><?= $mutasi['ket_jaga'] ?></td>
                                            <td><?= $mutasi['tgl_mutasi'] ?></td>
                                            <td><?= $mutasi['jam'] ?></td>
                                            <td><?= $mutasi['mutasi'] ?></td>
                                            <td><?= $mutasi['ket_mutasi'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?= $this->include('partials/footer') ?>
    </div>
</div>

<?= $this->include('partials/right-sidebar') ?>
<?= $this->include('partials/vendor-scripts') ?>

<!-- apexcharts -->
<script src="<?=base_url('assets/libs/apexcharts/apexcharts.min.js')?>"></script>

<!-- jquery.vectormap map -->
<script src="<?=base_url('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?=base_url('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') ?>"></script>

<!-- Required datatable js -->
<script src="<?=base_url('assets/libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?=base_url('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>

<!-- Responsive examples -->
<script src="<?=base_url('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?=base_url('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>

<script src="<?=base_url('assets/js/pages/dashboard.init.js') ?>"></script>

<!-- App js -->
<script src="<?=base_url('assets/js/app.js') ?>"></script>

</body>

</html>
