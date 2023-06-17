<?php 

  include 'partials/header.php';

  //? getitng back the form data if it is invalid
  $title = $_SESSION['add-category-data']['title'] ?? null;
  $description = $_SESSION['add-category-data']['description'] ?? null;

  unset($_SESSION['add-category-data']);
?> 

  <!-- ?? -------------------- MAIN SECTION ----------------- -->

  <main>
    <section class="form-selection">
      <div class="container form-section-container">
        <h2>Add Category</h2>
        <?php if(isset($_SESSION['add-category'])) : ?>
          <div class="alert-message error" >
            <p>
            <?= $_SESSION['add-category'];
            unset($_SESSION['add-category']);
            ?>
            </p>
          </div>  

        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-category-logic.php" method="POST">
          <input type="text" name="title" value="<?= $title ?>" placeholder="Title">
          <textarea rows="5" name="description" value="<?= $description ?> placeholder="Description"></textarea>
          <button class="add-category-submit-button" name="submit" type="submit" >Add Category</button>
        </form>
      </div>
    </section>
  </main>
  <script src="../js/script.js"></script>

  <?php

  include' ../partials/footer.php'

?>