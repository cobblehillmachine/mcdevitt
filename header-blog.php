<?php $url = wp_get_attachment_url( get_post_thumbnail_id(27) ); ?>
 <div class="hero mid-cont">
 	<img src="<?php echo $url ?>">
 	<div class="category-list table">
	 	<div class="table-cell"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/out-and-about.png"></div>
	 	<?php $blog_categories = get_categories(array('hide_empty' => 0, 'exclude' => 1)) ?>
	 	<?php foreach ($blog_categories as $category) { ?>
		 	<div class="table-cell"><a href="/category/<?php echo $category->slug ?>"><?php echo $category->name ?></a></div>
	 	<?php } ?>
 	</div>
 </div>