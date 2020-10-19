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
                            <small>Home</small>
                        </h1>
                    </div>
                    <div class="col-lg-6">
                    <p>You can see latest five posts in the dashboard.
                        <a href="post.php">See More</a>
                    </p>
    <table class="table-bordered table table-responsive">
        <tr class="bg-success">
            <th>Title</th>
            <th>Image</th>
            <th>Content</th>
        </tr>
        <?php 

            $sql ="SELECT * FROM post ORDER BY post_id DESC LIMIT 0,5";
            $result = mysqli_query($con, $sql);
            confirm_query($result);
            while ($row = mysqli_fetch_assoc($result)):
                $post_title = escape($row['post_title']);
                $post_image = basename($row['post_image']);
                $post_content = escape($row['post_content']);

        ?>

        <tr>
            
            <td><?php echo "$post_title"; ?></td>
            <td><img src="../images/<?php echo "$post_image"; ?>" class="img-responsive" width="100px"></td>
            <td>
                <?php echo substr($post_content, 0 ,50); ?>
                <?php echo strlen($post_content) > 50 ? '...' : '' ?>           
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
                    </div>
                    <div class="col-lg-6">
                        <p>There are many categories in following list.
                            <a href="admin_categories.php">View Detail</a>
                        </p>
    <table class="table table-bordered">
       <tr class="bg-primary">
            <th>Category List</th>
        </tr>
    <?php 

      $sql = "SELECT * FROM categories ORDER BY cat_id DESC";

      $result = mysqli_query($con, $sql);
      confirm_query($result);
      while ($row = mysqli_fetch_assoc($result)):
        $cat_title = escape($row['cat_title']);
    ?>
    <tr>
      <td><?php echo "$cat_title"; ?></td>
    </tr>
    <?php 
      endwhile;
    ?>
</table>
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