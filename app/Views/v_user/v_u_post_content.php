<!DOCTYPE html>
<html lang="en">
    <?php include '../app/views/v_user/v_u_head.php'; ?>
    <body>
        <!-- Menu -->
        <?php include '../app/views/v_user/v_u_menu.php'; ?>
        
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?php echo base_url('uploads'); ?>/<?php echo $PostContent['PostThumbnail']; ?>">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <!-- <h1><?php //echo $PostContent['PostTitle']; ?></h1> -->
                            <!-- <h2 class="subheading"><?php //echo $PostContent['PostDescription']; ?></h2> -->
                            <!-- <span class="meta">
                                Posted by
                                <a href="#!"><?php //echo $PostContent['Username']; ?></a>
                                on <?php //$date = $PostContent['PostTime']; echo date("F d, Y", strtotime($date));?>
                            </span> -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article id="post-detail" class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <h1><?php echo $PostContent['PostTitle']; ?></h1>
                            <span class="meta">
                                Posted by
                                <a href="#!"><?php echo $PostContent['Username']; ?></a>
                                on <?php $date = $PostContent['PostTime']; echo date("F d, Y", strtotime($date));?>
                            </span>
                        <img class="img-thumbnail w-100" src="<?php echo base_url('uploads'); ?>/<?php echo $PostContent['PostThumbnail']; ?>" alt="thumbnail">
                        <?php echo $PostContent['PostContent']; ?>
                        
                    </div>
                </div>
                <!-- All Comments -->
                <?php foreach($record as $row) {?>
                <div id="commentSection" class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['CommentName']; ?></h5><small>Posted On <?php $date = $row['CommentPostTime']; echo date("F d, Y", strtotime($date));?></small>
                        <p class="card-text"><?php echo $row['CommentContent']; ?></p>
                        
                    </div>
                </div>
                <br>
                <?php }?>
                <!-- Pager-->
                <?php echo $pager->links('dt', 'datatable'); ?>
                    
                    <!-- Form Comments -->
                    <form method="POST" action="<?= base_url('storeComment') ?>">
                        <div class="row">
                            <div class="form-group col">
                                <label>Nama</label>
                                <input class="form-control" type="text" name="CommentName" placeholder="Nama" required>
                            </div>

                            <div class="form-group col">
                                <label>Email</label>
                                <input class="form-control" type="email" name="CommentEmail" placeholder="Email" required>
                            </div>

                            <input type="hidden" name="CommentPostId" value="<?php echo $PostContent['PostId']; ?>">
                        </div>
                            <br>
                            <div class="form-group">
                                <label>Komen</label>
                                <textarea class="form-control" name="CommentContent" rows="4" placeholder="Isi komen disini" required></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                    <input class="btn btn-primary form-control" type="submit" value="Kirim" name="save">
                            </div>
                    </form>
            </div>
        </article>
        <?php include '../app/views/v_user/v_u_footer.php'; ?>
        <?php include '../app/views/v_user/v_u_js.php'; ?>
    </body>
</html>