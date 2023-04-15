<div class="inner block-single-lr">
<?php 
   // the query
   $the_query = new WP_Query( array(
      'posts_per_page' => 8,
	  'ignore_sticky_posts' => 1,
	   'offset' => 0,
	   'post_type' => 'tool',
	   'orderby' => 'modified',
     'order' => 'DESC',
   )); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<h2 class="med-title block-single-tb">Recommended Tools</h2>
<div class="grid-4 grid-gap tool-grid-home">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div class="block-single-bot" id="content-<?php the_ID(); ?>">
			<?php md_hook_teaser_top(); ?>
			<?php if ( has_post_thumbnail() ) : ?><a href="<?php the_permalink(); ?>" rel="nofollow sponsored"><?php the_post_thumbnail( 'md-banner' ); ?></a><?php endif; ?>
			<h3 class="teaser-title mb-small block-half white has-border" style="font-size:17px; line-height:1.4;"><a href="<?php the_permalink(); ?>" rel="nofollow sponsored"><?php the_title(); ?></a></h3>	
		</div>
		<?php endwhile; ?>
</div>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
	</div>