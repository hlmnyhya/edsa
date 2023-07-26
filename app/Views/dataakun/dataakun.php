<?= $this->include('partials/main') ?>

<head>

    <?= $title_meta ?>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- Begin page -->
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

                                <div class="d-flex justify-content-end">
                                    <!-- <h4 class="card-title">Datatable Editable</h4> -->
                                    <a href="tambah_dataakun" type="button" class="btn btn-primary waves-effect waves-light mb-3">
                                        <i class="ri-add-fill align-middle me-2"></i> Tambah Data Akun
                                    </a>
                                </div>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="width:1px">No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th style="width:1px">Aksi</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                        $nomor = 0;
                                        foreach ($tampilData as $akun) :
                                            $nomor++;
                                        ?>
                                        <tr>
                                            <td><?= $nomor; ?></td>
                                            <td><?= $akun['name']; ?></td>
                                            <td><?= $akun['email']; ?></td>
                                            <td><?= $akun['password']; ?></td>
                                            <td>
                                                <?php if ($akun['level'] == '1') : ?>
                                                    Admin
                                                <?php elseif ($akun['level'] == '2') : ?>
                                                    Unit
                                                <?php elseif ($akun['level'] == '3') : ?>
                                                    Kapolsek
                                                <?php elseif ($akun['level'] == '4') : ?>
                                                    Satuan
                                                <?php else : ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td class="d-flex">
                                                    <a href="dataakun/edit/<?= $akun['id']; ?>" class="btn btn-outline-warning btn-sm me-2" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <button onclick="confirmText('<?= base_url('dataakun/' . $akun['id']); ?>')" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

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

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<script src="assets/js/app.js"></script>
<script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="assets/js/pages/sweet-alerts.init.js"></script>

<script>
    <?php if (session()->getFlashdata('success')) : ?>
        // window.onload()
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "<?= session()->getFlashdata('success') ?>",
            showConfirmButton: false,
            timer: 2200,
        });
    <?php endif; ?>


    function confirmText(url) {
        Swal.fire({
            title: 'Apa anda yakin?',
            text: "Setelah data dihapus, data tidak bisa dikembalikan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            customClass: {
                confirmButton: 'btn btn-primary me-3',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>

</body>

</html>