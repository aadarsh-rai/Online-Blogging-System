<?php

  require 'config/db.php'; 

  //? fetching current user from the database
  if(isset($_SESSION['user-id'])){
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Blogging System</title>
  <!-- ?? Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&family=Poppins:wght@100;200;300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- ?? Fontawesome icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
  <header>
    <nav>
      <div class="container navbar-container">
        <a class="navbar-logo" href="<?= ROOT_URL ?>">BLOG</a>
        <ul class="navbar-items">
          <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
          <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
          <li><a href="<?= ROOT_URL ?>services.php">Services</a></li>
          <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
          <?php if(isset($_SESSION['user-id'])) : ?>
            <li class="navbar-profile">
            <div class="avatar">
              <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>">
            </div>
            <ul>
              <li><a href="<?= ROOT_URL ?>admin/index.php">Dashboard</a></li>
              <li><a  href="<?= ROOT_URL ?>logout.php">Logout</a></li>
            </ul>
          </li>
          <?php else : ?>
          <li><a href="<?= ROOT_URL ?>login.php">login</a></li>
          <?php endif ?>
        </ul>

        <button class="open-navbar-btn"><i class="fa-solid fa-bars"></i></button>
        <button class="close-navbar-btn"><i class="fa-sharp fa-solid fa-xmark"></i></button>
      </div>
    </nav>
  </header>
</body>
</html>
