<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    body {
        background-image: url('<?= base_url('assets/images/logo2.png'); ?>');
        background-size: cover;
        background-position: center;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card bg-warning">
                <div class="card-body">
                    <h4 class="text-center" style="font-weight: bold;">LOGIN</h4>
                    <hr>
                    <?php if (session()->getFlashdata('success')) { ?>
                        <div class="alert alert-success">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                    <?php } ?>

                    <?php if (session()->getFlashdata('error')) { ?>
                        <div class="alert alert-danger">
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php } ?>

                    <?= form_open('login'); ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <center><button class="btn btn-dark">Login</button></center>
                    </div>
                  
                    <?= form_close(); ?>

                </div>

            </div>
          
        </div>
    </div>
</div>

<?= $this->endSection() ?>
