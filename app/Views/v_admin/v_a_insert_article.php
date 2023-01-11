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
                        <div class="row justify-content-center"> 

                            <div class="col-md-8">
                                <div class="text-center">
                                    <h1>Tambah Data Article</h1>
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
                                    <label class="">Judul</label>
                                    <input class="form-control" type="text" name="PostTitle" value="<?php echo(isset($PostTitle))?$PostTitle: "" ?>">
                                    </div>

                                    <div class="form-group">
                                    <label class="">Status</label>
                                    <select class="form-control" name="PostStatus">
                                        <option value="active <?php echo(isset($PostStatus) && $PostStatus=='active')?"Selected": "" ?>" >Aktif</option>
                                        <option value="inactive <?php echo(isset($PostStatus) && $PostStatus=='inactive')?"Selected": "" ?>">Tidak Aktif</option>
                                    </select>
                                    </div>

                                    <div class="form-group">
                                    <label class="">Thumbnail</label>
                                    <input class="form-control" type="file" name="PostThumbnail">
                                    </div>

                                    <div class="form-group">
                                    <label class="">Deskripsi</label>
                                    <textarea rows="2" class="form-control" name="PostDescription"><?php echo(isset($PostDescription))?$PostDescription: '' ?></textarea>
                                    </div>

                                    <div class="form-group">
                                    <label class="">Content</label>
                                    <textarea id="summernote" rows="4" class="form-control" name="PostContent"><?php echo(isset($PostContent))?$PostContent: '' ?></textarea>
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
        <script>
            $('#summernote').summernote({
                tabsize: 2,
                height: 200
            });
        </script>
<?php include '../app/views/v_admin/v_a_js.php'; ?>
</body>

</html>