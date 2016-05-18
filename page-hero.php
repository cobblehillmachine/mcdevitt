<?php
/**
 * Template Name: Template - Page with Hero
 * Description: Page Template with Hero
 *
 * @package WordPress
 * @subpackage themename
 */
 
 get_header() ?>
 <?php $hero_title = get_field('hero_title'); ?>
 
 <div class="hero mid-cont">
 	<?php the_post_thumbnail() ?>
 	<?php if ($hero_title) { ?>
	 	<h1><?php echo $hero_title ?></h1>
 	<?php } ?>
 </div>
 
<?php if (is_page('the-buyers-agent')) { ?>

	<div class="mid-cont section buyers-agent">
		<div class="table">
			<div class="table-cell half left">
				<h3><?php the_field('content_title') ?></h3>
				<?php the_field('content') ?>
			</div>
			<div class="table-cell half center">
				<ul class="gray deep-links">
					<li>Click below for details regarding:</li>
					<?php while( have_rows('bulletpoints') ): the_row(); 
					$title = get_sub_field('title');
					$slug = sanitize_title($title); ?>
						<li><a href="#<?php echo $slug ?>"><?php echo $title ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
		<div class="center bulletpoints">
			<?php while( have_rows('bulletpoints') ): the_row(); 
			$title = get_sub_field('title');
			$description = get_sub_field('description');
			$slug = sanitize_title($title); ?>
				<div id="<?php echo $slug ?>">
					<h4><?php echo $title ?></h4>
					<p><?php echo $description ?></p>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
<?php } else if (is_page('local-guide')) { ?>
	<div class="gray section mid-cont center">
		<div class="skinny-cont"><?php the_field('content') ?></div>
	</div>
	<div class="mid-cont center section">
		<h3><?php the_field('content_title') ?></h3>
		<div class="table section">
			<div class="table-cell"><?php get_template_part('content', 'town-map') ?></div>
			<div class="table-cell badges">
				<div class="table">
					<?php $badges = new WP_query(array('post_type' => 'Towns', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC')) ?>
					<?php while ( $badges->have_posts() ) : $badges->the_post();?>
						<a href="<?php the_permalink() ?>" class="inline-table badge" id="<?php echo($post->post_name) ?>">
							<img src="<?php the_field('badge') ?>">
							<h4 style="color: <?php the_field('color') ?>"><?php the_title() ?></h4>
						</a>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
	
<?php } else { ?>
 	<div class="skinny-cont center section hero-template">
	 	<h3><?php the_field('content_title') ?></h3>
		<?php the_field('content') ?>
	</div>
<?php } ?>
 

 
 <?php if (is_page('who-we-are')) { ?>
 <div class="who-we-are gray mid-cont above-footer">
	 <div class="table">
		 <div class="table-cell">
			 <h3 class="center">Who We Are</h3>
			 <?php the_field('who_we_are_copy') ?>
		 </div>
		 <div class="table-cell">
			 <img src="<?php the_field('who_we_are_image'); ?>">
		 </div>
	 </div>
	 
 </div>
 
 <?php } ?>
 
<?php if (is_page('the-mcdevitt-difference')) { ?>
 <div class="mcdevitt-difference gray mid-cont section above-footer">
	 <div class="table">
		 <?php while( have_rows('services') ): the_row(); 
			$icon = get_sub_field('icon');
			$title = get_sub_field('title');
			$description = get_sub_field('description'); ?>
	
			<div class="table-cell center">
				<img src="<?php echo $icon ?>">
				<h3><?php echo $title ?></h3>
				<p><?php echo $description ?></p>
			</div>
		<?php endwhile; ?>
	 </div>
	 <p class="center"><a href="/" class="button">List with us</a></p>
 </div>
 
 <?php } ?>
 
 
 <?php if (is_page('buyers')) { ?>
 <div class="buyers gray mid-cont section">
	 <div class="table">
		 <?php while( have_rows('cta_list') ): the_row(); 
			$icon = get_sub_field('icon');
			$link_text = get_sub_field('link_text');
			$link_to = get_sub_field('link_to'); ?>
	
			<a class="table-cell center" href="<?php echo $link_to ?>">
				<img src="<?php echo $icon ?>">
				<h3><?php echo $link_text ?></h3>
			</a>
		<?php endwhile; ?>
	 </div>
 </div>
 <div class="skinny-cont section center contact-cta above-footer">
	 <?php the_field('contact_cta') ?>
 </div>
 
 <?php } ?>
 
 
 <?php get_footer() ?>