<?php 

  require 'config/db.php';

  if(isset($_POST['submit'])){
    //?getting form data
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    //? if the input is invlaid
    if(!$title){
      $_SESSION['add-category'] = "Enter the title for your category";  
    }elseif(!$description){
      $_SESSION['add-category'] = "Enter the description";
    }

    //? redirecting back to the add category page if there was any wromng input 
    if(isset($_SESSION['add-category'])){
      $_SESSION['add-category-data'] = $_POST;
      header('location: ' . ROOT_URL . 'admin/add-category.php');
      die();
    } else{
      //?if htere was no error, it will insert the category data in the database
      $query = "INSERT INTO categories(title, description) VALUES('$title', '$description')";
      $result = mysqli_query($connection,$query);
      if(mysqli_errno($connection)){
        $_SESSION['add-category-error'] = "Could not add categroy";
        header('location: ' . ROOT_URL . 'admin/add-category.php');
        die();
      }else{
        $_SESSION['add-category-success'] = "$title Category is added successfully";
        header('location: ' . ROOT_URL . 'admin/manage-categories.php');
        die();
      }
    }
  }

?>