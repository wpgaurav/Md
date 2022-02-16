<?php

// define constants
define( 'MD_CHILD_DIR', trailingslashit( get_stylesheet_directory() ) );
define( 'MD_CHILD_URL', trailingslashit( get_stylesheet_directory_uri() ) );
// define( 'PAGE_OPTIMIZE_CSS_MINIFY', true );

// include MD library and child theme files
require_once( get_template_directory() . '/lib/marketers-delight.php' );
require_once( 'loader.php' );

// run MD design mode (rebuilds dynamic CSS from style.php on every page load)
// md_compile_css();
// dropins
include( 'dropins/docs/docs.php' );
include( 'dropins/extend/extend.php' );
/* function custom_blocks_css() {
	if (is_singular() && !(is_front_page())) {
		wp_enqueue_style( 
      'custom-block', 
      get_stylesheet_directory_uri() . '/custom-blocks.css' 
    );
  }
}
add_action( 'wp_enqueue_scripts', 'custom_blocks_css', 1 ); */
add_action(
	'enqueue_block_editor_assets',
	function () {
		$theme = wp_get_theme();
		wp_enqueue_style(
		'block-md-custom-css', '/wp-content/themes/Md/custom-editor.css'
		);
	}
);
function new_code(){
	if(is_page('12970')){
		get_template_part( 'templates/loops/loop', 'snippet' );
	}
	if(is_page('wordpress-plugins')){
		get_template_part( 'templates/loops/loop', 'plugins' );
	}
	if(is_page('toolbox')){
		get_template_part( 'templates/loops/loop', 'toolbox' );
	}
}
add_action('md_hook_after_content', 'new_code', 330);
/* function sidebar_deal_ad(){
	get_template_part( 'templates/loops/loop', 'coupon' );
}
add_action('md_hook_after_sidebar', 'sidebar_deal_ad', 330); */
function post_series_fix(){
	if(is_tax('post_series')){
	remove_action( 'md_hook_content', 'md_loop' );
	remove_action( 'md_hook_content', 'md_pagination', 30 );
}
}
add_action('template_redirect', 'post_series_fix');
/* Remove Jetpack Sharedaddy Sharing from post excerpts */

// add_action( 'init', 'remove_sharedaddy_excerpt_sharing', 20 );

/* function remove_sharedaddy_excerpt_sharing() {
   remove_filter( 'the_excerpt', 'sharing_display', 19 );
} */
function single_offers(){
	if(is_singular(array('post','deal'))){
		echo do_shortcode('[sc name="mo-after-post"][/sc]');
	}
}
add_action('md_hook_content_item', 'single_offers', 40);
// function md_child_theme_posts_slider() {
// 	get_template_part( 'templates/loops/posts', 'slider' );
// }

