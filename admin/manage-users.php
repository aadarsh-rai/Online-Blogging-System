<?php 

  include 'partials/header.php';

  //? fetching/displaying user from database(user table) expect the current user
  $current_admin_id = $_SESSION['user-id'];

  $query = "SELECT * FROM users WHERE NOT id=$current_admin_id";
  $users = mysqli_query($connection, $query);

?> 

  <main>
    <section class="dashboard" >
    
    <?php if(isset($_SESSION['add-user-success'])) : //?? display the output if adding new user was successfull in the admin dashboard?>
        <div class="success-message success container" >
          <p>
            <?= $_SESSION['add-user-success'];
            unset($_SESSION['add-user-success']);
            ?>
          </p>
        </div>

      <?php elseif(isset($_SESSION['edit-user-success'])) : //?? display the output if updating the user was successfull in the admin dashboard ?>
      <div class="success-message success container" >
        <p>
          <?= $_SESSION['edit-user-success'];
          unset($_SESSION['edit-user-success']);
          ?>
        </p>
      </div> 
      
      <?php elseif(isset($_SESSION['edit-user-error'])) : //?? display the output if updating the user was NOT successfull in the admin dashboard ?>
      <div class="alert-message error container" >
        <p>
          <?= $_SESSION['edit-user-error'];
          unset($_SESSION['edit-user-error']);
          ?>
        </p>
      </div>

      <?php elseif(isset($_SESSION['delete-user-success'])) : //?? display the output if deleting the user was successfull in the admin dashboard ?>
      <div class="success-message success container" >
        <p>
          <?= $_SESSION['delete-user-success'];
          unset($_SESSION['delete-user-success']);
          ?>
        </p>
      </div>  

      <?php elseif(isset($_SESSION['delete-user-error'])) : //?? display the output if deleting the user was NOT successfull in the admin dashboard ?>
      <div class="alert-message error container" >
        <p>
          <?= $_SESSION['delete-user-error'];
          unset($_SESSION['delete-user-error']);
          ?>
        </p>
      </div>
      
      <?php elseif(isset($_SESSION['add-category-success'])) : //?? display the output if deleting the user was successfull in the admin dashboard ?>
      <div class="success-message success container" >
        <p>
          <?= $_SESSION['add-category-success'];
          unset($_SESSION['add-category-success']);
          ?>
        </p>
      </div>  

      <?php elseif(isset($_SESSION['add-category-error'])) : //?? display the output if deleting the user was NOT successfull in the admin dashboard ?>
      <div class="alert-message error container" >
        <p>
          <?= $_SESSION['add-category-error'];
          unset($_SESSION['add-category-error']);
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
              <a href="manage-users.php" class="dashboard-active">
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
          <?php if(mysqli_num_rows($users) > 0) : ?>
          <table>
            <thead>
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Admin</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php while($user = mysqli_fetch_assoc($users)) : ?>
                <td><?= "{$user['firstname']} {$user['lastname']}" ?></td> <!-- //? displays the firstname adn lastname in the admin dashboard of manage users -->
                <td><?= $user['username'] ?></td> <!-- //? displays the username in the admin dashboard of manage users -->
                <td>
                  <div>
                    <a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?= $user['id'] ?>" class="edit-button sm" >Edit</a>
                  </div>
                </td>
                <td>
                  <div>
                    <a href="<?= ROOT_URL ?>admin/delete-user.php?id=<?= $user['id'] ?>" class="delete-button sm" >Delete</a>
                  </div>
                </td>
                <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td> <!-- //? check if the user is admin or not -->
              </tr>
              <?php endwhile ?>
            </tbody>
          </table>
          <?php else : ?>
            <div class="alert-message error">
              <?= "No users are found" ?>
            </div>
          <?php endif ?>
        </div>
      </div>
    </section>
  </main>

  <?php

  include '../partials/footer.php';
?>