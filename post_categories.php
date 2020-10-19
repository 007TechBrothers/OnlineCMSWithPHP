<?php include_once "include_user/header_user.php" ?>
<?php include_once "include_user/nav_user.php" ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php 
                    if (isset($_GET['cat_id'])) :
                        $cat_id = intval($_GET['cat_id']);
                        $sql ="SELECT * FROM post WHERE post_cat_id = $cat_id ORDER BY post_id DESC";
                        $result = mysqli_query($con, $sql);
                        confirm_query($result);
                        if (mysqli_num_rows($result) >0) {
                        
                        while ($row = mysqli_fetch_assoc($result)):
                            $post_cat_id = escape($row['post_cat_id']);
                            $post_id = escape($row['post_id']);
                            $post_title = escape($row['post_title']);
                            $post_author = escape($row['post_author']);
                            $post_image = basename($row['post_image']);
                            $post_date = escape($row['post_date']);
                            $post_tag = escape($row['post_tag']);
                            $post_content = escape($row['post_content']);

                ?>
                <!-- Blog Post -->
                <h2>
                    <a href="post.php?post_id=<?php echo "$post_id"; ?>"><?php echo "$post_title"; ?></a>
                </h2>
                <p class="lead">
                    by <?php echo "$post_author"; ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo "$post_date"; ?></p>
                <hr>
                <img class="img-responsive" height="300" width="500" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p>
                    <?php echo substr($post_content, 0 ,50); ?>
                    <?php echo strlen($post_content) > 50 ? '...' : '' ?>     
                </p>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo "$post_id"; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php 
                    endwhile; 
                    }
                    else{
                        echo "<p>There is no posts<p>";
                    }
                    endif; ?>
               

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
                
            </div>
            

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <?php include_once "include_user/sidebar_user.php" ?>  

                <!-- Side Widget Well -->
                <?php include_once "include_user/widget_user.php" ?>  


            </div>

        </div>
<?php include_once "include_user/footer_user.php" ?>    