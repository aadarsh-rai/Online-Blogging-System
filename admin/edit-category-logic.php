<?php

  require 'config/db.php';

  if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    //?Validating the input
    if(!$title || !$description){
      $_SESSION['edit-category'] = "Invalid form input in the update category page";
    }else{
      $query = "UPDATE categories SET title = '$title', description = '$description' WHERE id = $id LIMIT 1";
      $result = mysqli_query($connection, $query);

      //?checking if there is any error on the connection to the database after updating the category
      if(mysqli_errno($connection)){
        $_SESSION['edit-category-error'] = "Could not update category";
      }else{
        $_SESSION['edit-category-success'] = "Category $title is updated successfully";
      }
    }
  }

  header('location: ' . ROOT_URL . 'admin/manage-categories.php');
  die();

?>