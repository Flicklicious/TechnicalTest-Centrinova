<!DOCTYPE html>
<html lang="en">
<?php include '../app/views/v_admin/v_a_head.php'; ?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include'../app/views/v_admin/v_a_menu.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include'../app/views/v_admin/v_a_topbar.php'; ?>

                <section class="page-section">
                    <div class="container-fluid ">
                        <div class="row justify-content-center">
 
                            <div class="col-md-8">
                                <div class="text-center">
                                    <h1>Input User</h1>
                                </div>
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <form method="post" action="<?= base_url('store-user') ?>" enctype="multipart/form-data">

                                        <div class="form-group">
                                        <label class="">Username</label>
                                        <input class="form-control" type="text" name="Username" placeholder="">
                                        </div>

                                        <div class="form-group">
                                        <label class="">Password</label>
                                        <input class="form-control" type="password" name="Password" placeholder="" minlength="6">
                                        </div>

                                        <div class="form-group">
                                        <label class="">Full Name</label>
                                        <input class="form-control" type="text" name="FullName" placeholder="">
                                        </div>

                                        <div class="form-group">
                                        <label class="">Email</label>
                                        <input class="form-control" type="Email" name="Email" placeholder="">
                                        </div>

                                        <div class="form-group">
                                        <a class="btn btn-secondary" href="<?php echo base_url('admin/list-user') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                                        <input class="btn btn-primary" type="submit" value="Submit" name="save">
                                        </div>
                                        </form>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </section>

                



            </div>
            <?php include '../app/views/v_admin/v_a_footer.php'; ?>
        </div>
<?php include '../app/views/v_admin/v_a_js.php'; ?>
</body>

</html>