<?php if ( has_action( 'md_archives_title' ) ) : ?>

	<?php do_action( 'md_archives_title' ); ?>

<?php elseif ( is_category() ) :
	$position = md_term_meta( array( 'featured_image', 'position' ) );
	$image = md_term_meta( array( 'featured_image', 'image', 'url' ) );
	$classes = ! empty( $position ) ? ' ' . md_headline_classes() : '';
	$description = category_description();
?>

	<div class="gradient-cover term-title<?php echo $classes; ?> nopadding"<?php echo md_featured_image_cover( $image, $position ); ?>>
		<div class="block-double">
		<?php md_hook_headline_top(); ?>
		<?php if ( ! empty( $image ) && ( in_array( $position, array( '', 'left', 'right', 'center' ) ) ) ) : ?>
			<?php md_featured_image_tax(); ?>
		<?php endif; ?>
		<h1 class="headline entry-title"><?php single_cat_title(); ?></h1>
		<?php if ( ! empty( $description ) ) : ?>
			<div class="format block-single-tb">
				<?php echo category_description(); ?>
			</div>
		<?php endif; ?>
		<?php md_hook_headline_bottom(); ?>
		</div></div>

<?php elseif ( is_search() ) : ?>

	<div class="term-title nopadding">
		<div class="block-double">
		<h1 class="med-title"><?php echo __( 'Search Results For: ', 'md' ); the_search_query(); ?></h1>
		<?php get_search_form(); ?>
		</div></div>

<?php elseif ( is_author() ) : ?>

	<?php md_author_box(); ?>
<?php elseif ( is_tax('deal_type') ) : ?>
<div class="gradient-cover term-title<?php echo $classes; ?> nopadding">
<div class="block-double">
<h1 class="large-title">Top <?php single_term_title(); ?> Deals and Offers</h1>
		<?php echo term_description(); ?>
	</div></div>
<?php elseif ( is_tag() ) : ?>

	<div class="term-title nopadding"><div class="block-double">
		<h1 class="med-title"><?php single_tag_title(); ?></h1>
		<?php echo category_description(); ?>
		</div></div>

<?php elseif ( is_day() ) : ?>

	<div class="term-title"><div class="block-double">
		<h1 class="med-title"><?php echo get_the_date(); ?></h1>
		</div></div>

<?php elseif ( is_month() ) : ?>

	<div class="term-title"><div class="term">
		<h1 class="med-title"><?php echo get_the_date( 'F Y' ); ?></h1>
		</div></div>

<?php elseif ( is_year() ) : ?>

	<div class="term-title"><div class="term">
		<h1 class="med-title"><?php echo get_the_date( 'Y' ); ?></h1>
		</div></div>
<?php elseif ( is_post_type_archive() ) : ?>

	<!-- <div class="term-title">
		<h1 class="med-title">
		<?php
		// post_type_archive_title();
		?>
		</h1>
	</div> -->

<?php endif; ?>