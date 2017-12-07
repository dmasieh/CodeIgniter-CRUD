<h2><?= $title; ?></h2>
<ul class="collection"">
	<?php foreach ($categories as $category) : ?>
		<li class="collection-item"><a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>"><?php echo $category['name']; ?></a>
			
		</li>
	<?php endforeach; ?>
</ul>