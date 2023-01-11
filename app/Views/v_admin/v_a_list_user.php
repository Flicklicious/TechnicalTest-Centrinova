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
                                        <h3 class="card-title text-center">Data User</h3>
                                        <a class="btn btn-primary float-left" href="<?= base_url('admin/list-user/input-user') ?>"><i class="fas fa-plus"></i> Tambah</a>
                                        <br><br><br>

                                        <table id="tabel-data" class="table table-bordered table-striped">

                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>No</th>
                                                <th>Email</th>
                                                <th>Full Name</th>
                                                <th>Last Login</th>
                                                <th>Date Created</th>
                                                <th>Created By</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                                    $i = 1;
                                                    foreach($result_user as $row)
                                                    {
                                                        $id = $row->IdUser;

                                                        $EditUSer = base_url("admin/edit-user/edit/$id");

                                                        $DeleteUser = base_url("admin/list-user/?action=delete&DeleteId=$id");
                                                        
                                                    ?>
                                            <tr>
                                                
                                                        <td><?php echo $i; ?></td>

                                                        <td><?php echo $row->Email; ?></td>

                                                        <td><?php echo $row->FullName; ?></td>

                                                       
                                                        <td><?php   if(!empty($row->LastLogin)){echo $row->LastLogin;}else echo "Not Login Yet"; ?></td>

                                                        <td><?php echo $row->CreatedDate; ?></td>

                                                        <td><?php echo $row->CreatedBy; ?></td>
                                                        
                                                        <td>
                                                            <a class="btn btn-warning" href="<?php echo $EditUSer; ?>"><i class="far fa-edit"></i></a>
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