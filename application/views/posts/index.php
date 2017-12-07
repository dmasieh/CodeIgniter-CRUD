<h2><?= $title ?></h2>
<br>
<?php foreach ($posts as $post) : ?>
	<div class="card">
	<div class="row">
  		<div class="col l4 m5">
    		<img class="materialboxed" width="400" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
  		</div>
  		<div class="col l7 offset-l1 m5 offset-m2">
  			<h3 class="center"><?php echo $post['title']; ?></h3>
    		<p><?php echo word_limiter($post['body'], 20); ?></p>
    		
    		<p>Edited on: <?php echo $post['created_at']; ?> in the <b><?php echo $post['name']; ?></b> Category</p>

    		<a class="btn btn-primary" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read More!</a>

        <br>
  		</div>
	</div>
	</div>
	<br>
<?php endforeach; ?>
<div class="pagination-links">
	<?php echo $this->pagination->create_links(); ?>
</div>