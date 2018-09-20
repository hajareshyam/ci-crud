    <main role="main" class="container" style="padding-top: 100px;">
      <a href="<?php echo base_url('blogs/add'); ?>">Add Blog</a>
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
                <td>
                  <a href="<?php echo base_url('blogs/view/'.$blog['blog_id']); ?>">View</a> || 
                  <a href="<?php echo base_url('blogs/edit/'.$blog['blog_id']); ?>">Edit</a> || 
                  <a href="<?php echo base_url('blogs/delete/'.$blog['blog_id']); ?>" onclick="return confirm('Are you sure to delete?')" >Delete</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <?php echo $this->pagination->create_links();
 ?>
    </main>