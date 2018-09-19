    <main role="main" class="container" style="padding-top: 100px;">
      <a href="<?php echo BASE_URL('blogs/add'); ?>">Add Blog</a>

      <?php
         echo BASE_URL;
      ?>
      <div class="table">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Title</th>
              <th scope="col">Blog</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($blogs as $blog): ?>
              <tr>
                <th scope="row"><?php echo $blog['blog_id']; ?></th>
                <td><?php echo $blog['blog_title']; ?></td>
                <td><?php echo $blog['blog_description']; ?></td>
                <td><a href="">View</a> || <a href="">Edit</a> || <a href="">Delete</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>