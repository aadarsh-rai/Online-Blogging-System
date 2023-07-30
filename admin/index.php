<?php 

  include 'partials/header.php';

  //? fetching the current user's post from the database 
  $current_user_id = $_SESSION['user-id'];
  $query = "SELECT id, title, category_id FROM posts WHERE author_id=$current_user_id ORDER BY id DESC";
  $posts =  mysqli_query($connection,$query);

?> 

<main>
  <section class="dashboard">
    <?php if(isset($_SESSION['add-post-success'])) : //?? display the output if adding the post was successfull in the admin dashboard ?>
      <div class="success-message success container" >
        <p>
          <?= $_SESSION['add-post-success'];
          unset($_SESSION['add-post-success']);
          ?>
        </p>
      </div>
    <?php elseif(isset($_SESSION['edit-post-success'])) : //?? display the output if editing the post was successfull in the admin dashboard ?>
      <div class="success-message success container" >
        <p>
          <?= $_SESSION['edit-post-success'];
          unset($_SESSION['edit-post-success']);
          ?>
        </p>
      </div>
    <?php elseif(isset($_SESSION['edit-post'])) : //?? display the output if editing the post was NOT successfull in the admin dashboard ?>
      <div class="alert-message error container" >
        <p>
          <?= $_SESSION['edit-post'];
          unset($_SESSION['edit-post']);
          ?>
        </p>
      </div>
      <?php elseif(isset($_SESSION['delete-post-success'])) : //?? display the output if delete the post was  successfull in the admin dashboard ?>
      <div class="success-message success container" >
        <p>
          <?= $_SESSION['delete-post-success'];
          unset($_SESSION['delete-post-success']);
          ?>
        </p>
      </div>
    <?php endif ?> 
    <div class="container dashboard-container">
      <aside>
        <ul>
          <li>
            <a href="add-post.php">
              <i class="fa-solid fa-pencil"></i>
              <h5>Add Post</h5>
            </a>
          </li>
          <li>
            <a href="index.php" class="dashboard-active">
              <i class="fa-solid fa-list-check"></i>
              <h5>Manage Post</h5>
            </a>
          </li>

          <?php if(isset($_SESSION['user_is_admin'])) : ?>
          <li>
            <a href="add-user.php">
              <i class="fa-solid fa-user-plus"></i>
              <h5>Add User</h5>
            </a>
          </li>
          <li>
            <a href="manage-users.php">
              <i class="fa-solid fa-users-line"></i>
              <h5>Manage Users</h5>
            </a>
          </li>
          <li>
            <a href="add-category.php">
              <i class="fa-regular fa-pen-to-square"></i>
              <h5>Add Category</h5>
            </a>
          </li>
          <li>
            <a href="manage-categories.php" class="active">
              <i class="fa-solid fa-list"></i>
              <h5>Manage Category</h5>
            </a>
          </li>

          <?php endif ?>

          </ul>
        </aside>
        <div class="main-table" >
          <h2>Manage Users</h2>
          <?php if(mysqli_num_rows($posts) > 0) : ?> 
          <table>
            <thead>
              <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php while($post = mysqli_fetch_assoc($posts)) : ?>
                <!--//? getting category title of each post from categories table -->
                <?php
                  $category_id = $post['category_id'];
                  $category_query = "SELECT title FROM categories WHERE id=$category_id";
                  $category_result = mysqli_query($connection, $category_query);
                  $category = mysqli_fetch_assoc($category_result);
                ?>
              <tr>
                <td><?= $post['title'] ?></td>
                <td><?= $category['title'] ?></td>
                <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id'] ?>" class="edit-button sm" >Edit</a></td>
                <td><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id'] ?>" class="delete-button sm" >Delete</a></td>
              </tr> 
              <?php endwhile ?>             
            </tbody>
          </table>
          <?php else : ?>
            <div class="alert-message error">
              <?= "No posts are found" ?>
            </div>
          <?php endif ?>  
        </div>
      </div>
    </section>
  </main>

  <!-- ?? -------------------- FOOTER SECTION ----------------- -->

  <footer>
    <section class="footer-socials" >
      <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
      <a href="https://instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a>
      <a href="https://discord.com" target="_blank"><i class="fa-brands fa-discord"></i></a>
      <a href="https://linkedin.com" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
      <a href="https://twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></a>
      <a href="https://youtube.com" target="_blank"><i class="fa-brands fa-youtube"></i></a>
    </section>

    <div class="container footer-container">
      <article>
        <h4>Catergories</h4>
        <ul>
          <li><a href="">Art % Lifestyle</a></li>
          <li><a href="">Travel & Tourism</a></li>
          <li><a href="">Anime & Manga</a></li>
          <li><a href="">Science & Technology</a></li>
          <li><a href="">Wild-Life</a></li>
          <li><a href="">Food & Drinks</a></li>
        </ul>
      </article>

      <article>
        <h4>Permalinks</h4>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="post.php">Blog</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </article>

      <article>
        <h4>Support</h4>
        <ul>
          <li><a href="">Call Numbers</a></li>
          <li><a href="">Email</a></li>
          <li><a href="">Online Support</a></li>
          <li><a href="">Social Support</a></li>
          <li><a href="">Location</a></li>
        </ul>
      </article>
    </div>

    <section class="footer-copyright">
      <small>Copyright &copy | Username</small>
    </section>
  </footer>
  <script src="../js/script.js"></script>
</body>
</html>