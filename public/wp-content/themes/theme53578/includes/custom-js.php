<?php
	/**
	 * How to enqueue script?
	 *
	 *  http://codex.wordpress.org/Function_Reference/wp_enqueue_script
	 */
	add_action( 'wp_enqueue_scripts', 'cherry_child_custom_scripts' );
	function cherry_child_custom_scripts() {
		wp_enqueue_script( 'themeScripts', CHILD_URL . '/js/themeScripts.js', array( 'jquery' ), '1.0', true ); }
 ?>