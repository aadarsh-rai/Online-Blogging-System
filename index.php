<?php 

  include 'partials/header.php';

  //? fetching the featured post from the database
  $featured_query = "SELECT * FROM posts WHERE is_featured=1";
  $featured_result = mysqli_query($connection,$featured_query);
  $featured = mysqli_fetch_assoc($featured_result);

  //? fetching 6 post from the post table;
  $query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 6";
  $posts = mysqli_query($connection, $query);
?> 

<main>
  <!-- //?? -------------------- FEATURED POST SECTION ----------------- -->

  //? showing the  featured post if there is any
  <?php if(mysqli_num_rows($featured_result) == 1) : ?>
  <section class="featured-post">
    <div class="container featured-container">
      <div class="post-thumbnail">
        <img src="images/<?= $featured['thumbnail'] ?>" alt="">
      </div>
      <div class="post-info">
        <?php
          //?fetching category from the vategories table using category_id of the post table
          $category_id = $featured['category_id'];
          $category_query = "SELECT * FROM categories WHERE id=$category_id";
          $category_result = mysqli_query($connection, $category_query);
          $category = mysqli_fetch_assoc($category_result);
        ?>
        <a href="<?= ROOT_URL ?>category-post.php?id=<?= $featured['category_id'] ?>" class="category-button"><?= $category['title'] ?></a>
        <h2 class="post-title" ><a href="<?= ROOT_URL ?>post.php?id=<?= $featured['id'] ?>"><?= $featured['title'] ?></a></h2>
        <p class="post-body">
          <?=substr($featured['body'],0,250)?>...
        </p>
        <div class="post-author">
          <?php
            //? Fetching the authour from the users table using author_id
            $author_id = $featured['author_id'];
            $author_query = "SELECT * FROM users WHERE id=$author_id";
            $author_result = mysqli_query($connection, $author_query);
            $author = mysqli_fetch_assoc($author_result);
          ?>
          <div class="post-author-avatar">
            <img src="images/<?= $author['avatar'] ?>" alt="">
          </div>
          <div class="post-author-info">
            <h5>By: <?= "{$author['firstname']} {$author['lastname']}"?></h5>
            <small><?= date("M d, Y - H:i", strtotime($featured['date_time'])) ?></small>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endif ?>
    <!-- //?? -------------------- MINI POST SECTION ----------------- -->

  <section class="posts">
    <div class="container posts-container">
      <?php while($post = mysqli_fetch_assoc($posts)) : ?>
        <article class="post" >
          <div class="post-thumbnail">
            <img src="images/<?= $post['thumbnail'] ?>" alt="">
          </div>
          <div class="post-info">
          <?php
            //?fetching category from the vategories table using category_id of the post table
            $category_id = $post['category_id'];
            $category_query = "SELECT * FROM categories WHERE id=$category_id";
            $category_result = mysqli_query($connection, $category_query);
            $category = mysqli_fetch_assoc($category_result);
          ?>
            <a class="category-button" href="<?= ROOT_URL ?>category-post.php?id="<?= $post['category_id'] ?>><?= $category['title']?></a>
            <h3 class="post-title">
              <a href="post.php"><?= $post['title'] ?></a>
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

  include 'partials/footer.php'

?>
 
  