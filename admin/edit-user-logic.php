<?php

  require 'config/db.php';

  if(isset($_POST['submit'])){
    //? getting update form data
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['user-role'], FILTER_SANITIZE_NUMBER_INT);

    //? checking for the valid input
    if(!$firstname || !$lastname){
      $_SESSION['edit-user-error'] = "Invalid Form Input";
    } else{
      //? update user
      $query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', is_admin = $is_admin WHERE id = $id LIMIT 1";
      $result = mysqli_query($connection,$query);

      if(mysqli_errno($connection)){
        $_SESSION['edit-user-error'] = "Error occured to update the user";
      } else{
        $_SESSION['edit-user-success'] = "User $firstname $lastname is updated successfully";
      }
    }
  }

  header('location: ' . ROOT_URL . 'admin/manage-users.php');
  die();
?>