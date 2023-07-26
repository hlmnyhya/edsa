<?= $this->include('partials/main') ?>

<head>

	<?= $title_meta ?>
	<!-- Bootstrap Css -->
	<link href="<?= base_url('assets/libs/select2/css/select2.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet') ?>" type="text/css">
	<link href="<?= base_url('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') ?>" rel="stylesheet">

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
							<form action="dataakun/save" method="post">
								<?= csrf_field(); ?>
								<div class="card-body">
									<div class="row mb-3">
										<label for="example-text-input" class="col-sm-2 col-form-label">Nama Anggota</label>
										<div class="col-sm-10">
											<select class="form-control" name="name">
												<option selected disabled>Pilih nama anggota</option>
												<?php foreach ($anggota as $anggota ) : ?>
													<option value="<?= $anggota['nm_anggota'] ?>"><?= $anggota['nm_anggota'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="row mb-3">
										<label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
										<div class="col-sm-10">
											<input class="form-control" type="text" name="email" id="example-text-input">
										</div>
									</div>
									<div class="row mb-3">
										<label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
										<div class="col-sm-10">
											<input class="form-control" type="text" ccc name="password" id="example-text-input">
										</div>
									</div>
									<div class="row mb-3">
										<label class="col-sm-2 col-form-label">Level</label>
										<div class="col-sm-10">
											<select class="form-select" name="level" aria-label="Default select example" required>
												<option selected disabled>Pilih Level</option>
												<option value="1">Admin</option>
												<option value="2">Unit</option>
												<option value="3">Kapolsek</option>
												<option value="4">Satuan</option>
											</select>
										</div>
									</div>



									<div class="d-flex justify-content-end">
										<a href="<?= base_url('dataakun') ?>" type="submit" class="btn btn-success waves-effect waves-light me-2">Kembali</a>
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
<script src="<?= base_url('assets/libs/select2/js/select2.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/spectrum-colorpicker2/spectrum.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') ?>"></script>

<script src="<?= base_url('assets/js/pages/form-advanced.init.js') ?>"></script>

</body>

</html>
