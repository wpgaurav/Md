<?php
/**
 * Dropin Name: Testimonials
 * Dropin Author: Alex Mangini
 * Dropin Demo: https://marketersdelight.net/dropins/testimonials/
 * Dropin Description: Registers custom post type + taxonomy, manipulates page templates, testimonials gallery page, [testimonial] shortcode, and other supporting actors.
 * Dropin Version 1.1
 */

if ( ! class_exists( 'md_testimonials' ) ) :

class md_testimonials extends md_api {

	/**
	 * Quick way to adjust testimonials settings.
	 */

	public $settings = array(
		'add_sidebar' => true,
		'archives_subtitle' => 'See what happy customers say about Gaurav Tiwari',
		'archives_title' => 'Reviews & Testimonials'
	);

	/**
	 * Fire important class actions.
	 *
	 * @since 1.0
	 */

	public function actions() {
		add_action( 'init', array( $this, 'add_post_types' ), 1 );
		add_action( 'admin_head-post.php', array( $this, 'hide_publish_actions' ) );
		add_action( 'admin_head-post-new.php', array( $this, 'hide_publish_actions' ) );
		if ( $this->settings['add_sidebar'] )
			add_filter( 'md_filter_sidebars_post_types', array( $this, 'sidebars' ) );
		add_shortcode( 'testimonial', array( $this, 'shortcode' ) );
	}

	/**
	 * Register custom settings.
	 *
	 * @since 1.0
	 */

	public function register() {
		return array(
			'meta_box' => array(
				'name' => __( 'Testimonial', 'md-child-theme' ),
				'post_type' => array( 'testimonials' ),
				'context' => 'normal',
				'fields' => array(
					'text' => array( 'type' => 'textarea' ),
					'name' => array( 'type' => 'text' ),
					'role' => array( 'type' => 'text' ),
					'rating' => array(
						'type' => 'select',
						'options' => array( '1', '2', '3', '4', '5' )
					)
				)
			)
		);
	}

	/**
	 * Fire hooks to WordPress' template_redirect hook.
	 * The MDAPI automatically fires template_redirect if
	 * you add this method to your own class extension.
	 *
	 * @since 1.0
	 */

	public function template() {
		// don't show post type single pages
		if ( is_single() && 'testimonials' == get_post_type() ) {
			wp_redirect( get_post_type_archive_link( 'testimonials' ), 301 );
			exit;
		}
		// modify template gallery page. reset loop with our custom loop
		if ( is_post_type_archive( 'testimonials' ) ) {
			add_filter( 'md_filter_has_sidebar', '__return_true' );
			remove_action( 'md_hook_content', 'md_archives_title' );
			remove_action( 'md_hook_content', 'md_loop' );
			remove_action( 'md_hook_content', 'md_pagination' );
			add_action( 'md_hook_content', array( $this, 'gallery' ) );
		}
	}

	/**
	 * Create custom post types.
	 *
	 * @since 1.0
	 */

	public function add_post_types() {
		register_post_type( 'testimonials', array(
			'public' => true,
			'menu_position' => 30,
			'has_archive' => true,
			'supports' => array( 'title', 'thumbnail' ),
			'menu_icon' => 'dashicons-editor-quote',
			'rewrite' => array( 'slug' => 'testimonials', 'with_front' => false ),
			'labels' => array(
				'name'               => __( 'Testimonials', 'md-child-theme' ),
				'singular_name'      => __( 'Testimonial', 'md-child-theme' ),
				'menu_name'          => __( 'Testimonials', 'md-child-theme' ),
				'name_admin_bar'     => __( 'Testimonials', 'md-child-theme' ),
				'add_new_item'       => __( 'Add New Testimonial', 'md-child-theme' ),
				'edit_item'          => __( 'Edit Testimonial', 'md-child-theme' ),
				'new_item'           => __( 'New Testimonial', 'md-child-theme' ),
				'view_item'          => __( 'View Testimonials', 'md-child-theme' ),
				'search_items'       => __( 'Search Testimonials', 'md-child-theme' ),
				'not_found'          => __( 'No testimonials found', 'md-child-theme' ),
				'not_found_in_trash' => __( 'No testimonials found in trash', 'md-child-theme' ),
				'all_items'          => __( 'All Testimonials', 'md-child-theme' )
			)
		) );
	}

