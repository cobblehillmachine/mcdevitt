 <?php get_header() ?>
 
<?php get_header('blog') ?>

<div class="blog mid-cont">
	<?php while ( have_posts() ) : the_post();?>
		<?php get_template_part('content', 'post-excerpt') ?>              
	<?php endwhile; ?>  
	<?php wp_pagenavi(); ?>   
</div>
 
 
 
 <?php get_footer() ?>