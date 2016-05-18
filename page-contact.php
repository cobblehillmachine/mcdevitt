<?php get_header() ?>
<div class="mid-cont">
	<div id="map-canvas-main"></div>
</div>

<div class="section mid-cont contact">
	<div class="table">
		<div class="table-cell center">
			<h3>Call Us</h3>
			<?php the_field('phone_number') ?>
			<br>
			<a href="mailto:<?php the_field('email_address') ?>"><?php the_field('email_address') ?></a>
		</div>
		<div class="table-cell center">
			<h3>Visit Us</h3>
			<a href="<?php the_field('address_link') ?>" target=_blank>
				<?php the_field('address') ?>
			</a>
		</div>
	</div>
</div>

<div class="mid-cont gray section above-footer" id="contact-form">
	<div class="skinny-cont">
		<?php echo do_shortcode('[contact-form-7 id="103" title="Contact form 1"]') ?>
	</div>
</div>


<?php get_footer() ?>