<?php
/**
 * This class adds all MD Videos admin options and screens
 * to the WordPress interface.
 *
 * @since 1.0
 */

class md_videos_admin extends md_api {

	/**
	 * Start the engine, override data to match main class.
	 *
	 * @since 1.0
	 */

	public function construct() {
		$this->_id = 'md_videos';
		$this->slug = 'videos';
		add_filter( 'md_post_type_meta', array( $this, 'add_post_type_meta' ) );
		add_action( 'admin_bar_menu', array( $this, 'admin_link' ), 999 );
		add_action( 'wp_ajax_youtube_import', array( $this, 'youtube_import' ) );
	}

	public function register() {
		return array(
			'admin_page' => array(
				'name' => __( 'Settings', 'md-videos' ),
				'parent_slug' => 'edit.php?post_type=videos',
				'menu_slug' => 'videos',
				'panel_tab' => false,
				'fields' => array(
					'api' => array( 'type' => 'text' ),
					'channel' => array( 'type' => 'text' ),
					'slug' => array( 'type' => 'text' ),
					'title' => array( 'type' => 'text' ),
					'subtitle' => array( 'type' => 'text' ),
					'youtube_bar' => array(
						'type'    => 'checkbox',
						'options' => array( 'disable' )
					)
				)
			)
		);
	}

	/**
	 * Add MD meta to custom post type.
	 *
	 * @since 1.0
	 */

	public function add_post_type_meta( $post_type ) {
		$post_type[] = $this->slug;
		return $post_type;
	}

	/**
	 * Create admin page for Video Settings.
	 *
	 * @since 1.0
	 */

	public function admin_page() { ?>
		<div class="md-content-wrap-wide">
			<h1 class="md-spacer"><?php _e( 'Video Settings', 'md-videos' ); ?></h1>
			<hr class="md-sep-small" />
			<div class="columns-2 columns-single md-sep-small">
				<div class="col">
					<div class="md-widget md-toggle md-sep-small">
						<h3 class="md-widget-title"><?php echo __( 'YouTube Account Setup', 'md' ); ?></h3>
						<div class="md-widget-item">
							<?php $this->meta_setup(); ?>
						</div>
					</div>
					<div class="md-widget md-toggle md-sep-small">
						<h3 class="md-widget-title"><?php echo __( 'Import Videos', 'md' ); ?></h3>
						<div class="md-widget-item">
							<?php $this->meta_import(); ?>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="md-widget md-toggle md-sep-small">
						<h3 class="md-widget-title"><?php echo __( 'Video Archives Page', 'md' ); ?></h3>
						<div class="md-widget-item">
							<?php $this->meta_archive(); ?>
						</div>
					</div>
				</div>
			</div>
			<hr class="md-sep-small" />
			<?php $this->fields->save(); ?>
		</div>
	<?php }


	/**
	 * Build HTML options for the Account Setup meta box.
	 *
	 * @since 1.0
	 */

	public function meta_setup() { ?>

		<div class="md-spacer-med">
			<?php $this->desc( __( 'To activate the YouTube video importer and show data about videos on your site, enter your YouTube account keys in the text fields below:', 'md-videos' ) ); ?>
		</div>

		<!-- API Key -->

		<div class="md-sep-small">
			<?php $this->label( 'api', __( 'YouTube API Key', 'md-videos' ) ); ?>
			<?php $this->field( 'text', 'api' ); ?>
			<?php $this->desc( '<a href="https://marketersdelight.net/video-gallery-guide/#youtube_api_key" target="_blank">Get your YouTube API Key</a>.' ); ?>
		</div>

		<!-- Channel ID -->

		<p>
			<?php $this->label( 'channel', __( 'YouTube Channel ID', 'md-videos' ) ); ?>
			<?php $this->field( 'text', 'channel' ); ?>
			<?php $this->desc( '<a href="https://www.youtube.com/account_advanced" target="_blank">Get your YouTube Channel ID</a>.' ); ?>
		</p>

	<?php }


