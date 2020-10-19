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
                    <small>Comment</small>
                </h1>
                <table class="table table-condensed">
                    <tr>
                        <th>ID</th>
                        <th>Author</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    <?php 
                        $sql = "SELECT * FROM comment ORDER BY comment_id DESC";
                        $result = mysqli_query($con, $sql);
                        confirm_query($result);
                        while ($row = mysqli_fetch_assoc($result)):
                            $comment_id = $row['comment_id'];
                            $comment_author = $row['comment_author'];
                            $comment_email = $row['comment_email'];
                            $comment_date = $row['comment_date'];
                            $comment_status = $row['comment_status'];

                     
                     ?>
                    <tr>
                        <td><?php echo "$comment_id"; ?></td>
                        <td><?php echo "$comment_author"; ?></td>
                        <td><?php echo "$comment_email"; ?></td>
                        <td><?php echo "$comment_date"; ?></td>
                        <td><?php echo "$comment_status"; ?></td>
                        <td><a href="comment.php?approve=<?php echo "$comment_id"; ?>" class="btn btn-success">Approve</a></td>
                        <td><a href="comment.php?unapprove=<?php echo "$comment_id"; ?>" class="btn btn-warning">Unapprove</a></td>
                        <td><a href="comment.php?delete=<?php echo "$comment_id"; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php endwhile; ?>
                </table>
                <?php 
                    if (isset($_GET['approve'])) {
                        $comment_id = intval($_GET['approve']);
                        $sql = "UPDATE comment SET comment_status='approved' WHERE comment_id = $comment_id";
                        $result = mysqli_query($con, $sql);
                        confirm_query($result);
                        header('location:comment.php');
                    }
                    if (isset($_GET['unapprove'])) {
                        $comment_id = intval($_GET['unapprove']);
                        $sql = "UPDATE comment SET comment_status='unapproved' WHERE comment_id = $comment_id";
                        $result = mysqli_query($con, $sql);
                        confirm_query($result);
                        header('location:comment.php');
                    }
                    if (isset($_GET['delete'])) {
                        $comment_id = intval($_GET['delete']);
                        $sql = "DELETE FROM comment WHERE comment_id = $comment_id";
                        $result = mysqli_query($con, $sql);
                        confirm_query($result);
                        header('location:comment.php');
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