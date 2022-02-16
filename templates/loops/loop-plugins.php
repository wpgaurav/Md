<!-- Web Tools Query -->
<h2 class="text-center block-single-tb">Free Web Tools</h2>
<?php 
   // the query
   $the_query = new WP_Query( array(
    'posts_per_page' => -1,
	  'post_type' => 'snippet',
	  'tax_query' => array(
        array (
            'taxonomy' => 'programming_language',
            'field' => 'slug',
            'terms' => 'web-tools',
        )
   ))); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="accordion inner block-single white">
	<div class="columns-2 columns-single columns-flex">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div id="content-<?php the_ID(); ?>" class="col">
						<h3 class="teaser-title block-single-tb" style="color:#333; font-weight:600"><a href="<?php the_permalink(); ?>"><i class="icon-triangle-right"></i> <?php the_title(); ?></a></h3>
		</div>
		<?php endwhile; ?>
	</div>
</div>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>