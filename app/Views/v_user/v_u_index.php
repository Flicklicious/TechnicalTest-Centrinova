<!DOCTYPE html>
<html lang="en">
    <?php include '../app/views/v_user/v_u_head.php'; ?>
    <body>
        <!-- Menu -->
        <?php include '../app/views/v_user/v_u_menu.php'; ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?php echo base_url('User'); ?>/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Technical Test</h1>
                            <span class="subheading">Created By Sumbai Distapratama</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div id="home" class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <?php foreach($record as $row) { $PostId = $row['PostId']; $PostDetail = base_url("index/post-detail/$PostId")?>
                    <div class="post-preview">
                        <a href="<?php echo $PostDetail;?>/#post-detail">
                            <h2 class="post-title "><?php echo $row['PostTitle']; ?></h2>
                            <!-- <img class="img-thumbnail w-100" src="<?php //echo base_url('uploads'); ?>/<?php //echo $row['PostThumbnail']; ?>" alt=""> -->
                            <h3 class="post-subtitle"><?php echo $row['PostDescription'] ?></h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!"><?php echo $row['Username']; ?></a>
                            on <?php $date = $row['PostTime']; echo date("F d, Y", strtotime($date));?>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <?php }?>
                    <!-- Pager-->
                    <?php echo $pager->links('dt', 'datatable'); ?>
                </div>
            </div>
        </div>
        <?php include '../app/views/v_user/v_u_footer.php'; ?>
        <?php include '../app/views/v_user/v_u_js.php'; ?>
    </body>
</html>
