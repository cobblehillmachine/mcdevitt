<?php
/**
 * @package WordPress
 * @subpackage Eclectic
 */
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="IE ie8"> <![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="IE ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!--[if IE 8 ]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<title><?php echo site_global_description(); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="icon" href="<?php bloginfo('siteurl'); ?>/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php bloginfo('siteurl'); ?>/favicon.ico" type="image/x-icon" />
<?php wp_head(); ?>

<!-- GOOGLE ANALYTICS -->

<!-- END GOOGLE ANALYTICS -->

<!-- TYPEKIT -->
<script src="https://use.typekit.net/jlb4fkt.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<!-- END TYPEKIT -->



<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css"/>


</head>
<body <?php body_class(); ?>>
	
	<header>
		<div class="utility-nav">
			<div class="table">
				<div class="table-cell left">serving the pinehurst and southern pines area since 2002</div>
				<div class="table-cell right">
					<ul>
						<li class="search-trigger">
							<a href="#" class="search"><i class="fa fa-search"></i></a>
						</li>
						<li><a href="/contact">Contact</a></li>
					</ul>
				</div>
			</div>
			<?php dynamic_sidebar('universal-search'); ?>
		</div>
		<div class="main-nav table">
			<div class="table-cell center">
				<ul>
					<li><a href="/who-we-are">About</a></li>
					<li class="has-sub-menu">
						<a href="/listings">Listings</a>
						<ul class="sub-menu"></ul>
					</li>
					<li><a href="/buyers">Buyers</a></li>
				</ul>
			</div>
			<div class="table-cell center"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-logo.jpg"></a></div>
			<div class="table-cell center">
				<ul>
					<li><a href="/sellers">Sellers</a></li>
					<li class="has-sub-menu">
						<a href="/local-guide">Local Guide</a>
						<ul class="sub-menu towns">
							<?php $towns = new WP_query(array('post_type' => 'towns', 'orderby' => 'menu_order', 'order' => 'ASC')); ?>
							<?php while ( $towns->have_posts() ) : $towns->the_post();?>
								<a href="<?php the_permalink() ?>" style="background-color: <?php the_field('color') ?>">
									<?php the_field('abbreviation') ?>
									<small><?php the_title() ?></small>
								</a>
							<?php endwhile; wp_reset_query(); ?>
						</ul>
					</li>
					<li><a href="/blog">Blog</a></li>
				</ul>
			</div>
		</div>
	</header>
	<div class="body-wrapper">	