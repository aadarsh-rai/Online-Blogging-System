<?php
  require 'config/constants.php';

  $username_email = $_SESSION['login-data']['username_email'] ?? null;
  $password = $_SESSION['login-data']['password'] ?? null;
  
  //? deletes signup data session
  unset($_SESSION['login-data']);
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
  <main>
    <section class="form-selection">
      <div class="container form-section-container">
        <h2>Login</h2>
        <?php if (isset($_SESSION['signup-success'])) : ?>
          <div class="success-message success" >
            <p>
              <?= $_SESSION['signup-success'];
              unset($_SESSION['signup-success']);
              ?>
            </p>
          </div>
        <?php elseif (isset($_SESSION['login'])) : ?>
          <div class="alert-message error" >
            <p>
              <?= $_SESSION['login'];
              unset($_SESSION['login']);
              ?>
            </p>
          </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>login-logic.php" method="POST">
          <input type="text" name="username_email" value="<?= $username_email ?>" placeholder="E-mail or Username">
          <input type="password" name="password" value="<?= $password ?>" placeholder=" Password">
          <button class="login-submit-button" name="submit" type="submit" >Login</button>
          <small>Don't have an account? <a href="signup.php">Sign Up</a></small>
        </form>
      </div>
    </section>
  </main>
</body> 
 </html>