<?php 

  require 'config/db.php';

  if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //? Fetching the post from the database in order to delete thumbnail from imgaes floder
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);

    //?making sure that only 1 post is fetched
    if(mysqli_num_rows($result) == 1){
      $post = mysqli_fetch_assoc($result);
      $thumbnail_name = $post['thumbnail'];
      $thumbnail_path = '../images/' . $thumbnail_name;

      if($thumbnail_path){
        unlink($thumbnail_path);

        //? Deleting the post form the databse
        $delete_post_query = "DELETE FROM posts WHERE id=$id LIMIT 1";
        $delete_post_result = mysqli_query($connection,$delete_post_query);

        if(!mysqli_errno($connection)){
          $_SESSION['delete-post-success'] = "Post has been deleted succesfully";

        }
      }
    }
  }

  header('location: ' . ROOT_URL . 'admin/');
  die();
?>