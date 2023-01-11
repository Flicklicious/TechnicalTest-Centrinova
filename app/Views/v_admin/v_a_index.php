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

                                <?php include'../app/views/v_admin/v_a_dashboard.php'; ?>

                    </section>



            </div>
            <?php include '../app/views/v_admin/v_a_footer.php'; ?>
        </div>
<?php include '../app/views/v_admin/v_a_js.php'; ?>
</body>


</html>