<!DOCTYPE html>
<html lang="en">
<?php include '../app/views/v_admin/v_a_head.php'; ?>
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-4">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        
                            
                            <div class="">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <!-- <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p> -->
                                    </div><br>
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

                                    <form class="user" method="post" action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address / Username" name="Username" value="<?php if($session->getFlashdata('Username')) echo $session->getFlashdata('Username') ?>" >
                                        </div>
                                        <!-- <a href="login.html" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </a> -->
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Reset Password">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('admin/login') ?>">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>
<?php include '../app/views/v_admin/v_a_js.php'; ?>
</html>