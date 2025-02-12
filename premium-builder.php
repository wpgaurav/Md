<?php
/**
 * Template Name: Premium Builder Template
 * Template Post Type: post, page, snippet, ebook, study_notes, deal
 */
?>

<?php get_header(); ?>

<main role="main" class="builder format premium-builder" id="content">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php do_action( 'builder_template_' . get_the_ID() ); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>