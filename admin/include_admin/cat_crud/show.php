
<table class="table table-condensed">
   <tr>
        <th>ID</th>
        <th>Category Title</th>
    </tr>
    <?php 

      $sql = "SELECT * FROM categories ORDER BY cat_id DESC";

      $result = mysqli_query($con, $sql);
      confirm_query($result);
      while ($row = mysqli_fetch_assoc($result)):
        $cat_id = escape($row['cat_id']);
        $cat_title = escape($row['cat_title']);
    ?>
    <tr>
      <td><?php echo "$cat_id"; ?></td>
      <td><?php echo "$cat_title"; ?></td>
      <td><a href="admin_categories.php?edit=<?php echo "$cat_id"; ?>" class="btn btn-warning">Edit</a></td>
      <td>
        <a class="btn btn-danger confirm_delete" href="include_admin/cat_crud/delete.php?delete=<?php echo "$cat_id"; ?>" >Delete</a>
      </td>
    </tr>
    <?php 
      endwhile;
    ?>
</table>

