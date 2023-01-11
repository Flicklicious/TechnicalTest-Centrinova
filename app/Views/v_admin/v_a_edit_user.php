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
                                    <h1>Edit Profile</h1>
                                </div>
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                    <?php
                                        $session =\Config\Services::session();
                                        if ($session->getFlashdata('warning'))
                                        {
                                        ?>
                                        <div class="alert alert-warning">
                                            <ul>
                                            <?php
                                            foreach($session->getFlashdata('warning') as $val)
                                            {?>
                                            <li><?php echo $val; ?></li>
                                            <?php 
                                            }
                                            ?>
                                            </ul>
                                        </div>
                                        <?php
                                        }
                                        if($session->getFlashdata('success'))
                                        {?>
                                            <div class="alert alert-success">
                                                <?php echo $session->getFlashdata('success') ?>
                                            </div>
                                        <?php
                                        }
                                    ?>
                                        <form method="post" action="" enctype="multipart/form-data">
                                       
                                        <div class="form-group">
                                        <label class="">Username</label>
                                        <input class="form-control" type="text" name="Username" placeholder="" value="<?php echo(isset($Username))?$Username: ""; ?>">
                                        </div>

                                        <div class="form-group">
                                        <label class="">Full Name</label>
                                        <input class="form-control" type="text" name="FullName" placeholder="" value="<?php echo(isset($FullName))?$FullName: ""; ?>">
                                        </div>

                                        <div class="form-group">
                                        <label class="">Email</label>
                                        <input class="form-control" type="Email" name="Email" placeholder="" value="<?php echo(isset($Email))?$Email: ""; ?>">
                                        </div>
                                        
                                        <div class="form-group">
                                        
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