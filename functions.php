<?php
/**
 * @package WordPress
 * @subpackage themename
 */

// removes admin bar on wordpress home
add_filter( 'show_admin_bar', '__return_false' );

// Add Favicon (from root of site) //
function diww_favicon() {
	echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_site_url() . '/favicon.ico" />';
}
add_action('wp_head', 'diww_favicon');
add_action('admin_head', 'diww_favicon');

// pulls in logo for wp admin
function my_login_logo() { ?>
  <style type="text/css">
      body.login div#login h1 a {
          	background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/assets/images/header-logo.jpg);
            background-size: 75%;
			width: auto;
			height: 90px;
			border: 4px solid #102540;
			background-color: white;
			background-position: 50% 50%;
      }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// ENQUEUE CSS, LESS, & SCSS STYLESHEETS
function add_style_sheets() {
	if( !is_admin() ) {
		wp_enqueue_style( 'reset', get_template_directory_uri().'/style.css', 'screen'  );
		wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', 'screen');
		wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css', 'screen');
		wp_enqueue_style( 'main', get_template_directory_uri().'/assets/css/style.less', 'screen' );
	}
}
add_action('wp_enqueue_scripts', 'add_style_sheets');

// ENQUEUE JAVASCRIPT FILES
function add_javascript() {
	wp_enqueue_script( 'slick', 'http://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js', null, null, false );
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', null, null, true );
	// wp_enqueue_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-1.2.1.min.js', array('jquery'), null, true );

	wp_enqueue_script( 'columnizer', get_template_directory_uri().'/assets/js/jquery.columnizer.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'general', get_template_directory_uri().'/assets/js/general.js', array('slick'), null, true );

}

add_action('wp_enqueue_scripts', 'add_javascript');

/**
 *
 * TAKE GLOBAL DESCRIPTION OUT OF HEADER.PHP AND GENERATE IT FROM A FUNCTION
 *
 */
function site_global_description()
{
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
	{
		echo " | $site_description";
	}
}


/**
 * REMOVE UNWANTED CAPITAL <P> TAGS
 */
remove_filter( 'the_content', 'capital_P_dangit' );
remove_filter( 'the_title', 'capital_P_dangit' );
remove_filter( 'comment_text', 'capital_P_dangit' );


/**
 * REGISTER NAV MENUS FOR HEADER FOOTER AND UTILITY
 */
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'themename' ),
	'footer' => __( 'Footer Menu', 'themename' ),
	'utility' => __( 'Utility Menu', 'themename' )
) );


/** 
 * DEFAULT COMMENTS & RSS LINKS IN HEAD
 */
add_theme_support( 'automatic-feed-links' );


/**
 * THEME SUPPORTS THUMBNAILS
 */
add_theme_support( 'post-thumbnails' );


/**
 *	ADD TINY IMAGE SIZE FOR ACF FIELDS, BETTER USABILITY
 */
add_image_size( 'mini-thumbnail', 50, 50 );

register_sidebar( array (
	'name' => __( 'Homepage Hero'),
	'id' => 'homepage-hero',
	'description' => __( 'Homepage Hero'),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>'
) );

register_sidebar( array (
	'name' => __( 'Advanced IDX Search'),
	'id' => 'advanced-idx-search',
	'description' => __( 'Advanced IDX Search'),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>'
) );

register_sidebar( array (
	'name' => __( 'MLS Sidebar'),
	'id' => 'mls-sidebar',
	'description' => __( 'MLS Sidebar'),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>'
) );
register_sidebar( array (
	'name' => __( 'Featured Sidebar'),
	'id' => 'featured-sidebar',
	'description' => __( 'Featured Sidebar'),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>'
) );


// custom post type

//create state taxonomy
add_action( 'init', 'create_offer_tax' );
function create_offer_tax() {
	register_taxonomy(
		'featuredlistings',
		array('featuredlistings'),
		array(
			'label' => __( 'Listing Category' ),
			'rewrite' => array( 'slug' => 'listing-category' ),
			'hierarchical' => true,
			'show_in_quick_edit' => true,
			'show_admin_column' => true
		)
	);
}

add_action( 'init', 'create_post_type' );
function create_post_type() {

	$args1 = array(
		'labels' => array(
			'name' => __( 'Team Members' ),
			'singular_name' => __( 'Team Member' )
		),
		'public' => true,
		'menu_icon' => 'dashicons-groups',
		'rewrite' => array('slug' => 'team-members'),
		'supports' => array( 'title', 'editor', 'thumbnail' )
	);
  	register_post_type( 'Team Members', $args1);
  	
  	$args2 = array(
		'labels' => array(
			'name' => __( 'Featured Listings' ),
			'singular_name' => __( 'Featured Listing' )
		),
		'public' => true,
		'menu_icon' => 'dashicons-admin-multisite',
		'rewrite' => array('slug' => 'featured-listings'),
		'supports' => array( 'title', 'editor', 'thumbnail' )
	);
  	register_post_type( 'Featured Listings', $args2);
  	register_taxonomy_for_object_type('Listing Category', 'featuredlistings');

  	$args3 = array(
		'labels' => array(
			'name' => __( 'Towns' ),
			'singular_name' => __( 'Town' )
		),
		'public' => true,
		'menu_icon' => 'dashicons-admin-site',
		'supports' => array( 'title', 'editor', 'thumbnail' )
	);
  	register_post_type( 'Towns', $args3);
  	
  	$args4 = array(
		'labels' => array(
			'name' => __( 'Neighborhoods' ),
			'singular_name' => __( 'Neighborhood' )
		),
		'public' => true,
		'menu_icon' => 'dashicons-location-alt',
		'supports' => array( 'title', 'editor', 'thumbnail' )
	);
  	register_post_type( 'Neighborhoods', $args4);

  	flush_rewrite_rules();
}











