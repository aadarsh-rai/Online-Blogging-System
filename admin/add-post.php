<?php 

  include 'partials/header.php';

  //? Displaying categories from the database
  $query = "SELECT * FROM categories";
  $categories = mysqli_query($connection,$query); 

  //? getting back the data if the form is invalid
  $title = $_SESSION['add-post-data']['title'] ?? null;
  $body = $_SESSION['add-post-data']['body'] ?? null;

  //? deleting the form data session
  unset($_SESSION['add-post-data']);

?> 

  <!-- ?? -------------------- MAIN SECTION ----------------- -->

  <main>
    <section class="form-selection">
      <div class="container form-section-container">
        <h2>Add Post</h2>
        <?php if(isset($_SESSION['add-post'])) : ?>
        <div class="alert-message error" >
          <p>
            <?= $_SESSION['add-post']; 
            unset($_SESSION['add-post']);
            ?>
          </p> 
        </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
          <input type="text" name="title" placeholder="Title" value="<?= $title ?>">
          <select name="category">
            <?php while($category = mysqli_fetch_assoc($categories)): ?>
            <option value="<?= $category['id']?>"><?= $category['title'] ?></option>
            <?php endwhile ?>
          </select>
          <textarea rows="5" name="body" placeholder="Body"><?= $body ?>"</textarea>
          <?php if(isset($_SESSION['user_is_admin'])): ?>
            <div class="form_control inline">
              <input type="checkbox" name="is_featured" id="is_featured"  value="1" checked>
              <label for="is_featured">Featured</label>
            </div>
          <?php endif ?>
          <div class="form-control">
            <label for="thumbnail">Add Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail">
          </div>
          <button type="submit" class="add-post-submit-button" name="submit" >Add Post</button>
        </form>
      </div>
    </section>
  </main>

  <?php

  include '../partials/footer.php';

?>