	/**
	 * Build HTML options for the Archive meta box.
	 *
	 * @since 1.0
	 */

	public function meta_archive() { ?>

		<table class="form-table">
			<tbody>

				<!-- YouTube Bar -->

				<tr>
					<th>
						<?php $this->label( 'youtube_bar', __( 'YouTube Bar', 'md-videos' ) ); ?>
					</th>
					<td>
						<?php $this->field( 'checkbox', 'youtube_bar', array(
							'disable' => __( '<b>Disable</b> YouTube Bar', 'md-videos' ),
						) ); ?>
						<?php $this->desc( __( '<b>Tip:</b> Add the <b>featured</b> tag to any video to show at top of the page.', 'md-videos' ) ); ?>
					</td>
				</tr>

				<!-- Page Title -->

				<tr>
					<th>
						<?php $this->label( 'title', __( 'Page Title', 'md-videos' ) ); ?>
					</th>
					<td>
						<?php $this->field( 'text', 'title' ); ?>
					</td>
				</tr>

				<!-- Page Subtitle -->

				<tr>
					<th>
						<?php $this->label( 'subtitle', __( 'Page Subtitle', 'md-videos' ) ); ?>
					</th>
					<td>
						<?php $this->field( 'text', 'subtitle' ); ?>
					</td>
				</tr>

				<!-- Page Slug -->

				<tr>
					<th>
						<?php $this->label( 'slug', __( 'Page URL Slug', 'md-videos' ) ); ?>
					</th>
					<td>
						<?php $this->field( 'text', 'slug', null, array(
							'atts' => array(
								'placeholder' => $this->slug
							)
						) ); ?>
					</td>
				</tr>

			</tbody>
		</table>

	<?php }


	/**
	 * Build HTML options for video importer meta box.
	 *
	 * @since 1.0
	 */

	public function meta_import() { ?>

		<?php if ( md_setting( array( 'videos', 'api' ) ) ) : ?>

			<div id="<?php echo $this->_id; ?>_youtube_import_row">

				<?php $this->fields->field( 'import', array(
					'type' => 'group',
					'callback' => array( $this, 'import_fields' ),
					'add_new'  => __( '+ Add Video', 'md-videos' )
				) ); ?>

				<?php $this->desc( __( 'Enter the video ID from your YouTube URL to publish videos to your site. <br /><b>Example:</b> <code>https://www.youtube.com/watch?v=<b style="color: red;">XXXXXXXXXXX</b></code>', 'md-videos' ) ); ?>

				<?php submit_button( __( 'Import Videos &rarr;', 'md-videos' ), 'secondary', "{$this->_id}_import_button", true ); ?>

			</div>

		<?php else : ?>

			<?php $this->desc( __( 'To import videos, first connect your YouTube account by entering your <b>API Key</b> + <b>Channel ID</b> in the "Account Setup" box.', 'md-videos' ) ); ?>

		<?php endif; ?>

	<?php }


	/**
	 * Build the contents of repeater field (only need text ID field).
	 *
	 * @since 1.0
	 */

	public function import_fields( $group, $field ) {
		$this->fields->field( array( $group, $field, 'id' ), array( 'type' => 'text' ) );
	}


	/**
	 * Add View Videos link to admin toolbar on settings page.
	 *
	 * @since 1.0
	 */

	public function admin_link( $wp_admin_bar ) {
		if ( ! is_admin() )
			return;

		$screen = get_current_screen();
		$args   = array();

		if ( $screen->base == 'videos_page_md_videos' )
			$wp_admin_bar->add_node( array(
				'id'    => $this->_id,
				'title' => __( 'View Videos', 'md-videos' ),
				'href'  => get_post_type_archive_link( $this->slug ),
				'meta'  => array( 'target' => '_blank' )
			) );
	}


	/**
	 * Print script to footer.
	 *
	 * @since 1.0
	 */

