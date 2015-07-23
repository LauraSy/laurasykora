<?php
// =============================== My Social Networks Widget ====================================== //
class My_SocialNetworksWidget extends WP_Widget {

	function My_SocialNetworksWidget() {
		$widget_ops = array('classname' => 'social_networks_widget', 'description' => __('Link to your social networks.', CURRENT_THEME) );
		$this->WP_Widget('social_networks', __('Cherry - Social Networks', CURRENT_THEME), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );

		$networks['Twitter']['link']    = $instance['twitter'];
		$networks['Facebook']['link']   = $instance['facebook'];
		$networks['Instagram']['link']     = $instance['instagram'];
		$networks['Feed']['link']       = $instance['feed'];
		$networks['Linkedin']['link']   = $instance['linkedin'];
		$networks['Delicious']['link']  = $instance['delicious'];
		$networks['Youtube']['link']    = $instance['youtube'];
		$networks['Google']['link']     = $instance['google'];
		$networks['Pinterest']['link']  = $instance['pinterest'];

		$networks['Twitter']['label']   = $instance['twitter_label'];
		$networks['Facebook']['label']  = $instance['facebook_label'];
		$networks['Instagram']['label']    = $instance['instagram_label'];
		$networks['Feed']['label']      = $instance['feed_label'];
		$networks['Linkedin']['label']  = $instance['linkedin_label'];
		$networks['Delicious']['label'] = $instance['delicious_label'];
		$networks['Youtube']['label']   = $instance['youtube_label'];
		$networks['Google']['label']    = $instance['google_label'];		
		$networks['Pinterest']['label'] = $instance['pinterest_label'];

		// WPML compatibility
		// Check if WPML is activated, then reigster labels for translation
		if ( defined( 'ICL_SITEPRESS_VERSION' ) ) {
			foreach( $networks as $label => $val ) {
				$networks[$label]['label'] = icl_translate( 'cherry', 'social_widget_label_' . $label, $val['label'] );
			}
		}

		$display = $instance['display'];

		echo $before_widget;
		if( $title ) {
			echo $before_title;
				echo $title;
			echo $after_title;
		} ?>

		<!-- BEGIN SOCIAL NETWORKS -->
		<?php if ($display == "both" or $display =="labels") {
			$addClass = "social__list";
		} elseif ($display == "icons") {
			$addClass = "social__row clearfix";
		} ?>

		<ul class="social <?php echo $addClass ?> unstyled">

		<?php foreach(array("Twitter", "Facebook", "Instagram", "Feed", "Linkedin", "Delicious", "Youtube", "Google", "Pinterest") as $network) : ?>
			<?php if (!empty($networks[$network]['link'])) : ?>
			<li class="social_li">
				<a class="social_link social_link__<?php echo strtolower($network); ?>" rel="tooltip" data-original-title="<?php echo strtolower($networks[$network]['label']); ?>" href="<?php echo $networks[$network]['link']; ?>" target="_blank">
					<?php if (($display == "both") or ($display =="icons")) {  $networkIcon=$network; ?> 
						
						<?php if ($networkIcon == 'Feed') $networkIcon = 'Rss '; ?>
						<?php if ($networkIcon == 'Instagram') $networkIcon = 'Instagram '; ?>

						<?php if ($networkIcon == 'Google') $networkIcon = 'Google-plus '; ?>
						<?php if ($networkIcon == 'Delicious') $networkIcon = 'th-large '; ?>
						<?php if ($networkIcon == 'Pinterest') $networkIcon = 'Pinterest '; ?>
						 <span class="social_icon icon-<?php echo strtolower($networkIcon);?>"></span>
					<?php } if (($display == "labels") or ($display == "both")) { ?>
						<?php if ( $networks[$network]['label'] != "" ) { echo '<span class="social_label">'.$networks[$network]['label'].'</span>'; }?>
					<?php } ?>
				</a>
			</li>
			<?php endif; ?>
		<?php endforeach; ?>

		</ul>
		<!-- END SOCIAL NETWORKS -->
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array( 'title' => '', 'twitter' => '', 'twitter_label' => '', 'facebook' => '', 'facebook_label' => '', 'instagram' => '', 'instagram_label' => '', 'feed' => '', 'feed_label' => '', 'linkedin' => '', 'linkedin_label' => '', 'delicious' => '', 'delicious_label' => '', 'youtube' => '', 'youtube_label' => '', 'google' => '', 'google_label' => '', 'pinterest' => '', 'pinterest_label' => '', 'display' => 'icons', 'text' => '');
		$instance = wp_parse_args( (array) $instance, $defaults );

		$twitter         = $instance['twitter'];
		$facebook        = $instance['facebook'];
		$instagram          = $instance['instagram'];
		$feed            = $instance['feed'];
		$linkedin        = $instance['linkedin'];
		$delicious       = $instance['delicious'];
		$youtube         = $instance['youtube'];
		$google          = $instance['google'];		
		$pinterest       = $instance['pinterest'];

		$twitter_label   = $instance['twitter_label'];
		$facebook_label  = $instance['facebook_label'];
		$instagram_label    = $instance['instagram_label'];
		$feed_label      = $instance['feed_label'];
		$linkedin_label  = $instance['linkedin_label'];
		$delicious_label = $instance['delicious_label'];
		$youtube_label   = $instance['youtube_label'];
		$google_label    = $instance['google_label'];
		$pinterest_label = $instance['pinterest_label'];

		$display         = $instance['display'];
		$title           = strip_tags($instance['title']);
?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', CURRENT_THEME) ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
		<legend style="padding:0 5px;"><?php _e('Facebook', CURRENT_THEME); ?>:</legend>

		<p><label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook URL', CURRENT_THEME) ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('facebook_label'); ?>"><?php _e('Facebook label', CURRENT_THEME) ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('facebook_label'); ?>" name="<?php echo $this->get_field_name('facebook_label'); ?>" type="text" value="<?php echo esc_attr($facebook_label); ?>" /></p>
	</fieldset>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
		<legend style="padding:0 5px;"><?php _e('Twitter', CURRENT_THEME); ?>:</legend>
	<p><label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter URL', CURRENT_THEME); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('twitter_label'); ?>"><?php _e('Twitter label', CURRENT_THEME); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('twitter_label'); ?>" name="<?php echo $this->get_field_name('twitter_label'); ?>" type="text" value="<?php echo esc_attr($twitter_label); ?>" /></p>
	</fieldset>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
		<legend style="padding:0 5px;"><?php _e('Instagram', CURRENT_THEME); ?>:</legend>
	<p><label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram URL', CURRENT_THEME); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo esc_attr($instagram); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('instagram_label'); ?>"><?php _e('Instagram label', CURRENT_THEME) ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('instagram_label'); ?>" name="<?php echo $this->get_field_name('instagram_label'); ?>" type="text" value="<?php echo esc_attr($instagram_label); ?>" /></p>
	</fieldset>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
		<legend style="padding:0 5px;"><?php _e('RSS feed', CURRENT_THEME); ?>:</legend>
	<p><label for="<?php echo $this->get_field_id('feed'); ?>"><?php _e('RSS feed', CURRENT_THEME); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id('feed'); ?>" name="<?php echo $this->get_field_name('feed'); ?>" type="text" value="<?php echo esc_attr($feed); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('feed_label'); ?>"><?php _e('RSS label', CURRENT_THEME) ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('feed_label'); ?>" name="<?php echo $this->get_field_name('feed_label'); ?>" type="text" value="<?php echo esc_attr($feed_label); ?>" /></p>
	</fieldset>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
			<legend style="padding:0 5px;"><?php _e('Linkedin', CURRENT_THEME); ?>:</legend>
	<p><label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin URL', CURRENT_THEME); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('linkedin_label'); ?>"><?php _e('Linkedin label', CURRENT_THEME) ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('linkedin_label'); ?>" name="<?php echo $this->get_field_name('linkedin_label'); ?>" type="text" value="<?php echo esc_attr($linkedin_label); ?>" /></p>
		</fieldset>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
			<legend style="padding:0 5px;"><?php _e('Delicious', CURRENT_THEME); ?>:</legend>
	<p><label for="<?php echo $this->get_field_id('delicious'); ?>"><?php _e('Delicious URL', CURRENT_THEME); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('delicious'); ?>" name="<?php echo $this->get_field_name('delicious'); ?>" type="text" value="<?php echo esc_attr($delicious); ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('delicious_label'); ?>"><?php _e('Delicious label', CURRENT_THEME) ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('delicious_label'); ?>" name="<?php echo $this->get_field_name('delicious_label'); ?>" type="text" value="<?php echo esc_attr($delicious_label); ?>" /></p>
		</fieldset>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
		<legend style="padding:0 5px;"><?php _e('Youtube', CURRENT_THEME); ?>:</legend>
		<p>
			<label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youtube URL', CURRENT_THEME) ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id('youtube_label'); ?>"><?php _e('Youtube label', CURRENT_THEME); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('youtube_label'); ?>" name="<?php echo $this->get_field_name('youtube_label'); ?>" type="text" value="<?php echo esc_attr($youtube_label); ?>" />
		</p>
	</fieldset>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
		<legend style="padding:0 5px;"><?php _e('Google', CURRENT_THEME); ?>:</legend>
		<p>
			<label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google URL', CURRENT_THEME); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($google); ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id('google_label'); ?>"><?php _e('Google label', CURRENT_THEME); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('google_label'); ?>" name="<?php echo $this->get_field_name('google_label'); ?>" type="text" value="<?php echo esc_attr($google_label); ?>" />
		</p>
	</fieldset>
	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
		<legend style="padding:0 5px;"><?php _e('Pinterest', CURRENT_THEME); ?>:</legend>
		<p>
			<label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest URL', CURRENT_THEME); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id('pinterest_label'); ?>"><?php _e('Pinterest label', CURRENT_THEME); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('pinterest_label'); ?>" name="<?php echo $this->get_field_name('pinterest_label'); ?>" type="text" value="<?php echo esc_attr($pinterest_label); ?>" />
		</p>
	</fieldset>



		<p><?php _e('Display', CURRENT_THEME); ?>:</p>
		<label for="<?php echo $this->get_field_id('icons'); ?>"><input type="radio" name="<?php echo $this->get_field_name('display'); ?>" value="icons" id="<?php echo $this->get_field_id('icons'); ?>" <?php checked($display, "icons"); ?>></input>  <?php _e('Icons', CURRENT_THEME); ?></label>
		<label for="<?php echo $this->get_field_id('labels'); ?>"><input type="radio" name="<?php echo $this->get_field_name('display'); ?>" value="labels" id="<?php echo $this->get_field_id('labels'); ?>" <?php checked($display, "labels"); ?>></input> <?php _e('Labels', CURRENT_THEME); ?></label>
		<label for="<?php echo $this->get_field_id('both'); ?>"><input type="radio" name="<?php echo $this->get_field_name('display'); ?>" value="both" id="<?php echo $this->get_field_id('both'); ?>" <?php checked($display, "both"); ?>></input> <?php _e('Both', CURRENT_THEME); ?></label>
<?php
	}
}?>