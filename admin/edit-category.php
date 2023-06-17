<?php 

  include 'partials/header.php';
  
  if(isset($_GET['id'])){
    //? fetching category from the database
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM categories WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) == 1 ){
      $category = mysqli_fetch_assoc($result);
    }

  }else{
    header('location: ' . ROOT_URL . 'admin/manage-categories.php');
    die();
  }

?> 
  <!-- //?? -------------------- MAIN SECTION ----------------- -->

  <main>
    <section class="form-selection">
      <div class="container form-section-container">
        <h2>Update Category</h2>
        <form action="<?= ROOT_URL ?>admin/edit-category-logic.php" method="POST">
          <input type="hidden" name="id" value="<?= $category['id']?>">  
          <input type="text" name="title" value="<?= $category['title']?>" placeholder="Title">
          <textarea rows="5" name="description" placeholder="Description"><?= $category['description']?></textarea>
          <button class="add-category-submit-button" name="submit" type="submit" >Update Category</button>
        </form>
      </div>
    </section>
  </main>

  <?php

  include '../partials/footer.php'

?>