// add_action( 'md_hook_after_header', 'md_child_theme_posts_slider' ); */
function new_excerpt_more($more) {
  global $post;
  remove_filter('excerpt_more', 'new_excerpt_more'); 
  return ' ';
}
add_filter('excerpt_more','new_excerpt_more', 330);
function md_child_sidebar() {
    if ( is_search() || is_author() || is_post_type_archive('deal') || is_tag()) {
        add_filter( 'md_filter_has_sidebar', '__return_true' );
	}
	if (is_singular(array('product', 'lesson'))){
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
/**
 * Add MD meta options to any Custom Post Type.
 */

function md_add_post_type_meta( $post_type ) {
    $post_type[] = 'snippet';
	$post_type[] = 'coupon';
	$post_type[] = 'deal';
	$post_type[] = 'portfolio';
	$post_type[] = 'course';
	$post_type[] = 'lesson';
	$post_type[] = 'question';
    return $post_type;
}
add_filter( 'md_post_type_meta', 'md_add_post_type_meta' );

/**
 * Add MD meta options to any Custom Taxonomy.
 */

function md_add_taxonomy_meta( $taxonomy ) {
    $taxonomy[] = 'deal_type';
    $taxonomy[] = 'programming_language';
	$taxonomy[] = 'post_series';
	$taxonomy[] = 'coupon_type';
    return $taxonomy;
}
add_filter( 'md_taxonomy_meta', 'md_add_taxonomy_meta' );
/* function trigger_hook() {?>
<form role="search" method="get" id="searchform" class="search-form form-attached clear search-form-small" action="https://gauravtiwari.org">
	<input type="search" class="search-input form-input" placeholder="Search for articles…" value="" name="s" id="s">
			<input type="hidden" name="post_type" value="post">
		<button type="submit" class="search-submit form-submit md-icon-search" id="searchsubmit"></button>
</form>
	<?php }
add_action('md_hook_header_aside', 'trigger_hook'); */
/* function md_child_theme_image_sizes( $sizes ) {
	$sizes['md-banner'] = array(
		'width' => 700,
		'height' => 350
	);
	return $sizes;
}
add_filter( 'md_filter_image_sizes', 'md_child_theme_image_sizes', 330); */
// include('taxon-shortcode.php');
  /* function featured_image_on_top(){
if ( is_singular(array('post', 'glossary')) && in_array( $position, array( '', 'remove' ) ) ) ?>
	<?php md_featured_image( 'alignfull text-featured', 'md-banner' ); ?>
<?php }
add_action ('md_hook_content_item', 'featured_image_on_top', 10);   */
/* function author_box_custom(){
if ( is_singular(array('post', 'snippet')) ) ?>
	<div class="author-box block-single">
	<div class="avatar-image"><?php echo get_avatar( get_the_author_meta( 'ID' ), 40);?></div>
		<h5 class="author-title"><?php printf( get_the_author_meta( 'display_name') );?></h5>
	<div class="author-summary">
		<p class="author-description"><?php echo links_add_target(get_the_author_meta( 'description' )); ?></p>
	</div>
</div>
<?php }
add_action ('md_hook_content_item', 'author_box_custom', 50); */
remove_action( 'md_hook_content_item', 'md_comments', 60 );
// remove_action( 'md_hook_content_item', 'md_post_nav', 70 );
// add_action( 'md_hook_content_item', 'md_comments', 70 );
// add_action( 'md_hook_content_box_bottom', 'md_post_nav', 62 );
/* function yarpp_insert(){
	if(is_singular(array('post', 'deal', 'docs', 'snippet', 'stream'))){
		yarpp_related();
	}
} 
add_action ('md_hook_content_box_bottom', 'yarpp_insert', 63); */
/* add_action( 'template_redirect', 'removex_my_action');

function removex_my_action(){
if(is_singular(array('page', 'resource'))){
     remove_action( 'md_hook_content_item', 'md_comments', 60 );
}
} */
/**
 * Enable alternate logo on conditions.
 *
 * @since 1.0
 * */

/* function md_child_logo_style() {
    if ( is_front_page() )
        return true;
}

add_filter( 'md_filter_logo_alt', 'md_child_logo_style' ); */
function new_loop_front(){
	if(is_front_page()){
		get_template_part( 'templates/loops/loop', 'home' );
	}
// 	if(is_page('toolbox')){
// 		get_template_part( 'templates/loops/loop', 'coupons' );
// 	}
}
add_action('md_hook_before_footer', 'new_loop_front', 1);
function the_404_imporove(){
	if(is_404()){?>
<div class="404-image">
<img src="https://gauravtiwari.org/wp-content/uploads/2021/04/404-image.png" alt="Not Found" loading=lazy>
</div>
<?php	}
}
add_action('md_hook_headline_top', 'the_404_imporove');
/* Sidebar for Custom Post Types */ 
function md_child_theme_sidebars_post_types( $sidebars ) {
	$sidebars['deal'] = array(
		'archive' => true,
		'single'  => true
	);
	return $sidebars;
}
add_filter( 'md_filter_sidebars_post_types', 'md_child_theme_sidebars_post_types' );
/* function add_rank_math_breadcrumbs(){
	if(is_singular('post','stream', 'bookshelf', 'glossary','deal', 'snippet')){
		if (function_exists('rank_math_the_breadcrumbs')){?>
<div class="inner block-half">
<?php rank_math_the_breadcrumbs(); ?>
</div>
	<?php }
}
}
add_action( 'md_hook_content_box_bottom', 'add_rank_math_breadcrumbs', 100 ); */
function calculator_hook(){
	$post = get_post();
if ( 1020683 == $post->post_parent && is_page() ) {?>
<div class="text-center block-single-tb buttons">
	<a class="link" href="/calculators/">View more calculators</a>
</div>
<?php }
}
add_action( 'md_hook_content_item', 'calculator_hook', 62 );
// DEAL AND COUPONS BUTTONS and PROMOCODES
/* function deal_btns() {
if ( is_singular( array('deal','coupon') ) ) {?>
  <?php if (get_field('coupon_url')): ?>
    <a class="button button-arrow" href="<?php the_field('coupon_url');?>" target="_blank" rel="nofollow sponsored"><?php the_field('coupon_text');?></a>
  <?php endif;?>
  <?php if (get_field('promo_code')): ?>
    <a class="button coupon-button" href="<?php the_field('coupon_url');?>" target="_blank" rel="nofollow sponsored"><?php the_field('promo_code');?></a>
  <?php endif;?>
<style>.byline{display:none;} a.button.coupon-button { background: aliceblue; border: 2px dashed #333; color: #111; box-shadow: none; text-transform: uppercase; letter-spacing: 2px; } .headline{margin-bottom:50px}</style>
<?php }

}
add_action ('md_hook_after_headline', 'deal_btns');
function md_child_logo_style() {
    if (is_page('7172'))
        return true;
}

add_filter( 'md_filter_logo_alt', 'md_child_logo_style' ); */
function md_child_theme_footer_columns() {
	return array( 1, 2, 3, 4 );
}
add_filter( 'md_filter_footer_columns', 'md_child_theme_footer_columns' );
// add_theme_support( 'editor-color-palette', array());
add_filter('wp_nav_menu_items', 'do_shortcode');
/**
 * Unset CSS template by file names from style.css.
 *
 * @since 1.0
 */

function md_gt_templates( $templates ) {
    unset( $templates['comments'] );
    return $templates;
}

add_filter( 'md_style_css_templates', 'md_gt_templates' );