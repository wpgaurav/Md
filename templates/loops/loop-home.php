<?php 
   // the query
   $the_query = new WP_Query( array(
      'posts_per_page' => 1
   )); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="home-loop md-home" id="articles">
<div class="inner">
<p class="large-title block-half">Latest from the Blog</p>
<div class="blog-teasers columns-2 columns-single columns-flex" id="content">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post();
		$image = wp_get_attachment_url( get_post_thumbnail_id() );
		?>
		<article id="post_<?php the_ID(); ?>" class="col post has-post-thumbnail">
				<div class="content-inner">
				<?php if ( ! empty( $image ) ) : ?>
					<div class="featured-image">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'md' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark" class="has-black-color">
							<?php the_post_thumbnail( 'md-banner' ); ?>
						</a>
					</div>
				<?php endif; ?>
				<div class="blog-teaser block-half white mb-single">
					<div class="content-headline">
						<h3 class="headline med-title" style="line-height:1.4"><a href="<?php the_permalink(); ?>" title="<?php echo sprintf( __( 'Permanent Link to %s', 'md' ), the_title_attribute( 'echo=0' ) ); ?>" class="has-black-color"><?php the_title(); ?></a></h3>
					</div>
					<div class="byline">
						<?php md_byline_item( 'author', array( 'avatar_size' => 40 ) ); ?>
						<?php md_byline_item( 'date' ); ?>
						<?php md_byline_item( 'category' ); ?>
					</div>
					<?php if ( $content !== 'hide' ) : ?>
						<div class="content-text mb-half">
							<?php the_excerpt(); ?>
						</div>
					<?php endif; ?>
					<div class="content-footer block-half-tb <?php echo md_byline_classes(); ?>">
				<div class="content-footer-author">
					<a href="<?php the_permalink(); ?>" class="more-link button button-small mr-small"><?php echo esc_html( md_read_more_text() ); ?></a>
				</div>
			</div>
			<?php do_action( 'md_hook_loop_blocks_bottom' ); ?>
				</div>
			</div>
		</article>
		<?php md_hook_x_loop( $c ); ?>
	<?php $c++; endwhile; ?>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
</div>
</div>
</div>
<?php 
   // the query
   $the_query = new WP_Query( array(
      'posts_per_page' => 6,
	   'offset' => 1,
	   'ignore_sticky_posts' => true
   )); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="home-loop-small md-home">
<div class="inner">
<div class="blog-teasers columns-3 columns-single columns-flex" id="content">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post();
		$image = wp_get_attachment_url( get_post_thumbnail_id() );
		?>
		<article id="post_<?php the_ID(); ?>" class="col post has-post-thumbnail post-box">
			<div class="content-inner">
				<?php if ( ! empty( $image ) ) : ?>
					<div class="featured-image">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'md' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
							<?php the_post_thumbnail( 'md-banner' ); ?>
						</a>
					</div>
				<?php endif; ?>
				<div class="blog-teaser block-half white">
					<div class="content-headline">
						<h3 class="headline has-medium-font-size" style="line-height:1.4"><a href="<?php the_permalink(); ?>" title="<?php echo sprintf( __( 'Permanent Link to %s', 'md' ), the_title_attribute( 'echo=0' ) ); ?>" class="has-black-color"><?php the_title(); ?></a></h3>
					</div>
				</div>
			</div>
			<?php do_action( 'md_hook_loop_blocks_bottom' ); ?>
		</article>
		<?php md_hook_x_loop( $c ); ?>
	<?php $c++; endwhile; ?>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
</div>
</div>
</div>
<div class="inner block-single">
<div class="content-upgrade box-lr block-single white has-border border-radius">
<div class="content-upgrade-text block-half">
<p>Visit my blog for more tutorials, blogging tips, business guides &amp; study notes.</p>
</div>
<div class="content-upgrade-action">
<a href="/blog/" class="button button-arrow black border-radius">Visit blog</a>
</div>
</div>
</div>
<style>
	.myloop .post-box, .myloop img.wp-post-image{
		border-radius:5px 5px 0 0!important;
	}
	.myloop h3{
		border-radius:0 0 5px 5px;
		border-top:0
	}
</style>
<div class="block-single-lr text-center">
	<span class="md-icon-angle-down large-title text-center"></span>
</div>
<?php echo do_shortcode('[sc name="sponsors"][/sc]');?>
