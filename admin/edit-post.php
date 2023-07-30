<?php 

  include 'partials/header.php';
  
  //? fetching the categories from the database
  $category_query = "SELECT * FROM categories";
  $categories = mysqli_query($connection, $category_query);

  //?fetching post data form the database if id is set
  if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
  } else{
    header('location: ' . ROOT_URL . 'admin/');
    die();
  }

?> 

  <!-- ?? -------------------- MAIN SECTION ----------------- -->

  <main>
    <section class="form-selection">
      <div class="container form-section-container">
        <h2>Edit Post</h2>
        <div class="alert-message error" >
          <p>This is an error message</p>
        </div>
        
        <form action="<?= ROOT_URL ?>admin/edit-post-logic.php" enctype="multipart/form-data" method="POST">
          <input type="hidden" name="id" value="<?= $post['id'] ?>">
          <input type="hidden" name="previous_thumbnail_name" value="<?= $post['thumbnail'] ?>">
          <input type="text" name="title" value="<?= $post['title'] ?>" placeholder="Title">
          <select name="category">
            <?php while ($category= mysqli_fetch_assoc($categories)) : ?>
            <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
            <?php endwhile ?>
          </select>
          <textarea rows="5" name="body" placeholder="Body"><?= $post['body'] ?></textarea>
          <div>
            <input type="checkbox" name="is_featured" id="is-featured" value="1" checked>
            <label for="is-featured">Featured</label>
          </div>
          <div class="form-control">
            <label for="thumbnail">Change Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail">
          </div>
          <button class="add-post-submit-button" name="submit" type="submit" >Update Post</button>
        </form>
      </div>
    </section>
  </main>

  