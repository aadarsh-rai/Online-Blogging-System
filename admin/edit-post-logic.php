<?php

  require 'config/db.php';

  //? Making sure that the edit post button was clicked
  if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = filter_var($_POST['thumbnail']);
    
    //? set is_featured to 0 if it was unchecked
    $is_featured = $is_featured == 1 ?: 0;

    //? checking and validating the input values
    if(!$title){
      $_SESSION['edit-post'] = "Invalid From Input";
    }elseif(!$category_id){
      $_SESSION['edit-post'] = "Invalid From Input";
    }elseif(!$body){
      $_SESSION['edit-post'] = "Invalid From Input";
    }else{
      //? deleting the existing thumbnail if the new thumbnail is available
      if($thumbnail['name']){
        $previous_thumbnail_path = '../images/' . $previous_thumbnail_name;
        if($previous_thumbnail_path){
          unlink($previous_thumbnail_path);
        }

        //? Working on the new thumbnail
        //? renaming the image
        $time = time(); //?making each image unique using current timestap
        $thumnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/' . $thumbnail_name;

        //? making sure that the file is an image
        $allowed_files = ['png','jpg','jpeg'];
        $extension = explode('.', $thumbnail_name);
        $extension = end($extension);
        if(in_array($extension, $allowed_files)){
          //? making sure that the avatar is not too large than 2mb
          if($thumbnail['size'] < 2000000){
            //? upload the avatar
            move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
          }else{
            $_SESSION['edit-post'] = "Thumbnail size is more than 2mb. Could not update the post.";
          }
        }else{
          $_SESSION['edit-post'] = "Thumbnail should be png , jpg or in jpeg format";
        }
      }
    }

    if($_SESSION['edit-post']){
      //? redirecting to manage form page if the form was invalid
      header('location: ' . ROOT_URL . 'admin/');
      die();
    }else{
      //? set is_featured of all post to 0 if is_featured for this post is 1
      if($is_featured == 1){
        $zero_all_is_featured_query = "UPDATE posts SET is_featured = 0";
        $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
      }

      //? set thumbnail if a new one was uploaded, else keep the old thumbnail name
      $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;

      $query = "UPDATE posts SET title = '$title', body = '$body', thumbnail = '$thumbnail_to_insert', category_id = $category_id, is_featured = $is_featured WHERE id=$id LIMIT 1";
      $result = mysqli_query($connection, $query);
    }

    if(!mysqli_errno($connection)){
      $_SESSION['edit-post-success'] = "Post updated successfully";
    }
  }

  header('location: ' . ROOT_URL . 'admin/')

?>