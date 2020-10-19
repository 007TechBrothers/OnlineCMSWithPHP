<?php include_once "include_user/header_user.php" ?>
<?php include_once "include_user/nav_user.php" ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
                <?php 
                    if (isset($_GET['post_id'])) {
                       $post_id = escape($_GET['post_id']);

                       $sql ="SELECT * FROM post WHERE post_id = $post_id ";
                        $result = mysqli_query($con, $sql);
                        confirm_query($result);
                        $row = mysqli_fetch_assoc($result);
                        $post_cat_id = escape($row['post_cat_id']);
                        $post_id = escape($row['post_id']);
                        $post_title = escape($row['post_title']);
                        $post_author = escape($row['post_author']);
                        $post_image = basename($row['post_image']);
                        $post_tag = escape($row['post_tag']);
                        $post_date = escape($row['post_date']);
                        $post_content = escape($row['post_content']);

                    }
                    else{
                        header('location:index.php');
                    }
                ?>
                <!-- Title -->
                <h1><?php echo "$post_title"; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <?php echo "$post_author"; ?>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo "$post_date"; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo "$post_content"; ?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
<?php 
    if (isset($_POST['comment_submit'])) {
        $comment_author = escape($_POST['comment_author']);
        $comment_email = escape($_POST['comment_email']);
        $comment_content = escape($_POST['comment_content']);
        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
            $sql = "INSERT INTO comment(comment_post_id, comment_author, comment_email, comment_content, comment_date) 
                    VALUES ($post_id, '$comment_author', '$comment_email', '$comment_content', now())";
            $result = mysqli_query($con, $sql);
            confirm_query($result);
            echo "Your comment is successfully. Please Wait For Approve";
        }
        else{
            echo "<script> alert('Fail can not be blank') </script>";
        }
    }

?>
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="username" class="control-label">User Name</label>
                            <input type="text" name="comment_author" class="form-control" placeholder="Enter Your Name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" name="comment_email" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <label for="comment" class="control-label">Please Enter Your Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="comment_submit">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <h2 class="media-heading">Approved Comments:</h2>
                    <hr>
                <?php 
                    $sql = "SELECT * FROM comment WHERE comment_post_id = $post_id AND comment_status = 'approved'";
                    $result = mysqli_query($con, $sql);
                    confirm_query($result);
                    while ($row = mysqli_fetch_assoc($result)) :
                        $comment_author = $row['comment_author'];
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                 ?>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo "$comment_author"; ?>
                            <small><?php echo "$comment_date"; ?></small>
                        </h4>
                        <?php echo "$comment_content"; ?>
                    </div>
                    <hr>
                <?php endwhile; ?>
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <?php include_once "include_user/sidebar_user.php" ?>  

                <!-- Side Widget Well -->
                <?php include_once "include_user/widget_user.php" ?>  
            </div>

        </div>
        <!-- /.row -->

        <hr>

<?php include_once "include_user/footer_user.php" ?>   