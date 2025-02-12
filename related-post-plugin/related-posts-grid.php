<?php
/**
 * TaxTemplate: Grid
 * Description: Display related posts in a 3-column grid with thumbnails and titles.
 * 
 * The following variables are available:
 *
 * @var array $related_posts Array with related post objects or related post IDs.
 * @var array $rpbt_args     Array with widget, shortcode, rest API or editor block arguments.
 */
?>

<?php if ( $related_posts ) : ?>
    <?php
    // Get the current page or post ID for utm_source
    $current_post_id = is_singular() ? get_queried_object_id() : 0; // Fallback to 0 if not on a singular page.
    ?>
<div class="inner block-single-tb">
	<h3 class="text-center">
		More for you →
	</h3>
    <div class="related-posts-grid grid-3 alignwide">
        <?php foreach ( $related_posts as $post ) : ?>
            <?php
            // Ensure $post is a WP_Post object
            $post = get_post( $post );
            if ( ! $post ) {
                continue;
            }

            // Generate the URL with UTM parameters
            $post_url = add_query_arg(
                [
                    'utm_source' => $current_post_id,
                    'utm_medium' => 'related',
                    'utm_campaign' => 'related_tax',
                ],
                get_permalink( $post->ID )
            );
            ?>
            <div class="related-post-item card has-nopadding">
                <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
                    <a href="<?php echo esc_url( $post_url ); ?>" style="display: block;">
                        <?php echo get_the_post_thumbnail( $post->ID, $rpbt_args['image_size'] ?? 'md-banner', [ 'style' => 'border-radius: var(--radius-s) var(--radius-s) 0 0; aspect-ratio:12/5; object-fit:cover' ] ); ?>
                    </a>
                <?php else : ?>
                    <a href="<?php echo esc_url( $post_url ); ?>" style="display: block;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 250" width="100%" height="auto" style="border-radius: var(--radius-s) var(--radius-s) 0 0;">
                            <rect width="600" height="250" fill="#cccccc"></rect>
                            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-family="monospace" font-size="20" fill="#333333">Featured Image</text>   
                        </svg>
                    </a>
                <?php endif; ?>
                <p style="font-size: var(--fs-s); line-height: 1.4; font-weight: 700; padding:1rem; margin-bottom:0" class="mb-none">
                    <a href="<?php echo esc_url( $post_url ); ?>" style="text-decoration: none; color:#080808">
                        <?php echo esc_html( get_the_title( $post->ID ) ); ?>
                    </a>
                </p>
            </div>
        <?php endforeach; ?>
	</div></div>
<?php else : ?>
    <p>No related posts found.</p>
<?php endif; ?>