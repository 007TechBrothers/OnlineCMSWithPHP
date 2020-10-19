<?php include_once "include_admin/admin_header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include_once "include_admin/admin_nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Post</small>
                        </h1>
                        <?php 
                            if(isset($_GET['source'])){
                                $source = escape($_GET['source']);
                            }else{
                                $source = '';
                            }

                            switch ($source) {
                                case 'add_post':
                                    include_once "include_admin/post_crud/add_post.php";
                                    break;
                                case 'edit_post':
                                    include_once "include_admin/post_crud/edit_form.php";
                                    break;
                                default:
                                    include_once "include_admin/post_crud/view_all_post.php";
                                    break;
                            }
                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include_once "include_admin/admin_footer.php" ?>