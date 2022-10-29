<?= $this->extend('layouts/default');  ?>

<?= $this->section('main_content');  ?>

<?php
// $validation = \config\Services::validation();
// print_r($validation->getError('name'));
// echo '<pre>';
// print_r($row);
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
                                <form action="<?php echo base_url('updateData/' . $row['id']);    ?>" method="POST">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="mb-3">
                                                <label for="mobile" class="form-label">Mobile#</label>
                                                <input type="text" id="mobile" name="mobile" class="form-control" value="<?php echo $row['mobile']; ?> " required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="text" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?> " required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" id="address" name="address" class="form-control" value="<?php echo $row['address']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endsection();  ?>