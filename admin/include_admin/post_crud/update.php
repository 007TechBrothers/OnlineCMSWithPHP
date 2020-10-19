<?php 
    require_once "../db.php";
    require_once "../../functions.php";
 ?>

<?php 
 
if(isset($_POST['update'])){
    $post_id = (int)$_POST['post_id'];
    $post_cat_id = (int)$_POST['post_cat_id'];
    $post_title = escape($_POST['post_title']);
    $post_author = escape($_POST['post_author']);
    $post_tag = escape($_POST['post_tag']);
    $post_content = escape($_POST['post_content']);

    $post_image_name = basename($_FILES['post_image']['name']);
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    if (empty($post_image_name) || $post_image_name == '') {
      $sql = "SELECT post_image FROM post WHERE post_id=$post_id";
      $select_image = mysqli_query($con, $sql);
      confirm_query($select_image);
      $post_image_name = mysqli_fetch_row($select_image)[0];
    }
    move_uploaded_file($post_image_temp, '../../../images/'.$post_image_name);

    if($post_title != null){
      $sql = "UPDATE post SET 
                      post_cat_id=$post_cat_id,
                      post_title='$post_title', 
                      post_author='$post_author',
                      post_date=now() ,
                      post_image='$post_image_name', 
                      post_tag='$post_tag',
                      post_content='$post_content' ";
      $sql .= "WHERE post_id = $post_id ";

      $result = mysqli_query($con, $sql);
      confirm_query($result);
    }
    else {
      header('location: ../../post.php');
    }
    
  }

  header('location: ../../post.php');
 ?>
 