	public function admin_scripts() { ?>

		<script>
			( function( $ ) {
				$( document ).on( 'click', '#<?php echo $this->_id; ?>_import_button', function( event ) {
					event.preventDefault();
					$this = $( this );
					$.post({
						url: ajaxurl,
						data: {
							action: 'youtube_import',
							form: $( '#md-form' ).serialize()
						},
						beforeSend: function() {
							$this.prop( 'disabled', true );
							$this.prop( 'value', 'Importing...' );
							$this.after( '<i class="md-spinner dashicons dashicons-update" style="display:inline-block;padding:5px 0 0 5px;"></i>' );
						},
						success: function( html ) {
							$( '#<?php echo $this->_id; ?>_youtube_import_row' ).html( html );
						}
					});
				});
			})( jQuery );
		</script>

	<?php }


	/**
	 * Import YouTube data on AJAX action.
	 *
	 * @since 1.0
	 */

	public function youtube_import() {
		parse_str( stripslashes( $_POST['form'] ), $form ); // form data passed on AJAX call

		if ( ! wp_verify_nonce( $form['_wpnonce'], $form['option_page'] . '-options' ) ) // use native nonce
			die ( __( 'Sorry, there was an error during the connection process. Please try again.', 'md-videos' ) );

		$api_key = $form['marketers_delight'][$this->_clean_id]['api'];
		$imports = $form['marketers_delight'][$this->_clean_id]['import'];

		if ( ! empty( $imports[0]['id'] ) ) {
			foreach ( $imports as $count => $video ) {
				$video_id = trim( $video['id'] );
				$data     = md_get_youtube_api( 'videos', 'snippet', $video_id );
				$total    = $data->pageInfo->totalResults;

				// success
				if ( $data != 'error' && ! empty( $total ) && $total == 1 ) {
					$snippet = $data->items[0]->snippet;

					$post_id = wp_insert_post( array(
						'post_type'    => $this->slug,
						'post_status'  => 'publish',
						'post_title'   => $snippet->title,
						'post_date'    => $snippet->publishedAt,
						'post_content' => substr( $snippet->description, 0, 500 ),
						'meta_input'   => array(
							'marketers_delight' => array(
								'featured_video' => array(
									'service'   => 'youtube',
									'youtube'   => $video_id,
									'thumbnail' => $snippet->thumbnails->medium->url

								)
							)
						)
					) );

					if ( ! empty( $snippet->tags ) )
						wp_set_object_terms( $post_id, $snippet->tags, 'videos_tag' );

					echo '<p class="green"><i class="dashicons dashicons-yes"></i> Video: "<b>' . esc_html( $snippet->title ) . '</b>" successfully imported. <a href="' . get_edit_post_link( $post_id ) . '">Edit Video</a> | <a href="' . get_permalink( $post_id ) . '" target="_blank">View Video &rarr;</a>';
				}
				// fail
				else
					echo '<p class="red"><i class="dashicons dashicons-no"></i> Video with the ID of "<b>' . esc_html( $video_id ) . '</b>" failed to import. Please make sure the video is publicly available on YouTube and the video ID matches from the URL exactly. Also make sure your YouTube API key is correct.';
			}

			// actions
			echo
				'<p>'.
					'<a href="' . admin_url( $this->admin_page['parent_slug'] ) . '" class="button button-primary">Edit Videos</a>&nbsp;&nbsp;&nbsp;'.
					'<a href="' . admin_url( $this->admin_page['parent_slug'] . '&page=' . $this->admin_page['menu_slug'] ) . '" class="button">Run importer again &rarr;</a>'.
				'</p>';
		}
		else {
			echo 'Please enter at least 1 video ID to run the importer. <a href="' . admin_url( $this->admin_page['parent_slug'] . '&page=' . $this->admin_page['menu_slug'] ) . '">Try again &rarr;</a>';
		}

		die();
	}

}

new md_videos_admin;