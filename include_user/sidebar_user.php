
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form method="post" action="search.php">
                        <div class="input-group">
                            <input type="text" name="post_tag" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" name="search">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                <div class="well">
                    <h4>Log In Form</h4>
                    <legend></legend>
                    <form method="post" action="include_user/login.php">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Enter Username">
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" placeholder="Enter your password">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit" name='login'>
                                    Log In
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php 

                                  $sql = "SELECT * FROM categories ORDER BY cat_id DESC";

                                  $result = mysqli_query($con, $sql);
                                  confirm_query($result);
                                  while ($row = mysqli_fetch_assoc($result)):
                                    $cat_id = escape($row['cat_id']);
                                    $cat_title = escape($row['cat_title']);
                                ?>
                                <li><a href="post_categories.php?cat_id=<?php echo "$cat_id"; ?>"><?php echo "$cat_title"; ?></a>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>