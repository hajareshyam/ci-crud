<main role="main" class="container" style="padding-top: 100px;">
	<div class="container">
		<div class="row">
			<h1>Blog Details</h1>
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Blog Title</th>
						<th>Blog Description</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $blog['blog_id']; ?></td>
						<td><?php echo $blog['blog_title']; ?></td>
						<td><?php echo $blog['blog_description']; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</main>	