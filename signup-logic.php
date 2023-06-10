<?php
  require 'config/db.php';

 //? getting signup form data if signup button was clicked

  if(isset($_POST['submit'])){
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar =$_FILES['avatar'];

    //? Validating/Checking the input values, if the input is empty

    if(!$firstname){
      $_SESSION['signup'] = "Please enter your Firstname";
    } elseif( !$lastname){
      $_SESSION['signup'] = "Please enter your Lastname";
    } elseif( !$username){
      $_SESSION['signup'] = "Please enter your username";
    } elseif( !$email){
      $_SESSION['signup'] = "Please enter your valid email";
    } //? Checking that password length should be of minimun fo 8 characters
      elseif( strlen($createpassword) < 8 || strlen($confirmpassword) < 8){
      $_SESSION['signup'] = "Password should be minimum of 8 characters";
    } elseif( !$avatar['name']){
      $_SESSION['signup'] = "Please add an avatar/image";
    } else {
      //? Checking if the password do not match each other 
      
      if($createpassword !== $confirmpassword){
        $_SESSION['signup'] = "Passwords do not match";
      } else{
        //? it will show hashed/Encrypted password in the database
        $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

        //? checking if the username or email already exist in the database
        $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' ";
        $user_check_result = mysqli_query($connection, $user_check_query);
          if(mysqli_num_rows($user_check_result) > 0 ){
            $_SESSION['signup'] = "Username or Email already exists";
          }else{

            //? if the username or email not taken in the database
            $time = time(); //? making each image name unique using current timestamp
            $avatar_name = $time . $avatar['name'];
            $avatar_tmp_name =$avatar['tmp_name'];
            $avatar_destination_path = 'images/' . $avatar_name;

            //? making sure that the file is an image
            $allowed_files = ['jpg', 'png' , 'jpeg'];
            $extention = explode('.', $avatar_name);
            $extention = end($extention);
              if(in_array($extention, $allowed_files)){
                //? making sure that the image is not too large than 2MB
                if($avatar['size'] < 1000000){
                //? upload the avatar
                move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                }else{
                $_SESSION['signup'] = 'File size is too big. It should be less than 2 mb';
                }
              }else{
            $_SESSION['signup'] = "File should be in (png,jpg, jpeg) Format";
            }
          }
        }
      }

      //? redirect back to the signup page if there is any problem
      if(isset($_SESSION['signup'])){
        //? pass form the data to singup page
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signup.php');
        die();
      } else{
        //? insert new users into users table in the database
        $insert_user_query = "INSERT INTO users SET firstname = '$firstname', lastname = '$lastname', username = '$username', email = '$email', password= '$hashed_password', avatar = '$avatar_name', is_admin = 0";
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if(!mysqli_errno($connection)){
          //? redirecting to login page with success message
          $_SESSION['signup-success'] = "Registration Successfull. Now you can login!";
          header('location: ' . ROOT_URL . 'login.php');
          die();
        }
      }

  }else{
    //?  if button was not clicked, it will return to sign up page
    header('location: ' . ROOT_URL . 'signup.php');
    die();
  } 
?>