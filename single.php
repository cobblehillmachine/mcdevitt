<?php get_header(); ?>
<div class="blog skinny-cont above-footer single">  
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="center"><strong><?php the_time('F d') ?></strong> | Posted In <strong>
			<?php $categories = get_the_category();
			$separator = ', ';
			$output = '';
			if ( ! empty( $categories ) ) {
			    foreach( $categories as $category ) {
			        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
			    }
			    echo trim( $output, $separator );
			} ?>
		</strong></div>
		<h2 class="center"><?php the_title() ?></h2>
		<?php the_post_thumbnail('large') ?>
		<?php the_content() ?>
		
	<?php endwhile; wp_reset_query(); ?>
</div>
<?php get_footer(); ?>
