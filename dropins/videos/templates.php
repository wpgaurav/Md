<?php
/**
 * This class holds all template code added throughout Videos
 * pages and custom post types.
 *
 * @since 1.0
 */

class md_videos_templates extends md_api {

	/**
	 * Start the engine, override data to match main class.
	 *
	 * @since 1.0
	 */

	public function actions() {
		$this->_id = 'md_videos';
		$this->slug = 'videos';
		$this->featured_video = 'md_featured_video_youtube';
		$this->_get_option = md_setting( array( 'videos' ) );
		add_shortcode( 'youtube_bar', array( $this, 'youtube_bar_shortcode' ) );
	}

	/**
	 * Manipulate pages, fire hooks to template_redirect.
	 *
	 * @since 1.0
	 */

	public function template() {
		$channel_data = $this->channel_data();

		// is connected
		if ( ! empty( $channel_data ) && ( is_post_type_archive( $this->slug ) || is_singular( $this->slug ) ) )
			add_action( 'wp_enqueue_scripts', array( $this, 'youtube_scripts' ) );

		// video archive page
		if ( is_post_type_archive( $this->slug ) ) {
			// youtube bar
			if ( ! empty( $channel_data ) && empty( $this->_get_option['youtube_bar']['disable'] ) )
				add_action( 'md_hook_before_content_box', array( $this, 'youtube_bar' ) );
			// page title
			if ( ! empty( $this->_get_option['title'] ) || ! empty( $this->_get_option['subtitle'] ) )
				add_action( 'md_hook_before_content_box', array( $this, 'archive_head' ) );
			// sidebar
			if ( md_setting( array( 'sidebars', 'videos_archive' ) ) )
				add_filter( 'md_filter_has_sidebar', '__return_true' );
			else
				add_filter( 'md_filter_has_sidebar', '__return_false' );
			// other layout elements
			remove_action( 'md_hook_content', 'md_archives_title' );
			add_filter( 'md_filter_loop_type', array( $this, 'loop' ) );
			add_filter( 'excerpt_length', array( $this, 'excerpt_length' ) );
			add_action( 'md_hook_teaser_top', array( $this, 'teaser_thumbnail' ) );
			add_action( 'md_hook_teaser_bottom', array( $this, 'teaser_byline' ) );
		}

		// single video pages
		if ( is_singular( $this->slug ) ) {
			if ( md_post_meta( array( 'featured_video', 'youtube' ) ) )
				add_action( 'md_hook_content_item', array( $this, 'video_byline' ) );
			if ( md_setting( array( 'videos', 'videos_single' ) ) )
				add_filter( 'md_filter_has_sidebar', '__return_true' );
			elseif ( ! md_has_sidebar() )
				add_filter( 'md_filter_has_sidebar', '__return_false' );
		}
	}

	/**
	 * Build YouTube Bar HTML.
	 *
	 * @since 1.0
	 */

	public function youtube_bar() {
		$featured = new WP_Query( array(
			'post_type'           => $this->slug,
			'videos_tag'          => 'featured',
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => 1
		) );
		$channel = $this->channel_data();
		$url     = 'https://www.youtube.com/' . ( ! empty( $channel['url'] ) ? esc_attr( $channel['url'] ) : 'channel/' . esc_attr( $this->_get_option['channel'] ) );
	?>

		<div class="video-bar box mb-double shadow">
			<div class="inner block-single-tb clear">

				<div class="video-author">

					<img src="<?php echo esc_url( $channel['photo'] ); ?>" height="60" width="60" class="circle avatar mr-half" />

					<p class="video-author-name mb-none"><a href="<?php echo esc_url( $url ); ?>" target="_blank" class="h-bold"><?php echo esc_html( $channel['name'] ); ?></a></p>

					<div class="g-ytsubscribe" data-channelid="<?php esc_attr_e( md_setting( array( 'videos', 'channel' ) ) ); ?>" data-layout="default" data-count="default"></div>

				</div>

				<?php if ( $featured->have_posts() ) : ?>

					<div class="video-featured">

						<div class="columns-3 columns-single columns-flex text-center">

							<?php while ( $featured->have_posts() ) : $featured->the_post(); ?>

								<div class="col text-left">

									<?php if ( has_post_thumbnail() ) : ?>
										<a href="<?php the_permalink(); ?>" class="video-thumbnail"><?php the_post_thumbnail( 'md-video-thumbnail' ); ?></a>
									<?php else : ?>
										<?php $this->teaser_thumbnail(); ?>
									<?php endif; ?>

									<div class="video-featured-meta">

										<p class="video-featured-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

										<?php if ( md_post_meta( array( 'featured_video', 'youtube' ) ) ) : ?>
											<p class="video-featured-views"><?php echo number_format( $this->video_views() ); ?> <?php _e( 'views', 'md-videos' ); ?></p>
										<?php endif; ?>

									</div>

								</div>

							<?php endwhile; ?>

							<?php wp_reset_postdata(); ?>

						</div>

					</div>

				<?php endif; ?>

			</div>
		</div>

	<?php }

	/**
	 * Output the YouTube Bar template to a shortcode.
	 *
	 * @since 1.0
	 */

	public function youtube_bar_shortcode() {
		ob_start();
		$this->youtube_scripts();
		$this->youtube_bar();
		return ob_get_clean();
	}

	/**
	 * Build YouTube Bar HTML.
	 *
	 * @since 1.0
	 */

