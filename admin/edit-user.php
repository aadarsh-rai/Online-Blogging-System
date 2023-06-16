<?php 

  include 'partials/header.php';

  if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($connection,$query);
    $user = mysqli_fetch_assoc($result);
  } else{
    header('location :' . ROOT_URL . 'admin/manage-users.php');
    die();
  }
  

?> 

  <!-- //? -------------------- MAIN SECTION ----------------- -->

<main>
  <section class="form-selection">
    <div class="container form-section-container">
      <h2>Edit User</h2>
      
      <form action="<?= ROOT_URL ?>admin/edit-user-logic.php" method="post">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <input type="text" name="firstname" placeholder="First Name" value="<?= $user['firstname'] ?>">
        <input type="text" name="lastname" placeholder="Last Name" value="<?= $user['lastname'] ?>">
        <select name="user-role">
          <option value="0">Author</option>
          <option value="1">Admin</option>
        </select>
        <button class="add-user-submit-button" name="submit" type="submit">Update user</button>
      </form>

    </div>
  </section>
</main>

<?php

  include'../partials/footer.php'

?>