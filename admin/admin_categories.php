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
                            <small>Categories</small>
                        </h1>
                         <div class="col-md-6">
                             <form action="include_admin/cat_crud/create.php" method="post">
                                <div class="form-group">
                                    <label class="control-label" for="">
                                        New Category
                                    </label>
                                    <input type="text" name="cat_title" class="form-control">
                                </div>
                                <input type="submit" name="create" value="Create Category" class="btn btn-primary">
                            </form>
<!-- Edit Category -->
<?php 

    if(isset($_GET['edit'])):
        $cat_id = escape($_GET['edit']);
        $sql = "SELECT * FROM categories WHERE cat_id = '$cat_id'";
        $result = mysqli_query($con, $sql);
        confirm_query($result);
        $row = mysqli_fetch_assoc($result);
        $cat_id = escape($row['cat_id']);
        $cat_title = escape($row['cat_title']);

?>
    <form action="include_admin/cat_crud/update.php" method="post">
        <div class="form-group">
            <label for="txtedit" class="control-label">
                Edit Category
            </label>
            <input type="hidden" name="cat_id" value="<?php echo $cat_id ?>">
            <input type="text" name="editname" class="form-control" value="<?php echo $cat_title ?>">
        </div>
        <input type="submit" name="update" value="Update Category" class="btn btn-primary">
    </form>

<?php endif; ?>
<!-- End Edit Category -->
                         </div>
                         <!-- Categories Table Show -->
                         <div class="col-md-6">
                             <?php include_once "include_admin/cat_crud/show.php" ?>

                         </div>
                         <!-- End Categories Table Show -->
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