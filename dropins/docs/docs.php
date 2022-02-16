<?php
/**
 * Dropin Name: MD Docs
 * Dropin Author: Alex Mangini
 * Dropin Demo: https://marketersdelight.com/dropins/docs/
 * Dropin Description: Create a Documentation library in WordPress.
 * Dropin Version: 1.0.1
 * @since MD5.2.1
 */

class md_docs extends md_api {

	/**
	 * Run Documentation setup actions.
	 *
	 * @since 1.0
	 */

	public function actions() {
		$this->slug = md_setting( array( 'docs', 'slug' ), 'docs' );
		add_action( 'init', array( $this, 'taxonomies' ), 0 );
		add_action( 'init', array( $this, 'post_type' ), 1 );
		add_filter( 'post_type_link', array( $this, 'permalinks' ), 1, 2 );
		add_filter( 'md_taxonomy_meta', array( $this, 'tax_meta' ) );
		add_filter( 'md_optins_locations', array( $this, 'optins_locations' ) );
		add_filter( 'md_filter_sidebars_post_types', array( $this, 'sidebars' ) );
		add_filter( 'md_post_type_meta', array( $this, 'add_post_meta' ) );
		if ( is_admin() )
			add_action( 'admin_bar_menu', array( $this, 'admin_bar' ), 100 );
	}

	/**
	 * Register custom taxonomy.
	 *
	 * @since 1.0
	 */

	public function taxonomies() {
		register_taxonomy( 'docs_category', 'docs', array(
			'hierarchical' => true,
			'show_ui' => true,
			'query_var' => true,
			'public' => true,
			'capabilities' => array( 'manage_categories' ),
			'show_in_rest' => true,
			'rewrite' => array(
				'slug' => $this->slug,
				'with_front' => false
			),
			'labels' => array(
				'name' => __( 'Categories', 'md' ),
				'singular_name' => __( 'Courses', 'md' ),
				'search_items' => __( 'Search Courses', 'md' ),
				'all_items' => __( 'All Courses', 'md' ),
				'parent_item' => __( 'Parent Course', 'md' ),
				'parent_item_colon' => __( 'Parent Course:', 'md' ),
				'edit_item' => __( 'Edit Course', 'md' ),
				'update_item' => __( 'Update Course', 'md' ),
				'add_new_item' => __( 'Add New Course', 'md' ),
				'new_item_name' => __( 'New Course', 'md' ),
				'menu_name' => __( 'Courses', 'md' )
			)
		) );
	}

	/**
	 * Register custom post type.
	 *
	 * @since 1.0
	 */

