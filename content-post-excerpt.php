<div class="section blog-post">
	<div class="skinny-cont">
		<div class="center"><strong><?php the_time('F d') ?></strong> | Posted In <strong></strong></div>
		<h2 class="center"><?php the_title() ?></h2>
		<?php the_post_thumbnail('large') ?>
		<?php the_excerpt() ?>
		<p class="center"><a href="<?php the_permalink() ?>" class="button">Read More</a></p>
	</div>
</div>