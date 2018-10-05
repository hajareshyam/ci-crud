<main role="main" class="container" style="padding-top: 100px;">
  <div class="row">
  	<h1>Edit Blog</h1>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="" method="post" class="form">
            <div class="form-group">
              <label for="exampleFormControlInput1">Blog title</label>
              <input type="text" name="title" class="form-control" id="blog-title" value="<?php echo isset($blog['blog_title']) ? $blog['blog_title']  : ''; ?>" placeholder="Blog title">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Blog Description</label>
              <textarea name="content" class="form-control" id="blog-description" rows="3" placeholder="Blog Description"><?php echo isset($blog['blog_description']) ? $blog['blog_description']  : ''; ?></textarea>
            </div>
            <input type="submit" name="blogSubmit" class="btn btn-primary" value="Submit"/>

            <!-- <button class="btn btn-primary">Add</button> -->
          </form>
        </div>
      </div>
    </div>
  </div>
</main>