<?php
/**
 * Dropin Name: YouTube Video Gallery
 * Dropin Author: Alex Mangini
 * Dropin Demo: https://marketersdelight.net/dropins/video-gallery/
 * Dropin Version: 1.1.2
 */

// include other Drop-in files
include_once( dirname( __FILE__ ) . '/templates.php' );
include_once( dirname( __FILE__ ) . '/admin.php' );

class md_videos extends md_api {

	/**
	 * Fire important class actions.
	 *
	 * @since 1.0
	 */

	public function actions() {
		$this->slug = 'videos';
		$this->playlist_slug = 'playlist';
		$this->tag_slug = 'tag';
		add_action( 'init', array( $this, 'add_post_types' ), 1 );
		add_action( 'init', array( $this, 'add_taxonomies' ), 0 );
		add_filter( 'md_filter_sidebars_post_types', array( $this, 'sidebars' ) );
	}

	/**
	 * Load CSS template to style.css.
	 *
	 * @since 1.0
	 */

	public function css( $templates ) {
		$templates['videos'] = trailingslashit( get_stylesheet_directory() ) . 'dropins/videos/css.css';
		return $templates;
	}

	/**
	 * Add new image size for featured video thumbnails.
	 *
	 * @since 1.0
	 */

	public function after_setup_theme() {
		add_image_size( 'md-video-thumbnail', 320, 180, true );
	}

	/**
	 * Create custom post type that shows in admin panel.
	 *
	 * @since 1.0
	 */

	function add_post_types() {
		$slug = ! empty( $this->_get_option['slug'] ) ? $this->_get_option['slug'] : $this->slug;

		register_post_type( $this->slug, array(
			'public'        => true,
			'menu_position' => 10,
			'taxonomies'    => array( "{$this->slug}_{$this->playlist_slug}", "{$this->slug}_{$this->tag_slug}" ),
			'has_archive'   => true,
			'supports'      => array( 'title', 'excerpt', 'editor', 'thumbnail', 'comments' ),
			'menu_icon'     => 'dashicons-editor-video',
			'rewrite'       => array( 'slug' => $slug, 'with_front' => false ),
			'labels'        => array(
				'name'               => __( 'Videos', 'md-videos' ),
				'singular_name'      => __( 'Video', 'md-videos' ),
				'menu_name'          => __( 'Videos', 'md-videos' ),
				'name_admin_bar'     => __( 'Videos', 'md-videos' ),
				'add_new_item'       => __( 'Add New Video', 'md-videos' ),
				'edit_item'          => __( 'Edit Video', 'md-videos' ),
				'new_item'           => __( 'New Video', 'md-videos' ),
				'view_items'         => __( 'View Videos', 'md-videos' ),
				'view_item'          => __( 'View Video', 'md-videos' ),
				'search_items'       => __( 'Search Videos', 'md-videos' ),
				'not_found'          => __( 'No videos found', 'md-videos' ),
				'not_found_in_trash' => __( 'No videos found in trash', 'md-videos' ),
				'all_items'          => __( 'All Videos', 'md-videos' )
			)
		) );
	}

	/**
	 * Add taxonomies/categories meta to our custom post type.
	 *
	 * @since 1.0
	 */

	public function add_taxonomies() {
		$taxonomies = array(
			$this->playlist_slug => array(
				'hierarchical' => true,
				'plural'       => __( 'Playlists', 'md-videos' ),
				'singular'     => __( 'Playlist', 'md-videos' )
			),
			$this->tag_slug => array(
				'hierarchical' => false,
				'plural'       => 'Tags',
				'singular'     => 'Tag',
			)
		);

		foreach ( $taxonomies as $taxonomy => $fields )
			register_taxonomy( "{$this->slug}_$taxonomy", $this->slug, array(
				'show_ui'      => true,
				'query_var'    => true,
				'rewrite'      => array(
					'slug'         => "{$this->slug}/$taxonomy",
					'with_front'   => false,
					'hierarchical' => $fields['hierarchical']
				),
				'capabilities' => array( 'manage_categories' ),
				'labels'       => array(
					'menu_name'     => $fields['plural'],
					'name'          => $fields['plural'],
					'search_items'  => $fields['plural'],
					'singular_name' => $fields['singular'],
					'all_items'     => 'All ' . $fields['plural'],
					'edit_item'     => 'Edit ' . $fields['singular'],
					'update_item'   => 'Update ' . $fields['singular'],
					'add_new_item'  => 'Add New ' . $fields['singular'],
					'new_item_name' => 'New ' . $fields['singular'] . ' Name'
				)
			) );
	}

	/**
	 * Add Videos to custom Sidebars Manager.
	 *
	 * @since 1.0
	 */

	public function sidebars( $sidebars ) {
		$sidebars[$this->slug] = array(
			'archive' => true,
			'single'  => true
		);
		return $sidebars;
	}

}

$md_videos = new md_videos;


/**
 * Pull data from the YouTube API in a flexibld way and return error if
 * no data is found. Used on both frontend and backend to make requests,
 * recommended using on transient check or in a one-time process.
 *
 * @since 1.0
 */

function md_get_youtube_api( $source, $part, $video_id = null, $channel_id = null ) {
	$api     = md_setting( array( 'videos', 'api' ) );
	$channel = md_setting( array( 'videos', 'channel' ) );

	$source  = isset( $source ) ? $source : 'videos';
	$part    = 'part=' . ( isset( $part ) ? $part : 'snippet' );
	$video   = isset( $video_id ) ? "&id={$video_id}" : '';
	$channel = isset( $channel_id ) ? "&id={$channel}" : '';

	$url = "https://www.googleapis.com/youtube/v3/{$source}?{$part}{$video}{$channel}&key={$api}";

	$headers = get_headers( $url );
	$code    = substr( $headers[0], 9, 3 );

	if ( $code == 200 ) {
		$json = file_get_contents( $url );
		$data = json_decode( $json );

		if ( $data->pageInfo->totalResults == 0 )
			return 'error';

		return $data;
	}
	else
		return 'error';
}