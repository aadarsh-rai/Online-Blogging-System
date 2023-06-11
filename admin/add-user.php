<?php 

  include 'partials/header.php';
  
  //? getitng back add-user form data if there is an error
  $firstname = $_SESSION['add-user-data']['firstname']?? null;
  $lastname = $_SESSION['add-user-data']['lastname']?? null;
  $username = $_SESSION['add-user-data']['username']?? null;
  $email = $_SESSION['add-user-data']['email']?? null;
  $createpassword = $_SESSION['add-user-data']['createpassword']?? null;
  $confirmpassword = $_SESSION['add-user-data']['confirmpassword']?? null;

  //? delete session data
  unset($_SESSION['add-user-data']);
?> 

  <main>
    <section class="form-selection">
      <div class="container form-section-container">
        <h2>Add User</h2>
        
        <?php if(isset($_SESSION['add-user'])) : ?>
          <div class="alert-message error" >
            <p>
              <?= $_SESSION['add-user'];
              unset($_SESSION['add-user']);
              ?>
            </p>
          </div>
        <?php endif ?>
        
        <form action="<?= ROOT_URL ?>/admin/add-user-logic.php" enctype="multipart/form-data" method="POST">
          <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
          <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name">
          <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
          <input type="email" name="email" value="<?= $email ?>" placeholder="Email">
          <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Create password">
          <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm Password">
          <select name="user-role">
            <option value="0">Author</option>
            <option value="1">Admin</option>
          </select>
          <div class="form-control" >
            <label for="avatar">Choose your picture</label>
            <input type="file" name="avatar" id="avatar">
          </div>
          <button class="add-user-submit-button" name="submit" type="submit">Add user</button>
        </form>
      </div>
    </section>
  </main>

  <?php

include '../partials/footer.php';

?>