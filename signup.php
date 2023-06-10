<?php
  require 'config/constants.php';

  //? getting back the form data if there is a registration error
  $firstname = $_SESSION['signup-data']['firstname'] ?? null;
  $lastname = $_SESSION['signup-data']['lastname'] ?? null;
  $username = $_SESSION['signup-data']['username'] ?? null;
  $email = $_SESSION['signup-data']['email'] ?? null;
  $createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
  $confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;

  //? deletes signup data session
  unset($_SESSION['signup-data']);

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
        <h2>Sign Up</h2>
        <?php
          if(isset($_SESSION['signup'])) : ?>
            <div class="alert-message error" >
              <p>
                <?= $_SESSION['signup'];
                unset($_SESSION['signup']);
                ?>
              </p>
            </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
          <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
          <input type="text" name="lastname" value="<?= $lastname ?>"  placeholder="Last Name">
          <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
          <input type="email" name="email" value="<?= $email  ?>" placeholder="Email">
          <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Create password">
          <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm Password">
          <div class="form-control" >
            <label for="avatar">Choose your picture</label>
            <input type="file" name="avatar" id="avatar">
          </div>
          <button class="signup-submit-button" name="submit" type="submit" >Sign up</button>
          <small>Already have an account? <a href="login.php">Login</a></small>
        </form>
      </div>
    </section>
  </main>
</body>
 </html>