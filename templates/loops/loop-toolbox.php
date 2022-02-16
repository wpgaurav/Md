<h2 id="all-tools" class="block-single text-center">Other Recommended Tools</h2>
<?php 
   // the query
   $the_query = new WP_Query( array(
   	'post_type' => 'tool',
      'posts_per_page' => -1,
	   'ignore_sticky_posts' => 1
   )); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="content-standard content-tease mt-single inner">
	<div class="columns-3 columns-single columns-flex">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<article id="content-<?php the_ID(); ?>" class="col mb-single">
			<div class="white" style="border:1px solid #ddd">
					<?php md_hook_teaser_top(); ?>
					<?php if ( has_post_thumbnail() ) : ?>
			<?php md_featured_image( 'above_headline', 'md-banner' ); ?>
					<?php endif; ?>
			<h3 class="med-title text-center block-single-tb"><?php the_title(); ?></h3>
    <div class="text-center">
			<div style="font-size:17px; line-height:1.5; padding-left:15px; padding-right:15px">
				<?php the_excerpt();?>
			</div>
			<div class="cta-area text-center block-single-tb"><a class="button button-arrow" href="<?php the_field('cta_link');?>" title="<?php the_field('cta');?>" rel="external nofollow sponsored" target="_blank"><?php the_field('cta');?></a></div>
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