	/**
	 * Shortcode to pull individual testimonials.
	 *
	 * @since 1.0
	 */

	public function shortcode( $atts, $content = '' ) {
		extract( shortcode_atts( array(
			'id' => '',
			'style' => '',
			'align' => ''
		), $atts, 'testimonial' ) );
		ob_start();
		$this->loop( array(
			'p' => ! empty( $atts['id'] ) ? $atts['id'] : '',
			'style' => ! empty( $atts['style'] ) ? $atts['style'] : '',
			'align' => ! empty( $atts['align'] ) ? $atts['align'] : '',
			'posts_per_page' => -1
		) );
		return ob_get_clean();
	}

	/**
	 * Meta box fields.
	 *
	 * @since 1.0
	 */

	public function meta_box() { ?>
		<p><?php $this->label( 'text', __( 'Text', 'md-child-theme' ) ); ?></p>
		<?php $this->field( 'textarea', 'text' ); ?>
		<div class="columns-2 columns-single md-sep">
			<div class="col">
				<p><?php $this->label( 'name', __( 'Name', 'md-child-theme' ) ); ?></p>
				<?php $this->field( 'text', 'name' ); ?>
			</div>
			<div class="col">
				<p><?php $this->label( 'role', __( 'Role', 'md-child-theme' ) ); ?></p>
				<?php $this->field( 'text', 'role' ); ?>
			</div>
		</div>
		<div class="md-sep">
			<p><?php $this->label( 'rating', __( 'Star Rating', 'md-child-theme' ) ); ?></p>
			<?php $this->field( 'select', 'rating', array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5'
			) ); ?>
			<?php $this->desc( __( 'Enter a star rating 1-5.', 'md-child-theme' ) ); ?>
		</div>
		<div class="md-sep">
			<p><b><?php echo __( 'Shortcode', 'md-child-theme' ); ?></b></p>
			<p><code>[testimonial id="<?php echo get_the_ID(); ?>"]</code></p>
			<?php $this->desc( __( 'Copy and paste this shortcode to embed testimonial anywhere.', 'md-child-theme' ) ); ?>
		</div>
	<?php }

	/**
	 * A slick way to remove uneeded elements from the WP
	 * post editor. Since we're not treating testimonials
	 * as pages, we don't need as many actions.
	 *
	 * @since 1.0
	 */

	public function hide_publish_actions() {
		global $post;
		if ( $post->post_type == 'testimonials' )
			echo
				'<style type="text/css">'.
					'#edit-slug-box, #misc-publishing-actions, #minor-publishing-actions {'.
						'display: none;'.
					'}'.
				'</style>';
	}

	/**
	 * Add Testimonials to custom Sidebars Manager.
	 *
	 * @since 1.0
	 */

	public function sidebars( $sidebars ) {
		$sidebars['testimonials']['archive'] = true;
		return $sidebars;
	}

	/**
	 * Testimonials gallery HTML template.
	 *
	 * @since 1.0
	 */

	public function gallery() { ?>
		<div class="testimonials">
			<div class="block-double-tb post-box">
				<div class="content-inner">
					<div class="testimonials-intro text-center mb-double">
						<?php if ( ! empty( $this->settings['archives_subtitle'] ) ) : ?>
							<p class="text-sec caps"><?php echo esc_html( $this->settings['archives_subtitle'] ); ?></p>
						<?php endif; ?>
						<h1><?php echo esc_html( $this->settings['archives_title'] ); ?></h1>
					</div>
					<?php $this->loop(); ?>
				</div>
			</div>
		</div>
	<?php }

	/**
	 * Run through a custom WordPress loop to display gallery of
	 * testimonials. Call this function anywhere to display
	 * the gallery programtically and pass custom settings.
	 *
	 * @since 1.0
	 */

	public function loop( $atts = null ) {
		$args = array(
			'post_type' => 'testimonials',
			'posts_per_page' => isset( $atts['posts_per_page'] ) ? $atts['posts_per_page'] : '-1'
		);
		if ( isset( $atts['p'] ) )
			$args['p'] = $atts['p'];
		$testimonials = new WP_Query( $args );
		if ( $testimonials->have_posts() )
			include( 'loop.php' );
	}

}
new md_testimonials;

endif;