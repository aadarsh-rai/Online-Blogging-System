<?php 

  include'partials/header.php';

?> 

  <!-- ?? -------------------- MAIN SECTION ----------------- -->

  <main>
    <section class="form-selection">
      <div class="container form-section-container">
        <h2>Edit Post</h2>
        <div class="alert-message error" >
          <p>This is an error message</p>
        </div>
        
        <form action="" enctype="multipart/form-data">
          <input type="text" placeholder="Title">
          <select name="" id="">
            <option value="1">Travel % tours</option>
            <option value="1">Travel % tours</option>
            <option value="1">Travel % tours</option>
            <option value="1">Travel % tours</option>
            <option value="1">Travel % tours</option>
          </select>
          <textarea rows="5" placeholder="Body"></textarea>
          <div>
            <input type="checkbox" id="is-featured">
            <label for="is-featured">Featured</label>
          </div>
          <div class="form-control">
            <label for="thumbnail">Change Thumbnail</label>
            <input type="file" id="thumbnail">
          </div>
          <button class="add-post-submit-button" type="submit" >Update Post</button>
        </form>
      </div>
    </section>
  </main>

  