<!DOCTYPE html>
<html lang="en">
<?php include '../app/views/v_admin/v_a_head.php'; ?>
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="card-body">
                            
                            <!--<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
                            
                                <div class="p-5">
                                    <div class="text-center">
                                        <h5 class="h4 text-black-900 ">Skill Test Centrinova</h5>
                                    </div>
                                    <div class="text-center">
                                        <h5 class="h4 text-gray-900 ">PT. Centrinova Solusi Edukasi</h5>
                                    </div>
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
                                    <form class="user" method="POST" action="">
                                        <div class="form-group">
                                            <label for="inputUsername">Username:</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="inputUsername"
                                                placeholder="Username" name="Username" value="<?php if($session->getFlashdata('username')) echo $session->getFlashdata('username')?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputPassowrd">Password:</label>
                                            <input type="password" class="form-control form-control-user"
                                                id="inputPassword" placeholder="Password" name="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="inputRememberPassword" name="RememberMe" value="1">
                                                <label class="custom-control-label" for="inputRememberPassword">Remember
                                                    Password</label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Login" />
                                        <hr>
                                    </form>
                                    
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('admin/forgot-password')?>">Forgot Password?</a>
                                    </div>
                                    
                                </div>
                            
                            
                    </div>
                </div>

            </div>

        </div>

    </div>

<?php include '../app/views/v_admin/v_a_js.php'; ?>
</body>

</html>