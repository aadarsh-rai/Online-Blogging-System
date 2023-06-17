<?php 

  include 'partials/header.php';

  //?displaying the categories from the database to the admin dashboard
  $query = "SELECT * FROM categories ORDER BY title";
  $categories = mysqli_query($connection,$query);
  
?> 

  <main>
    <section class="dashboard" >
    <?php if(isset($_SESSION['add-category-success'])) : //?? display the output if adding the category was successfull in the admin dashboard ?>
      <div class="success-message success container" >
        <p>
          <?= $_SESSION['add-category-success'];
          unset($_SESSION['add-category-success']);
          ?>
        </p>
      </div>  

      <?php elseif(isset($_SESSION['add-category-error'])) : //?? display the output if adding the category was NOT successfull in the admin dashboard ?>
      <div class="alert-message error container" >
        <p>
          <?= $_SESSION['add-category-error'];
          unset($_SESSION['add-category-error']);
          ?>
        </p>
      </div>

      <?php elseif(isset($_SESSION['edit-category-success'])) : //?? display the output if updating the category was successfull in the admin dashboard ?>
      <div class="success-message success container" >
        <p>
          <?= $_SESSION['edit-category-success'];
          unset($_SESSION['edit-category-success']);
          ?>
        </p>
      </div>

      <?php elseif(isset($_SESSION['edit-category-error'])) : //?? display the output if updating the category was NOT successfull in the admin dashboard ?>
      <div class="alert-message error container" >
        <p>
          <?= $_SESSION['edit-category-error'];
          unset($_SESSION['edit-category-error']);
          ?>
        </p>
      </div>

      <?php elseif(isset($_SESSION['delete-category-success'])) : //?? display the output if deleting the category was successfull in the admin dashboard ?>
      <div class="success-message success container" >
        <p>
          <?= $_SESSION['delete-category-success'];
          unset($_SESSION['delete-category-success']);
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
              <a href="index.php">
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
              <a href="manage-categories.php" class="dashboard-active">
                <i class="fa-solid fa-list"></i>
                <h5>Manage Category</h5>
              </a>
            </li>

            <?php endif ?>

          </ul>
        </aside>
        <div class="main-table" >
          <h2>Manage Categories</h2>
          <?php if(mysqli_num_rows($categories) > 0) : ?>
          <table>
            <thead>
              <tr>
                <th>Travel</th>
                <th>Edit</a></th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php while($category = mysqli_fetch_assoc($categories)) : ?>
              <tr>
                <td><?= $category['title'] ?></td>
                <td>
                  <div>
                    <a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?= $category['id']?>" class="edit-button sm" >Edit</a>
                  </div>
                </td>
                <td>
                  <div>
                    <a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?= $category['id']?>" class="delete-button sm" >Delete</a>
                  </div>
                </td>
              </tr>
              <?php endwhile ?>
            </tbody>
          </table>
          <?php else : ?>
            <div class="alert-message error">
              <?= "No categories are found" ?>
            </div>
          <?php endif ?>
        </div>
      </div>
    </section>
  </main>

  <!-- ?? -------------------- FOOTER SECTION ----------------- -->

  <?php

  include '../partials/footer.php'

?>