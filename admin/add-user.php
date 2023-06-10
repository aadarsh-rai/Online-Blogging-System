<?php 

  include 'partials/header.php';

?> 

  <main>
    <section class="form-selection">
      <div class="container form-section-container">
        <h2>Add User</h2>
        <div class="alert-message error" >
          <p>This is an error message</p>
        </div>
        
        <form action="" enctype="multipart/form-data">
          <input type="text" placeholder="First Name">
          <input type="text" placeholder="Last Name">
          <input type="text" placeholder="Username">
          <input type="email" placeholder="Email">
          <input type="password" placeholder="Create password">
          <input type="password" placeholder="Confirm Password">
          <select name="" id="">
            <option value="0">Author</option>
            <option value="1">Admin</option>
          </select>
          <div class="form-control" >
            <label for="avatar">Choose your picture</label>
            <input type="file" id="avatar">
          </div>
          <button class="add-user-submit-button" type="submit">Add user</button>
        </form>

      </div>
    </section>
  </main>

<?php

include '../partials/footer.php'

?>