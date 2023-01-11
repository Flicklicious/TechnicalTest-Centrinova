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
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <br><br>
                                <div class="card border-left-primary shadow h-100 py-2">

                                    <div class="card-body">
                                        <h3 class="card-title text-center">Data Comment</h3>
                                        <h4 class="card-title text-center"><?php echo $Post['PostTitle'];?></h4>
                                        <a class="btn btn-primary" href="<?= base_url('admin/list-article') ?>">Back</a>
                                        <br><br>
                                        <table id="tabel-data" class="table table-bordered table-striped">

                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>No</th>
                                                <th>Email</th>
                                                <th>Full Name</th>
                                                <th>Comment</th>
                                                <th>Comment Time</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                                    $i = 1;
                                                    foreach($comment as $row)
                                                    {
                                                        $id = $row['CommentId'];
                                                        $idPost = $Post['PostId'];
                                                        $DeleteArticle = base_url("admin/list-article/?action=delete&PostId=$id");
                                                        $DeleteUser = base_url("admin/list-comments/$idPost?action=delete&DeleteId=$id");
                                                        $date = $row['CommentPostTime'];
                                                        
                                                    ?>
                                            <tr>
                                                
                                                        <td><?php echo $i; ?></td>

                                                        <td><?php echo $row['CommentName']; ?></td>

                                                        <td><?php echo $row['CommentEmail']; ?></td>

                                                        <td><?php echo $row['CommentContent']; ?></td>

                                                        <td><?php echo date("F d, Y", strtotime($date)); ?></td>
                                                        
                                                        <td>
                                                            <a class="btn btn-danger" onclick="return confirm('Delete This Data?')" href="<?php echo $DeleteUser; ?>"><i class="fa fa-trash-alt"></i></a> 
                                                        </td>


                                                    
                                           </tr>
                                                     <?php $i++; } ?>
                                        </tbody>

                                    </table>
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