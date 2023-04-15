<div class="inner block-half">
<!-- Featured Reviews Saved	 -->
<h2 id="featured-reviews" class="large-title block-single-tb">Featured Reviews</h2>
<p class="subtitle">Here are the products that I have used, analyzed and reviewed recently. I review SaaS, Tech, Education, WordPress and Business related products and services.
	</p>
<?php 
   // the query
   $the_query = new WP_Query( array(
   	'post_type' => 'post',
	   'tag' =>'featured-reviews',
      'posts_per_page' => 6,
	   'ignore_sticky_posts' => 1
   )); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="content-standard content-tease mt-single inner" id="feat-reviews">
	<div class="columns-3 columns-single columns-flex">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<article id="content-<?php the_ID(); ?>" class="col mb-single">
			<div class="white has-border">
					<?php md_hook_teaser_top(); ?>
					<?php if ( has_post_thumbnail() ) : ?>
				<a style="border-bottom:0" href="<?php the_permalink(); ?>" title="<?php echo sprintf( __( 'Permanent Link to %s', 'md' ), the_title_attribute( 'echo=0' ) ); ?>"><?php md_featured_image( 'above_headline', 'md-banner' ); ?></a>
					<?php endif; ?>
			<h3 class="block-half text-center small-title trim-two-line" style="min-height:105px"><a href="<?php the_permalink(); ?>" title="<?php echo sprintf( __( 'Permanent Link to %s', 'md' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h3>
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
</div>