	public function archive_head() { ?>

		<div class="archive-head">
			<div class="inner">

				<div class="format block-double-lr text-sep text-center">

					<?php if ( md_setting( array( 'videos', 'title' ) ) ) : ?>
						<h1 class="mb-half"><?php echo md_setting( array( 'videos', 'title' ) ); ?></h1>
					<?php endif; ?>

					<?php if ( md_setting( array( 'videos', 'subtitle' ) ) ) : ?>
						<p class="small-text text-sec"><?php echo md_setting( array( 'videos', 'subtitle' ) ); ?></p>
					<?php endif; ?>

				</div>

			</div>
		</div>

	<?php }

	/**
	 * Load Google API script.
	 *
	 * @since 1.0
	 */

	public function youtube_scripts() {
		wp_enqueue_script( 'google-api', 'https://apis.google.com/js/platform.js', array(), '', true );
	}

	/**
	 * Return name of Loop template to load on Videos archive.
	 *
	 * @since 1.0
	 */

	public function loop() {
		return 'teasers';
	}

	/**
	 * Adjust excerpt length on archive page.
	 *
	 * @since 1.0
	 */

	public function excerpt_length() {
		return 25;
	}

	/**
	 * Build out the Video Bar template for use beaneath videos.
	 *
	 * @since 1.0
	 */

	public function video_byline() {
		$views = $this->video_views();
	?>

		<div class="video-byline">
			<div class="inner">

				<div class="block-single-lr block-half text-sec clear">

					<div class="video-author">

						<?php echo get_avatar( get_the_author_meta( 'ID' ), 50, '', false, array(
							'class' => 'circle mr-half'
						) ); ?>

						<p class="video-author-name mb-none"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author(); ?></a></p>

						<?php if ( md_has_comments() ) : ?>
							<span class="video-byline-item"><a href="<?php comments_link(); ?>"><i class="byline-item-icon md-icon-chat"></i> <?php comments_number( '0', '1', '%' ); ?></a></span>
						<?php endif; ?>

						<div class="g-ytsubscribe" data-channelid="<?php esc_attr_e( md_setting( array( 'videos', 'channel' ) ) ); ?>" data-layout="default" data-count="default"></div>

					</div>

					<?php if ( ! empty( $views ) ) : ?>
						<p class="video-views mt-half mb-none"><span class="video-views-count"><?php echo number_format( $views ); ?></span> <?php _e( 'views', 'md-videos' ); ?></p>
					<?php endif; ?>

				</div>

			</div>
		</div>

	<?php }

	/**
	 * Display YouTube image thumbnail in Teasers if no Featured Image is detected.
	 *
	 * @since 1.0
	 */

	public function teaser_thumbnail() {
		$image = md_post_meta( array( 'featured_video', 'thumbnail' ) );

		if ( has_post_thumbnail() || empty( $image ) )
			return;
	?>

		<a href="<?php the_permalink(); ?>" class="video-thumbnail">
			<img src="<?php echo esc_url( $image ); ?>" alt="<?php the_title(); ?>" class="width-full" />
		</a>

	<?php }

	/**
	 * Byline HTML that we'll hook into the bottom of the teasers.
	 *
	 * @since 1.0
	 */

	public function teaser_byline() {
		$views = $this->video_views();
	?>

		<p class="video-teaser-byline">

			<?php if ( ! empty( $views ) ) : ?>
				<span class="video-views">
					<span class="video-views-count"><?php echo number_format( $views ); ?></span>
					<?php _e( ' views', 'md-videos' ); ?>
				</span>
			<?php endif; ?>

			<time class="mr-small" datetime="<?php the_date( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>

			<?php if ( md_has_comments() ) : ?>
				<a href="<?php comments_link(); ?>"><i class="byline-item-icon md-icon-chat"></i> <?php comments_number( '0', '1', '%' ); ?></a>
			<?php endif; ?>

		</p>

	<?php }

	/**
	 * Check if YouTube is connected to site.
	 *
	 * @since 1.0
	 */

	public function is_connected() {
		if ( md_setting( array( 'videos', 'api' ) ) && md_setting( array( 'videos', 'channel' ) ) )
			return true;
	}

	/**
	 * Get YouTube channel data.
	 *
	 * @since 1.0
	 */

	public function channel_data() {
		$name      = "{$this->_id}_channel_data";
		$transient = get_transient( $name );

		if ( ! empty( $transient ) )
			return $transient;
		else {
			$data = md_get_youtube_api( 'channels', 'snippet', null, true );

			if ( $data == 'error' )
				return;

			$channel          = array();
			$channel['name']  = $data->items[0]->snippet->title;
			$channel['url']   = $data->items[0]->snippet->customUrl;
			$channel['photo'] = $data->items[0]->snippet->thumbnails->default->url;

			set_transient( $name, $channel, DAY_IN_SECONDS );

			return $channel;
		}
	}


	/**
	 * Get views count.
	 *
	 * @since 1.0
	 */

	public function video_views( $post_id = null ) {
		$id       = isset( $post_id ) ? $post_id : get_the_ID();
		$name     = "{$this->_id}_{$id}_views";
		$transient = get_transient( $name );

		if ( ! empty( $transient ) )
			return $transient;
		else {
			$video_id = md_post_meta( array( 'featured_video', 'youtube' ) );
			$data     = md_get_youtube_api( 'videos', 'statistics', $video_id );

			if ( $data == 'error' )
				return;

			$views = $data->items[0]->statistics->viewCount;

			set_transient( $name, $views, DAY_IN_SECONDS );

			return $views;
		}
	}

}

$md_videos_templates = new md_videos_templates;