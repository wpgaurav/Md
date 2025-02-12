<?php if ( have_posts() ) :
    $post_class = array();
    $columns = ! empty( $loop['columns'] ) ? $loop['columns'] : 3;
    $columns_classes = $columns > 1 ? " columns-$columns columns-single columns-flex" : '';
    $c = 0; // Initialize $c
?>
    <div class="blog-teasers<?php echo esc_attr( $columns_classes ); ?>">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post_<?php the_ID(); ?>" class="col">
                <?php md_hook_teaser_top(); ?>
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php md_featured_image( 'above_headline', 'md-banner', array( 'hide_caption' => true ) ); ?>
                <?php endif; ?>
                <div class="<?php echo md_teaser_classes(); ?>">
                    <?php md_hook_before_headline(); ?>
                    <h3 class="headline small-title" style="font-weight:700"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'md' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark" class="has-bg-highlight-color"><?php the_title(); ?></a></h3>
                    <?php
                    // md_hook_after_headline();
                    ?>
                    <?php md_hook_teaser_bottom(); ?>
                </div>
            </article>
            <?php md_hook_x_loop( $c ); ?>
        <?php $c++; endwhile; ?>
    </div>
<?php else : ?>
    <?php md_404_template(); ?>
<?php endif; ?>