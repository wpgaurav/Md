<?php
/**
 * Template Name: Full Blank Template
 * Template Post Type: post, page, snippet, ebook, study_notes, deal
 */
?>

<?php get_header(); ?>

<main role="main" class="builder format md-space has-white-background-color content-full" id="swup">
	<div class="content-inner">
	
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php do_action( 'builder_template_' . get_the_ID() ); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>
	</div></main>
<?php get_footer(); ?>