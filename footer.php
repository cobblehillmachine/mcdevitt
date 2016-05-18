<?php
/**
 * @package WordPress
 * @subpackage Eclectic
 */
?>

	
	<footer class="mid-cont">
		<div class="table main">
			<div class="table-cell center"><?php wp_nav_menu(array('menu' => "Footer Left")) ?></div>
			<div class="table-cell center"><div class="offset"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-logo.jpg"></div></div>
			<div class="table-cell center"><?php wp_nav_menu(array('menu' => "Footer Right")) ?></div>
		</div>
		<div class="table contact">
			<div class="table-cell center"><a href="<?php the_field('address_link', 25) ?>" target=_blank><?php the_field('address', 25) ?></a></div>
			<div class="table-cell center">© 2015 McDevitt Town & Country<br>All Rights Reserved</div>
			<div class="table-cell center"><?php the_field('phone_number', 25) ?><br><a href="mailto:<?php the_field('email_address', 25) ?>"><?php the_field('email_address', 25) ?></a></div>
		</div>
	</footer>

	</div> <!-- ENDS BODY WRAPPER (STARTED IN HEADER) -->
	<?php wp_footer(); ?>

</body>
</html>