<?php 
   // the query
   $the_query = new WP_Query( array(
   	'post_type' => 'deal',
      'posts_per_page' => 2,
	   'orderby' => 'rand',
	   'order' => 'DESC',
   )); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<section class="widget_text widget widget_custom_html">
	<div class="columns-single columns-flex">
		<h3 class="widget-title small-title text-center">
			Recommended Deals for you
		</h3>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<article id="content-<?php the_ID(); ?>" class="col mb-single">
			<div class="white" style="border:1px solid #ddd">
					<?php md_hook_teaser_top(); ?>
					<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'md' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php md_featured_image( 'above_headline', 'md-banner' ); ?></a>
					<?php endif; ?>
    <div class="block-single text-center">
						<h3 class="teaser-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'md' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			</div>
		</div>
		</article>
		<?php endwhile; ?>
	</div>
</section>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>