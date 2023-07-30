<?php

  require 'config/db.php';

  if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //? updating the category_id of post which belongs to this category to id of uncategorized category
    $update_query = "UPDATE posts SET category_id=7 WHERE category_id=$id";
    $update_result = mysqli_query($connection, $update_query);

    if(!mysqli_errno($connection)){
    //?deleting one category
    $query = "DELETE FROM categories WHERE id = $id LIMIT 1";
    $result = mysqli_query($connection,$query);
    $_SESSION['delete-category-success'] = "One Category has been successfully deleted";
    }
  }

  header("location: " . ROOT_URL . 'admin/manage-categories.php');
?>