<?php 

  include'partials/header.php';

?> 

  <!-- ?? -------------------- MAIN SECTION ----------------- -->

  <main>
    <section class="form-selection">
      <div class="container form-section-container">
        <h2>Edit User</h2>
        
        <form action="" enctype="multipart/form-data">
          <input type="text" placeholder="First Name">
          <input type="text" placeholder="Last Name">
          <select name="" id="">
            <option value="0">Author</option>
            <option value="1">Admin</option>
          </select>
          <button class="add-user-submit-button" type="submit">Update user</button>
        </form>

      </div>
    </section>
  </main>

  <?php

  include'../partials/footer.php'

?>