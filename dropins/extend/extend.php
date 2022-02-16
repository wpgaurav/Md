<?php 
/*
* Extend Gutenberg Toobar with Marketers Delight 
* Since 5.0.2
* @author gauravtiwari
*
*/
function md_gutenberg_extend_classes() {
	// Load the compiled blocks into the editor.
	wp_enqueue_script(
		'md-highlight-js',
		get_stylesheet_directory_uri().'/dropins/extend/highlight.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor' ),
		'1.2',
		true
	);
	wp_enqueue_script(
		'md-badge-js',
		get_stylesheet_directory_uri().'/dropins/extend/badge.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor' ),
		'1.2',
		true
	);

        // Load the compiled styles into the editor
        wp_enqueue_style(
		'md-extend-css',
		get_stylesheet_directory_uri().'/dropins/extend/styles.css',
		array( 'wp-edit-blocks' )
	);

}
add_action('enqueue_block_editor_assets', 'md_gutenberg_extend_classes');
?>