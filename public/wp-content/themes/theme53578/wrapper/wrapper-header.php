<?php /* Wrapper Name: Header */ ?>
<?php if( is_front_page() ) { ?>
	<div class="wide">
		<?php if ( of_get_option( 'px_slider_visibility', 'true' ) == "true" ) { get_template_part('parallax-slider/parallaxSlider'); } ?>
	</div>
<?php } ?>	
<div class="stuck_wrapper">
	<div class="container">
		<div class="row">
			<div class="span3" data-motopress-type="static" data-motopress-static-file="static/static-logo.php">
				<?php get_template_part("static/static-logo"); ?>
			</div>
			<div class="span9" data-motopress-type="static" data-motopress-static-file="static/static-nav.php">
				<?php get_template_part("static/static-nav"); ?>
			</div>	
			<div class="hidden-phone span12" data-motopress-type="static" data-motopress-static-file="static/static-search.php">
				<?php get_template_part("static/static-search"); ?>
			</div>
		</div>
	</div>
</div>