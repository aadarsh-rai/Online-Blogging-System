<?php

  include'partials/header.php';

  //? fetching the post if if is set
  if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE category_id=$id ORDER BY date_time DESC";
    $posts = mysqli_query($connection, $query);

  }else{
    header('location:' . ROOT_URL . 'blog.php');
    die();
  }

?>

  <main>
    <!-- //?? -------------------- CATEGORY TITLE SECTION ----------------- -->

    <section class="category-title" >
      <h2>
        <?php
          //?fetching category from the vategories table using category_id of the post table
          $category_id = $id;
          $category_query = "SELECT * FROM categories WHERE id=$id";
          $category_result = mysqli_query($connection, $category_query);
          $category = mysqli_fetch_assoc($category_result);
          echo $category['title'];
          ?>
      </h2>
      
    </section>

    <!-- //?? -------------------- MINI POST SECTION ----------------- -->

  <?php if(mysqli_num_rows($posts) > 0) : ?>
  <section class="posts">
    <div class="container posts-container">
      <?php while($post = mysqli_fetch_assoc($posts)) : ?>
        <article class="post" >
          <div class="post-thumbnail">
            <img src="images/<?= $post['thumbnail'] ?>" alt="">
          </div>
          <div class="post-info">
            <h3 class="post-title">
              <a href="<?=  ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
            </h3>
            <p class="post-body">
            <?= substr($post['body'], 0 ,200) ?>...
            </p>
            <div class="post-author">
              <?php
                //? Fetching the authour from the users table using author_id
                $author_id = $post['author_id'];
                $author_query = "SELECT * FROM users WHERE id=$author_id";
                $author_result = mysqli_query($connection, $author_query);
                $author = mysqli_fetch_assoc($author_result);
              ?>
              <div class="post-author-avatar">
                <img src="images/<?= $author['avatar'] ?>" alt="">
              </div>
              <div class="post-author-info">
                <h5>By: By: <?= "{$author['firstname']} {$author['lastname']}"?></h5>
                <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
              </div>
            </div>
          </div>
        </article>  
      <?php endwhile ?>      
    </div>
  </section>
  <?php else : ?>
    <div class="alert-message error">
      <p class="post-text">No posts are found in this <?= $category['title'] ?> category</p>
    </div>
  <?php endif ?>

    <!-- //?? -------------------- CATEGORIES SECTION ----------------- -->

    <section class="categories-buttons">
    <div class="container categories-buttons-container">
      <?php
        $all_categories_query = "SELECT * FROM categories";
        $all_categories = mysqli_query($connection,$all_categories_query);
      ?>
      <?php while($category = mysqli_fetch_assoc($all_categories)) : ?>
        <a class="category-button" href="<?= ROOT_URL ?>category-post.php?id=<?= $category['id'] ?>"><?= $category['title'] ?></a>
      <?php endwhile ?>
    </div>
  </section>
  </main>
 
  <?php

include 'partials/footer.php';

?>