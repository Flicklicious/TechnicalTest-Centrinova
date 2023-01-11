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
                                        <h3 class="card-title text-center">Data Article</h3>
                                        <a class="btn btn-primary float-left" href="<?= base_url('admin/list-article/input-article') ?>"><i class="fas fa-plus"></i> Tambah</a>
                                        <br><br><br>
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
                                        <table id="tabel-data" class="table table-bordered table-striped">

                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th class="col-md-1">No</th>
                                                <th class="">Title</th>
                                                <th>Post</th>
                                                <th class="col-md-2">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                                    $i = 1;
                                                     foreach($record as $row)
                                                     {
                                                        $PostId = $row->PostId;
                                                        $DeleteArticle = base_url("admin/list-article/?action=delete&PostId=$PostId");
                                                        $EditArticle = base_url("admin/list-article/edit/$PostId");
                                                        $ListComments = base_url("admin/list-comments/$PostId");
                                                    ?>
                                            <tr>
                                                
                                                        <td class="col-md-1"><?php echo $i; ?></td>
                                                        
                                                        <td><?php echo $row->PostTitle; ?></td>

                                                        <td><a href="<?php echo base_url("index/post-detail/")?>/<?php echo $PostId; ?>" target="_blank">Link Post</a></td>

                                                        <td class="col-md-1">
                                                        <a class="btn btn-sm btn-success" href="<?php echo $ListComments; ?>"><i class="fas fa-comments"></i></a>
                                                        <a class="btn btn-sm btn-warning" href="<?php echo $EditArticle; ?>"><i class="far fa-edit"></i></a> 
                                                        <a class="btn btn-sm btn-danger" onclick="return confirm('Delete This Data?')" href="<?php echo $DeleteArticle; ?>"><i class="fa fa-trash-alt"></i></a>
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