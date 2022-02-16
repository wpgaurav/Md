<h2 id="marketing-seo" class="block-single text-center">Marketing &amp; SEO Tools</h2>
<?php 
   // the query
   $the_query = new WP_Query( array(
   	'post_type' => 'deal',
      'posts_per_page' => -1,
	   'ignore_sticky_posts' => 1,
	   'tax_query' => array(
		 'relation' => 'AND',
        array (
            'taxonomy' => 'deal_status',
            'field' => 'slug',
            'terms' => 'featured',
        ),
		   array (
            'taxonomy' => 'deal_type',
            'field' => 'slug',
            'terms' => 'marketing-seo',
        )
    ),
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
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'md' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php md_featured_image( 'above_headline', 'md-banner' ); ?></a>
					<?php endif; ?>
				<?php if (get_field('product_name')) {?>
    <div class="block-single text-center">
						<h3 class="teaser-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'md' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_field('product_name');?></a></h3>
			</div><?php }?>
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
<h2 id="wordpress-plugins" class="block-single text-center">WordPress Plugins</h2>
<?php 
   // the query
   $the_query = new WP_Query( array(
   	'post_type' => 'deal',
      'posts_per_page' => -1,
	   'ignore_sticky_posts' => 1,
	   'tax_query' => array(
		 'relation' => 'AND',
        array (
            'taxonomy' => 'deal_status',
            'field' => 'slug',
            'terms' => 'featured',
        ),
		   array (
            'taxonomy' => 'deal_type',
            'field' => 'slug',
            'terms' => 'wordpress-plugins',
        )
    ),
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
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'md' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php md_featured_image( 'above_headline', 'md-banner' ); ?></a>
					<?php endif; ?>
    <?php if (get_field('product_name')) {?>
    <div class="block-single text-center">
						<h3 class="teaser-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'md' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_field('product_name');?></a></h3>
			</div><?php }?>
		</div>
		</article>
		<?php endwhile; ?>
	</div>
</div>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
<h2 id="wordpress-themes" class="block-single text-center">WordPress Themes</h2>
<?php 
   // the query
   $the_query = new WP_Query( array(
   	'post_type' => 'deal',
      'posts_per_page' => -1,
	   'ignore_sticky_posts' => 1,
	   'tax_query' => array(
		 'relation' => 'AND',
        array (
            'taxonomy' => 'deal_status',
            'field' => 'slug',
            'terms' => 'featured',
        ),
		   array (
            'taxonomy' => 'deal_type',
            'field' => 'slug',
            'terms' => 'wordpress-themes',
        )
    ),
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
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'md' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php md_featured_image( 'above_headline', 'md-banner' ); ?></a>
					<?php endif; ?>
    <?php if (get_field('product_name')) {?>
    <div class="block-single text-center">
						<h3 class="teaser-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'md' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_field('product_name');?></a></h3>
			</div><?php }?>
		</div>
		</article>
		<?php endwhile; ?>
	</div>
</div>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
<h2 id="hosting" class="block-single text-center">Hosting Services</h2>
<?php 
   // the query
   $the_query = new WP_Query( array(
   	'post_type' => 'deal',
      'posts_per_page' => -1,
	   'ignore_sticky_posts' => 1,
	   'tax_query' => array(
		 'relation' => 'AND',
        array (
            'taxonomy' => 'deal_status',
            'field' => 'slug',
            'terms' => 'featured',
        ),
		   array (
            'taxonomy' => 'deal_type',
            'field' => 'slug',
            'terms' => 'hosting',
        )
    ),
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
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'md' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php md_featured_image( 'above_headline', 'md-banner' ); ?></a>
					<?php endif; ?>
   <?php if (get_field('product_name')) {?>
    <div class="block-single text-center">
						<h3 class="teaser-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'md' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_field('product_name');?></a></h3>
			</div><?php }?>
		</div>
		</article>
		<?php endwhile; ?>
	</div>
</div>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
<hr class="block-single mt-single" style="max-width:300px; margin:auto;">