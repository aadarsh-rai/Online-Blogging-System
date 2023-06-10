<?php 

  include 'partials/header.php';

?> 

  <!-- ?? -------------------- MAIN SECTION ----------------- -->

  <main>
    <section class="form-selection">
      <div class="container form-section-container">
        <h2>Add Category</h2>
        <div class="alert-message error" >
          <p>This is an error message</p>
        </div>
        <form action="" enctype="multipart/form-data">
          <input type="text" placeholder="Title">
          <textarea rows="5" placeholder="Description"></textarea>
          <button class="add-category-submit-button" type="submit" >Add Category</button>
        </form>
      </div>
    </section>
  </main>

  <?php

  include' ../partials/footer.php'

?>