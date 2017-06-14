<?php get_header() ?>
<div class="mid-cont">
	<div id="map-canvas-main"></div>
</div>

<div class="section mid-cont contact">
	<div class="table">
		<div class="table-cell center">
			<h2>Call Us</h2>
			<?php the_field('phone_number') ?>
			<br>
			<a href="mailto:<?php the_field('email_address') ?>">Email Us</a>
		</div>
		<div class="table-cell center">
			<h2>Visit Us</h2>
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

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJmcrw6EmdKVALN1tj50wbIZK7wfDvd28"></script>
<?php get_footer() ?>