<?php
  require 'config/db.php';
 
  if(isset($_POST['submit'])){
    //? getting the form data
    $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    if(!$username_email){
      $_SESSION['login'] = "Username or Email is required";
    }elseif (!$password){
      $_SESSION['login'] = "Password is required";
    } else{
      //? Fetching user from the database
      $fetch_user_query = "SELECT * FROM users WHERE username = '$username_email' OR  email = '$username_email'";
      $fetch_user_result = mysqli_query($connection, $fetch_user_query);

      if(mysqli_num_rows($fetch_user_result) == 1){
        //? Converting the record into assoc array
        $user_record = mysqli_fetch_assoc($fetch_user_result);
        $db_password = $user_record['password'];

        //? comparing that password with the database password
        if(password_verify($password, $db_password)){
          //? if password is true , sets session for access control
          $_SESSION['user-id'] = $user_record['id'];

          //? set session if the user is admin or not
          if($user_record['is_admin'] == 1){
            $_SESSION['user_is_admin'] = true;
          }

          //? logs the user in admin section
          header('location: ' . ROOT_URL . 'admin/');
        } else{
          $_SESSION['login'] = "Wrong password. Try Again!";
        }
      } else {
        $_SESSION['login'] = "User not found";
      }
    }
    //? if there is any problem, it will redirect back to the login page with login data
    if(isset($_SESSION['login'])){
      $_SESSION['login-data'] = $_POST;
      header('location: ' . ROOT_URL . 'login.php');
      die();
    } 
  }else{
    header('location: ' . ROOT_URL . 'login.php');
    die();
  }
?>