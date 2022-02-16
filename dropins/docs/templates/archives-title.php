<div class="docs-nav">
	<div class="docs-title mb-half">
		<?php if ( is_search() ) : ?>
			<h1 class="med-title mb-half"><?php echo __( 'Search Results For: ', 'md' ); the_search_query(); ?></h1>
		<?php elseif ( is_post_type_archive() ) : ?>
			<?php if ( ! empty( $page_title ) ) : ?>
				<h1 class="huge-title mb-small"><?php echo apply_filters( 'the_title', $page_title ); ?></h1>
			<?php endif; ?>
			<?php if ( ! empty( $page_description ) ) : ?>
				<?php echo wpautop( $page_description ); ?>
			<?php endif; ?>
		<?php elseif ( is_category() || is_tax() ) : ?>
			<h1 class="large-title mb-small"><?php single_cat_title(); ?></h1>
			<div class="text-sec"><?php echo category_description(); ?></div>
		<?php endif; ?>
	</div>
	<?php if ( $has_search ) : ?>
		<div class="docs-search>">
			<?php get_search_form(); ?>
		</div>
	<?php endif; ?>
</div>