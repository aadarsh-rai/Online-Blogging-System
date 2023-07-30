<?php

  require 'config/db.php';

  if(isset($_GET['id'])){
    //? fetching user from database
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($connection,$query);
    $user = mysqli_fetch_assoc($result);

    //? making sure that only one user is fetched
    if(mysqli_num_rows($result) == 1){
     $avatar_name = $user['avatar'];
     $avatar_path = '../images/' . $avatar_name;
     //? deleting the image if the image is already there
     if($avatar_path){
      unlink($avatar_path);
     }
    }
    //!FOR LATER
    //?fetching all thumbnails of user's post and delete them
    $thumbnails_query = "SELECT thumbnail FROM posts WHERE author_id=$id";
    $thumbnails_result = mysqli_query($connection, $thumbnails_query);
    if(mysqli_num_rows($thumbnails_result) > 0){
      while($thumbnail = mysqli_fetch_assoc($thumbnails_result)){
        $thumbnail_path = '../images/' . $thumbnail['thumbnail'];
        
        //?deleting the thumbnail from the images folder
        if($thumbnail_path){
          unlink($thumbnail_path);
        }
      }
    }

    //!

    //? deleting user from the database
    $delete_user_query = "DELETE FROM users WHERE id = $id";
    $delete_user_result = mysqli_query($connection,$delete_user_query);
    if(mysqli_errno($connection)){
      $_SESSION['delete-user-error'] = "The User '{$user['firstname']} {$user['lastname']}' is not deleted";
    }else{
      $_SESSION['delete-user-success'] = "The User '{$user['firstname']} {$user['lastname']}' is deleted successfully";
    }
  }
  header('location: ' . ROOT_URL . 'admin/manage-users.php');
  die();

?>