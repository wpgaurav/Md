<h2 id="all-tools" class="block-single text-center">Other Recommended Tools</h2>
<?php 
   // the query
   $the_query = new WP_Query( array(
   	'post_type' => 'tool',
      'posts_per_page' => -1,
	   'ignore_sticky_posts' => 1,
	   'orderby' => 'modified'
   )); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="content-standard content-tease mt-single inner">
	<div class="columns-3 columns-single columns-flex">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<article id="content-<?php the_ID(); ?>" class="col mb-single min-h">
			<div class="white" style="border:1px solid #ddd">
					<?php md_hook_teaser_top(); ?>
					<?php if ( has_post_thumbnail() ) : ?>
				<a style="border-bottom:0" href="<?php the_permalink(); ?>" title="<?php echo sprintf( __( 'Learn more about %s', 'md' ), the_title_attribute( 'echo=0' ) ); ?>" rel="nofollow sponsored"><?php md_featured_image( 'above_headline', 'md-banner' ); ?></a>
					<?php endif; ?>
				<h3 class="med-title text-center mt-single"><a style="border-bottom:0" href="<?php the_permalink(); ?>" title="<?php echo sprintf( __( 'Learn more about %s', 'md' ), the_title_attribute( 'echo=0' ) ); ?>" rel="nofollow sponsored"><?php the_title(); ?></a></h3>
    <div class="text-center min-h">
		<?php if( get_field('coupon_code') ): ?>
	<p class="md-coupon has-coupon-icon"><?php the_field('coupon_code'); ?></p>
<?php endif; ?>
			<div style="font-size:17px; line-height:1.5; padding:15px;">
				<?php the_excerpt();?>
			</div>
			</div>
		</div>
		</article>
		<?php endwhile; ?>
	</div>
</div>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
<!-- First Section End -->