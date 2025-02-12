<?php

// define constants
define( 'MD_CHILD_DIR', trailingslashit( get_stylesheet_directory() ) );
define( 'MD_CHILD_URL', trailingslashit( get_stylesheet_directory_uri() ) );

// include MD library and child theme files
require_once( get_template_directory() . '/lib/marketers-delight.php' );
require_once( 'loader.php' );

function new_code(){
	if(is_page('wordpress-plugins')){
		get_template_part( 'templates/loops/loop', 'plugins' );
	}
	/* if(is_page('toolbox')){
		get_template_part( 'templates/loops/loop', 'toolbox' );
	} */
}
add_action('md_hook_after_content', 'new_code', 330);

function remove_byline_select(){
	if(is_singular(array('glossary','docs','download', 'tool'))){
	remove_action( 'md_hook_after_headline', 'md_byline' );
}
	if ( is_post_type_archive('deal') ) {
	remove_action( 'md_hook_content', 'md_loop' );
	remove_action( 'md_hook_content', 'md_archives_title' );
	}
	remove_action( 'md_hook_content_item', 'md_comments', 60 );
// 	add_action( 'md_hook_content_item', 'md_comments', 50 );
}
add_action('template_redirect', 'remove_byline_select');
function md_child_sidebar() {
    if ( is_archive() || is_search() || is_author()) {
        add_filter( 'md_filter_has_sidebar', '__return_true' );
	}
	if ( is_singular('hindi') || is_post_type_archive('deal') || is_post_type_archive('hindi') || is_singular('glossary') || is_post_type_archive('glossary') || is_404()) {
        add_filter( 'md_filter_has_sidebar', '__return_false' );
	}
}
add_action( 'template_redirect', 'md_child_sidebar' );
function md_before_deals() {
if ( is_post_type_archive('deal') ) {
	get_template_part( 'templates/loops/loop', 'before-deals' );
}
}
add_action( 'md_hook_before_content_box', 'md_before_deals' );
/* function md_new_deals() {
if ( is_post_type_archive('deal') ) {
	get_template_part( 'templates/loops/loop', 'teasers' );
}
}
add_action( 'md_hook_content', 'md_new_deals' ); */
/**
 * Add MD meta options to any Custom Post Type.
 */

function md_add_post_type_meta( $post_type ) {
    $post_type[] = 'snippet';
	$post_type[] = 'deal';
// 	$post_type[] = 'product';
	$post_type[] = 'tool';
// 	$post_type[] = 'lesson';
// 	$post_type[] = 'question';
    return $post_type;
}
add_filter( 'md_post_type_meta', 'md_add_post_type_meta' );

/**
 * Add MD meta options to any Custom Taxonomy.
 */

function md_add_taxonomy_meta( $taxonomy ) {
    $taxonomy[] = 'deal_type';
    $taxonomy[] = 'programming_language';
// 	$taxonomy[] = 'post_series';
	$taxonomy[] = 'tool_type';
    return $taxonomy;
}
add_filter( 'md_taxonomy_meta', 'md_add_taxonomy_meta' );

/* function md_child_theme_sidebars_post_types( $sidebars ) {
	$sidebars['deal'] = array(
		'archive' => true,
		'single'  => true,
		'deal_type' => true
	);
	$sidebars['tool'] = array(
		'archive' => true,
		'single'  => true,
		'tool_type' => true
	);
	$sidebars['glossary'] = array(
		'archive' => false,
		'single'  => false
	);
	return $sidebars;
}
add_filter( 'md_filter_sidebars_post_types', 'md_child_theme_sidebars_post_types' ); */
function md_child_theme_footer_columns() {
	return array( 1, 2, 3, 4 );
}
add_filter( 'md_filter_footer_columns', 'md_child_theme_footer_columns' );
function md_gt_templates( $templates ) {

    unset( $templates['comments'] );
// 	unset( $templates['format'] );

  // $templates['nblocks'] = get_stylesheet_directory() . '/custom-blocks.css';
//    $templates['format'] = get_stylesheet_directory() . '/typography.php';
 
    return $templates;

}

add_filter( 'md_style_css_templates', 'md_gt_templates', 1 );
function md_child_theme_image_sizes( $sizes ) {
	unset( $sizes['md-full'] );
	unset( $sizes['md-image'] );
	unset( $sizes['md-book'] );
// 	unset( $sizes['md-thumbnail'] );
	return $sizes;
}

add_filter( 'md_filter_image_sizes', 'md_child_theme_image_sizes' );