	public function post_type() {
		register_post_type( 'docs', array(
			'hierarchial' => true,
			'public' => true,
			'has_archive' => $this->slug,
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'comments' ),
			'menu_icon' => 'dashicons-welcome-learn-more',
			'taxonomies' => array( 'docs_category' ),
			'menu_position' => 20,
			'rewrite' => array(
				'slug' => "$this->slug/%docs_category%",
				'with_front' => false
			),
			'show_in_rest' => true,
			'labels' => array(
				'name' => __( 'Lessons', 'md' ),
				'singular_name' => __( 'Lesson', 'md' ),
				'menu_name' => __( 'Lessons', 'md' ),
				'name_admin_bar' => __( 'Lessons', 'md' ),
				'add_new_item' => __( 'Add New Lesson', 'md' ),
				'edit_item' => __( 'Edit Lesson', 'md' ),
				'new_item' => __( 'New Lesson', 'md' ),
				'view_item' => __( 'View Lesson', 'md' ),
				'view_items' => __( 'View Lessons', 'md' ),
				'search_items' => __( 'Search Lessons', 'md' ),
				'not_found' => __( 'No lessons found', 'md' ),
				'not_found_in_trash' => __( 'No lessons found in trash', 'md' ),
				'all_items' => __( 'Lessons', 'md' )
			)
		) );
	}

	/**
	 * Create admin page and meta box.
	 *
	 * @since 4.9.2
	 */

	public function register() {
		return array(
			'admin_page' => array(
				'name' => __( 'Settings', 'md' ),
				'parent_slug' => 'edit.php?post_type=docs',
				'fields' => array(
					'archives_title' => array( 'type' => 'text' ),
					'archives_text' => array( 'type' => 'textarea' ),
					'slug' => array( 'type' => 'text' ),
					'layout' => array(
						'type' => 'checkbox',
						'options' => array( 'enable_search' )
					)
				)
			)
		);
	}

	/**
	 * Add Documentation admin settings.
	 *
	 * @since 1.0
	 */

	public function admin_page() {
		include( 'templates/admin/docs-settings.php' );
	}

	/**
	 * Modify frontend templates.
	 *
	 * @since 1.0
	 */

	public function template() {
		if ( is_post_type_archive( 'docs' ) ) {
			add_filter( 'md_filter_loop_type', array( $this, 'loop_type' ) );
			remove_action( 'md_hook_content', 'md_archives_title' );
			add_action( 'md_hook_content', array( $this, 'page_title' ) );
			if ( is_search() )
				add_action( 'md_hook_content', array( $this, 'loop_search' ) );
			else
				add_action( 'md_hook_content', array( $this, 'category_listing' ) );
			remove_action( 'md_hook_content', 'md_loop' );
			remove_action( 'md_hook_content', 'md_pagination', 30 );
			add_filter( 'md_filter_has_sidebar', '__return_false' );
		}
		if ( is_tax( 'docs_category' ) ) {
			remove_action( 'md_hook_content', 'md_archives_title' );
			add_action( 'md_hook_content', array( $this, 'page_title' ), 5 );
			add_filter( 'md_filter_loop_type', array( $this, 'loop_type' ) );
			add_filter( 'md_filter_has_sidebar', '__return_true' );
			add_filter( 'md_filter_custom_byline', array( $this, 'byline_items' ) );

		}
		if ( is_singular( 'docs' ) ) {
			if ( ! md_has_breadcrumbs() )
				add_action( 'md_hook_content', 'md_breadcrumbs', 5 );
			add_filter( 'md_filter_custom_byline', array( $this, 'byline_items' ) );
			add_filter( 'md_filter_has_sidebar', '__return_true' );
		}
	}

	/**
	 * Rewrite post permalinks with category base included.
	 *
	 * @since 1.0
	 */

	public function permalinks( $post_link, $post ){
	    if ( is_object( $post ) && $post->post_type == 'docs' ) {
	        $terms = wp_get_object_terms( $post->ID, 'docs_category' );
	        if ( $terms )
	            return str_replace( '%docs_category%' , $terms[0]->slug , $post_link );
	    }
	    return $post_link;
	}

	/**
	 * Load page title for various page views.
	 *
	 * @since 1.0
	 */

	public function page_title() {
		$page_title = md_setting( array( 'docs', 'archives_title' ) );
		$page_description = md_setting( array( 'docs', 'archives_text' ) );
		$has_search = md_setting( array( 'docs', 'layout', 'enable_search' ) ) ? true : false;
		$has_text = ! empty( $page_title ) || ! empty( $page_description ) ? true : false;
		include( 'templates/archives-title.php' );
	}

	/**
	 * Add loop ID for loops/loop-docs template.
	 *
	 * @since 1.0
	 */

	public function loop_type() {
		return 'docs';
	}

	/**
	 * Custom loop to show docs by category.
	 *
	 * @since 1.0
	 */

	public function category_listing() {
		$terms = get_terms( 'docs_category' );
		include( 'templates/category-listing.php' );
	}

	/**
	 * Add loops to search query docs page. 
	 *
	 * @since 1.0
	 */

	public function loop_search() {
		if ( have_posts() )
			md_template( 'loops/loop-docs' );
		else
			md_template( 'content-item-404' );
	}

	/**
	 * Add MD meta options to Docs pages.
	 *
	 * @since 1.0
	 */

	public function add_post_meta( $post_type ) {
		$post_type[] = 'docs';
		return $post_type;
	}

	/**
	 * Add MD meta options to documentation.
	 *
	 * @since 1.0
	 */

	public function tax_meta( $taxonomies ) {
		$taxonomies[] = 'docs_category';
		return $taxonomies;
	}

	/**
	 * Force Last Updated byline date on Docs.
	 *
	 * @since 1.0
	 */

	public function byline_items() {
		return array(
			'date' => false,
			'last-updated' => true
		);
	}

	/**
	 * Enable the use of MD custom sidebars.
	 *
	 * @since 1.0
	 */

	public function sidebars( $sidebars ) {
		$sidebars['docs'] = array(
			'single' => true,
			'docs_category' => true
		);
		return $sidebars;
	}

	/**
	 * Enabled Optins around various post types.
	 *
	 * @since 1.0
	 */

	public function optins_locations( $locations ) {
		$locations['docs'] = array(
			'archive' => __( 'Courses', 'md' ),
			'single' => __( 'Lessons', 'md' ),
			'docs_category' => __( 'Courses', 'md' )
		);
		return $locations;
	}

	/**
	 * Add Stream Archives link to Admin Bar.
	 *
	 * @since 4.9.2
	 */

	public function admin_bar( $admin_bar ) {
		$screen = get_current_screen();
		$post_type = isset( $_GET['post_type'] ) ? $_GET['post_type'] : '';
		$page = isset( $_GET['page'] ) ? $_GET['page'] : '';
		if ( $screen->base == 'docs_page_md_docs' )
			$admin_bar->add_menu( array(
				'id' => "{$this->_prefix}-archives-link",
				'title' => __( 'View Lessons', 'md' ),
				'href' => esc_url( get_site_url() . '/' . $this->slug ),
				'meta' => array(
					'title' => __( 'View Lessons', 'md' ),
					'target' => '_blank'
				)
			) );
	}

}

new md_docs;