<div class="category-listing columns-2 columns-single columns-flex">
	<?php if ( ! empty( $terms ) ) : ?>
		<?php foreach ( $terms as $term ) :
			$articles = new WP_Query( array(
				'fields' => 'ids',
				'post_type' => 'post',
				'posts_per_page' => 5,
				'tax_query' => array( array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $term->slug
				) )
			) );
		?>
			<?php if ( $articles->have_posts() ) : ?>
				<div class="docs-category col">
					<div class="col-style">
						<div class="col-head">
							<h2 class="teaser-title mb-small"><a href="<?php echo get_term_link( $term->term_id ); ?>"><?php echo esc_html( $term->name ); ?></a> <span class="badge"><?php echo $term->count; ?></h2>
							<?php if ( $term->description ) : ?>
								<p class="text-sec"><?php echo $term->description; ?></p>
							<?php endif; ?>
						</div>
						<div class="col-content">
							<ul class="list">
								<?php while ( $articles->have_posts() ) : $articles->the_post(); ?>
									<li>
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php md_byline_item( 'badge' ); ?>
									</li>
								<?php endwhile; ?>
								<li class="small"><a href="<?php echo get_term_link( $term->term_id ); ?>"><?php echo sprintf( __( 'Browse all <b>%s</b> articles &rarr;', 'md' ), $term->count ); ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
		<?php endforeach; ?>
	<?php else : ?>
		<?php md_template( 'content-item-404' ); ?>
	<?php endif; ?>
</div>