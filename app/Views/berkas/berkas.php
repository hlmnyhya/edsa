<?= $this->include('partials/main') ?>

<head>

	<?= $title_meta ?>

	<!-- DataTables -->
	<link href="<?= base_url('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />

	<!-- Responsive datatable examples -->
	<link href="<?= base_url('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

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
						<?php $level = session()->get('level'); ?>

						<?php if ($level === '3'||$level === '1') : ?>
							<div class="card">
								<div class="card-body">

		

									<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
										<thead>
											<tr>
												<th style="width:1px">No</th>
												<th>Berkas</th>
												<th>Nama Berkas</th>
												<th>Folder</th>
												<th>Unit</th>
												<th>Aksi</th>
											
											</tr>
										</thead>


										<tbody>
											<?php
											$nomor = 0;
											foreach ($tampilData as $berkas) :
												$nomor++;
											?>
												<tr>
													<td><?= $nomor; ?></td>
													<td>
														<a href="<?= base_url('berkas/detail/' . $berkas['id']) ?>">
															<?= $berkas['berkas'] ?>
														</a>
													</td>
													<td><?= $berkas['nm_berkas'] ?></td>
													<td><?= $berkas['folder'] ?></td>
													<td><?= $berkas['simbol_unit'] ?></td>
													<td class="d-flex">
													
														<button onclick="confirmText('<?= base_url('berkas/' . $berkas['id']) ?>')" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i>
														</button>
													</td>
												</tr>

											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						<?php else : ?>
							<div class="card">
								<div class="card-body">

									<div class="d-flex justify-content-end">
										<a href="<?= base_url('tambah_berkas') ?>" type="button" class="btn btn-primary waves-effect waves-light mb-3">
											<i class="ri-add-fill align-middle me-2"></i> Tambah Data Berkas
										</a>
									</div>

									<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
										<thead>
											<tr>
												<th style="width:1px">No</th>
												<th>Berkas</th>
												<th>Nama Berkas</th>
												<th>Folder</th>
												<th>Unit</th>
												<th style="width:1px">Aksi</th>
											</tr>
										</thead>


										<tbody>
											<?php
											$nomor = 0;
											foreach ($tampilData as $berkas) :
												$nomor++;
											?>
												<tr>
													<td><?= $nomor; ?></td>
													<td>
														<a href="<?= base_url('berkas/detail/' . $berkas['id']) ?>">
															<?= $berkas['berkas'] ?>
														</a>
													</td>
													<td><?= $berkas['nm_berkas'] ?></td>
													<td><?= $berkas['folder'] ?></td>
													<td><?= $berkas['simbol_unit'] ?></td>
													<td class="d-flex">
														<a href="<?= base_url('berkas/edit/' . $berkas['id']) ?>" class="btn btn-outline-warning btn-sm me-2" title="Edit">
															<i class="fas fa-pencil-alt"></i>
														</a>
														<button onclick="confirmText('<?= base_url('berkas/' . $berkas['id']) ?>')" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i>
														</button>
													</td>
												</tr>

											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						<?php endif; ?>
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
<script src="<?= base_url('assets/libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Buttons examples -->
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/pdfmake/build/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/pdfmake/build/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') ?>"></script>

<script src="<?= base_url('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-select/js/dataTables.select.min.js') ?>"></script>

<!-- Responsive examples -->
<script src="<?= base_url('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>

<!-- Datatable init js -->
<script src="<?= base_url('assets/js/pages/datatables.init.js') ?>"></script>

<script src="<?= base_url('assets/js/app.js') ?>"></script>

<!-- Sweet alert init js-->
<script src="<?= base_url('assets/js/pages/sweet-alerts.init.js') ?>"></script>
<script src="<?= base_url('assets/js/app.js') ?>"></script>
<script src="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>

<!-- Sweet alert init js-->
<script src="<?= base_url('assets/js/pages/sweet-alerts.init.js') ?>"></script>

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
