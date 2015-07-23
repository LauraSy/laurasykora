<article id="post-<?php the_ID(); ?>" <?php post_class('post__holder'); ?>>
	<?php if(is_singular()) : ?>
			<h2 class="post-title"><?php the_title(); ?></h2>
		<?php endif; ?>
	<!-- Post Content -->
	<div class="post_content">
		<?php the_content('<span>' . theme_locals('continue_reading') . '</span>'); ?>
		<!--// Post Content -->
		<div class="clear"></div>
	</div>

	<?php get_template_part('includes/post-formats/post-meta'); ?>

</article><!--//.post__holder-->