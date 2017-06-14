<div class="section blog-post">
	<div class="skinny-cont">
		
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
		<?php the_excerpt() ?>
		<p class="center"><a href="<?php the_permalink() ?>" class="button">Read More</a></p>
	</div>
</div>