<?= $this->extend('layouts/default');  ?>

<?= $this->section('main_content');  ?>



<?php
$validation = \config\Services::validation();
// print_r($validation->getError('naam'));
?>


<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-8">
                                <a href="<?php echo base_url('/'); ?>" class="btn btn-danger btn-md rounded">Back</a>
                            </div>
                            <div class="col-sm-4">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="container-fluid">
                                <form action="<?php echo base_url('insert'); ?>" method="POST">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" id="name" name="name" class="form-control <?= $validation->getError('name') ? "is-invalid" : '' ?>" value="<?php echo set_value('name'); ?>" required>
                                                <?php if (($validation->getError('name'))) :  ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo $validation->getError('name'); ?>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="mb-3">
                                                <label for="mobile" class="form-label">Mobile#</label>
                                                <input type="text" id="mobile" name="mobile" class="form-control <?= $validation->getError('mobile') ? "is-invalid" : '' ?>" value="<?php echo set_value('mobile'); ?>" required>
                                                <?php if (($validation->getError('mobile'))) :  ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo $validation->getError('mobile'); ?>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="text" id="email" name="email" class="form-control <?= $validation->getError('email') ? "is-invalid" : '' ?>" value="<?php echo set_value('email'); ?>" required>
                                                <?php if (($validation->getError('email'))) :  ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo $validation->getError('email'); ?>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" id="address" name="address" class="form-control <?= $validation->getError('address') ? "is-invalid" : '' ?>" value="<?php echo set_value('address'); ?>" required>
                                                <?php if (($validation->getError('address'))) :  ?>
                                                    <div class="invalid-feedback">
                                                        <?php echo $validation->getError('address'); ?>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="insert_ok btn btn-lg btn-dark">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?= $this->endsection();  ?>
