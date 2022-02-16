<?php echo do_shortcode('[sc name="home01"][/sc]');?>
<?php echo do_shortcode('[sc name="home02"][/sc]');?>
<?php 
   // the query
   $the_query = new WP_Query( array(
      'posts_per_page' => 1,
	   'post_type' => 'post',
   )); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="mt-half loop-blocks inner" id="articles">
	<div class="inner text-center"><p class="large-title block-half-tb">Latest from the Blog</p></div>
	<div class="home-single">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<article id="content-<?php the_ID(); ?>" class="post-box block-half white has-bold-border" style="margin-bottom:12px"><div class="content-inner-x">
					<?php md_hook_teaser_top(); ?>
					<?php if ( has_post_thumbnail() ) : ?>
			<div class="featured-image">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'md' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
							<?php the_post_thumbnail( 'md-block' ); ?>
						</a>
					</div>
					<?php endif; ?>
			<div class="post-content">
					<div class="content-headline mt-single">
						<h3 class="headline med-title"><a href="<?php the_permalink(); ?>" title="<?php echo sprintf( __( 'Permanent Link to %s', 'md' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h3>
						<div class="byline mt-half">
								<?php md_byline_item( 'date' ); ?>
								<?php md_byline_item( 'author' ); ?>
							</div>
					</div>
						<div class="content-text-home mt-half">
							<?php the_excerpt(); ?>
							<div class="mt-single">
							<a href="<?php the_permalink(); ?>" class="button button-arrow black">Read full article</a>
							</div>
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
<?php 
   // the query
   $the_query = new WP_Query( array(
      'posts_per_page' => 4,
	  'ignore_sticky_posts' => 1,
	   'offset' => 1,
	   'post_type' => 'post',
   )); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="inner block-single white has-bold-border">
	<div class="columns-2 columns-single">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div id="content-<?php the_ID(); ?>" class="col mb-half" style="padding: 6px">
					<?php md_hook_teaser_top(); ?>
					<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" style="float:left; padding-right:10px"><?php the_post_thumbnail( 'md-thumbnail' ); ?></a>
					<?php endif; ?>
						<h3 class="teaser-title mb-small" style="font-size:19px; line-height:1.4; text-align:left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		</div>
		<?php endwhile; ?>
	</div>
<div class="content-upgrade box-lr block-single">
<div class="content-upgrade-text block-half">
<p>Visit my blog for more tutorials, blogging tips, business guides &amp; study notes.</p>
</div>
<div class="content-upgrade-action">
<a href="/blog/" class="button button-arrow black border-radius">Visit blog</a>
</div>
</div>
</div>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
<?php 
   // the query
   $the_query = new WP_Query( array(
     'posts_per_page' => 11,
	  'ignore_sticky_posts' => 1,
	   'post_type' => 'glossary',
   )); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="inner block-single latest-glossary">
<h2 class="large-title text-center block-single">Latest Glossary Terms and Definitions</h2>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="block-half" style="display:inline-block"><i class="icon-folder"></i> <?php the_title(); ?></a>
		<?php endwhile; ?>
</div>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
<?php echo do_shortcode('[sc name="home06"][/sc]');?>
<?php echo do_shortcode('[sc name="home05"][/sc]');?>
<?php echo do_shortcode('[sc name="featured-content-home"][/sc]');?>
<?php echo do_shortcode('[sc name="home04"][/sc]');?>
