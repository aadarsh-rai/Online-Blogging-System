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
              <tr>
                <td>How does an owl fly slienty?</td>
                <td>Wild-life</td>
                <td>
                  <div>
                    <a href="edit-post.php" class="edit-button sm" >Edit</a>
                  </div>
                </td>
                <td>
                  <div>
                    <a href="delete-category.php" class="delete-button sm" >Delete</a>
                  </div>
                </td>
              </tr>

              <tr>
                <td>How does an owl fly slienty?</td>
                <td>Wild-life</td>
                <td>
                  <div>
                    <a href="edit-post.php" class="edit-button sm" >Edit</a>
                  </div>
                </td>
                <td>
                  <div>
                    <a href="delete-category.php" class="delete-button sm" >Delete</a>
                  </div>
                </td>
              </tr>

              <tr>
                <td>How does an owl fly slienty?</td>
                <td>Wild-life</td>
                <td>
                  <div>
                    <a href="edit-post.php" class="edit-button sm" >Edit</a>
                  </div>
                </td>
                <td>
                  <div>
                    <a href="delete-category.php" class="delete-button sm" >Delete</a>
                  </div>
                </td>
              </tr>

              <tr>
                <td>How does an owl fly slienty?</td>
                <td>Wild-life</td>
                <td>
                  <div>
                    <a href="edit-post.php" class="edit-button sm" >Edit</a>
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
</body>
</html>