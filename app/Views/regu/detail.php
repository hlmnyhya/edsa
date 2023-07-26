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

                <!-- start page title -->
                <?= $page_title ?>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <?php if (!empty($regu)) : ?>
                                <h4 class="card-title mb-4">Detail Regu</h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Nama Regu</th>
                                            <td><?= $regu[0]['nm_regu'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Shift</th>
                                            <td><?= $regu[0]['ket_jaga'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Anggota Regu</th>
                                            <td>
                                                <?php foreach ($regu as $data) : ?>
                                                    <?= $data['nm_anggota'] ?><br>
                                                <?php endforeach; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <div class="alert alert-danger" role="alert">
                                    Data Regu tidak ditemukan.
                                </div>
                            <?php endif; ?>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- container-fluid -->
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

</body>

</html>
