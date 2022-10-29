<?= $this->extend('layouts/default'); ?>

<?= $this->section('main_content'); ?>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="my-3 text-center">
                    <h2> CRUD Application
                        <hr class="text-denger">
                    </h2>


                </div>
                <div class="card rounded">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-8">
                                <a href="<?php echo base_url('insert'); ?>" class="btn btn-success btn-lg rounded mb-2">Add Record</a>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-sm-end">
                                    <div class="input-group">
                                        <!-- <input type="text" class="form-control" placeholder="Search Records" name='q' value='' aria-describedby="button-addon2">
                                    <button class="btn btn-primary" type="Submit" id="button-addon2">Search</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th style="min-width: 10px">Sr. #</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($users)) : ?>
                                        <h4><br /> No Record Found</h4>
                                    <?php else :  ?>
                                        <?php $i = 1;
                                        foreach ($users as $user) : ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $user['name'] ?></td>
                                                <td><?php echo $user['email'] ?></td>
                                                <td><?php echo $user['mobile'] ?></td>
                                                <td><?php echo $user['address'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('editData/' . $user['id']);  ?>" class="btn btn-primary rounded mx-1">Edit</a>
                                                    <!-- <a href="<?php // echo base_url('delete/' . $user['id']);  
                                                                    ?>" class="btn btn-danger rounded mx-1">Delete</a> -->
                                                    <button id="" class="confirm_delo btn btn-danger rounded mx-1" value="<?= $user['id']; ?>">Delete</button>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        $('.confirm_delo').click(function(e) {
            e.preventDefault();
            var id = $(this).val();
            // console.log(id);

            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this record",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: "delete/" + id,
                            dataType: "json",
                            success: function(response) {
                                swal({
                                    title: response.status,
                                    text: response.status_text,
                                    icon: response.status_icon,
                                    button: "ok",
                                }).then((confirmed) => {
                                    window.location.reload();
                                });
                            }
                        });
                    } else {
                        swal({
                            title: "Cancelled",
                            text: "Record Not Deleted",
                            icon: "success",
                            // buttons: true,
                            // swal("Record Not Deleted");
                        })
                    }
                });
        });
    });
</script>

<?= $this->endSection() ?>