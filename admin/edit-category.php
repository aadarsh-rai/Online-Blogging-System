<?php 

  include 'partials/header.php';

?> 
  <!-- ?? -------------------- MAIN SECTION ----------------- -->

  <main>
    <section class="form-selection">
      <div class="container form-section-container">
        <h2>Update Category</h2>
        <form action="" enctype="multipart/form-data">
          <input type="text" placeholder="Title">
          <textarea rows="5" placeholder="Description"></textarea>
          <button class="add-category-submit-button" type="submit" >Update Category</button>
        </form>
      </div>
    </section>
  </main>

  <?php

  include '../partials/footer.php'

?>