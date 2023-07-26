<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

	<div data-simplebar class="h-100">

		<!--- Sidemenu -->
		<div id="sidebar-menu">
			<!-- Left Menu Start -->

			<ul class="metismenu list-unstyled" id="side-menu">
				<?php $level = session()->get('level'); ?>

				<?php if ($level == 1) : ?>

					<?= $this->include('partials/sidebar-role/admin') ?>
				<?php elseif ($level == 2) : ?>
					<?= $this->include('partials/sidebar-role/unit') ?>
				<?php elseif ($level == 3) : ?>
					<?= $this->include('partials/sidebar-role/kapolsek') ?>
				<?php else : ?>
					<?= $this->include('partials/sidebar-role/satuan') ?>
				<?php endif; ?>

			</ul>
		</div>
		<!-- Sidebar -->
	</div>
</div>
<!-- Left Sidebar End -->
