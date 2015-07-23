<?php /* Static Name: Footer text */ ?>
<div id="footer-text" class="footer-text">
	<?php $myfooter_text = apply_filters( 'cherry_text_translate', of_get_option('footer_text'), 'footer_text' ); ?>

    <?php if($myfooter_text){?>         <?php echo $myfooter_text; ?>
<?php } else { ?>       
Copyright <a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>" class="site-name"><?php bloginfo('name'); ?></a>  <?php echo date('Y'); ?>, All Rights Reserved    <?php } ?>     <?php if( is_front_page() ) { ?>         <a rel="nofollow" href="http://www.templatemonster.com/wordpress-themes.php" target="_blank">TemplateMonster</a> Design.      <?php } ?> </div>
