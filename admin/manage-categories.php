<?php 

  include 'partials/header.php';

?> 

  <main>
    <section class="dashboard" >
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
          </ul>
        </aside>
        <div class="main-table" >
          <h2>Manage Categories</h2>
          <table>
            <thead>
              <tr>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Travel</td>
                <td>
                  <div>
                    <a href="edit-category.php" class="edit-button sm" >Edit</a>
                  </div>
                </td>
                <td>
                  <div>
                    <a href="delete-category.php" class="delete-button sm" >Delete</a>
                  </div>
                </td>
              </tr>

              <tr>
                <td>wild Life</td>
                <td>
                  <div>
                    <a href="edit-category.php" class="edit-button sm" >Edit</a>
                  </div>
                </td>
                <td>
                  <div>
                    <a href="delete-category.php" class="delete-button sm" >Delete</a>
                  </div>
                </td>
              </tr>
    
              <tr>
                <td>Science % Technology</td>
                <td>
                  <div>
                    <a href="edit-category.php" class="edit-button sm" >Edit</a>
                  </div>
                </td>
                <td>
                  <div>
                    <a href="delete-category.php" class="delete-button sm" >Delete</a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>

  <!-- ?? -------------------- FOOTER SECTION ----------------- -->

  <?php

  include '../partials/footer.php'

?>