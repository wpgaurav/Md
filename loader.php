<?php
/**
 * Manipulate page templates and load content based on
 * WordPress Conditionals Tags.
 */

function md_child_templates() {

//	if ( is_front_page() )
//		add_action( 'md_hook_before_content_box', 'md_child_theme_hero' );

}
add_action( 'template_redirect', 'md_child_templates' );


// Hero template

function md_child_theme_hero() {
	include( 'templates/demo-template.php' );
}