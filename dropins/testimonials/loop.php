<?php if ( $atts['style'] == 'minimal' ) : ?>
	<?php $c = 0; while ( $testimonials->have_posts() ) : $testimonials->the_post();
		$text = md_post_meta( array( 'testimonials', 'text' ) );
		$name = md_post_meta( array( 'testimonials', 'name' ) );
	?>
		<div class="text-aside<?php echo isset( $atts['align'] ) ? ' ' . $atts['align'] : ''; ?>">
			<span><?php echo esc_html( $text ); ?></span>
			<span class="text-aside-author">&mdash;<?php echo esc_html( $name ); ?></span>
		</div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
<?php else : ?>
	<div class="testimonials-gallery">
		<?php $c = 0; while ( $testimonials->have_posts() ) : $testimonials->the_post();
			$id = isset( $atts['id'] ) ? $atts['id'] : get_the_ID();
			$text = md_post_meta( array( 'testimonials', 'text' ) );
			$name = md_post_meta( array( 'testimonials', 'name' ) );
			$role = md_post_meta( array( 'testimonials', 'role' ) );
			$rating = md_post_meta( array( 'testimonials', 'rating' ) );
		?>
			<div class="testimonial mb-single">
				<?php if ( ! empty( $text ) ) : ?>
					<div class="quote-box block-mid mb-mid text-left">
						<?php echo wpautop( $text ); ?>
					</div>
				<?php endif; ?>
				<div class="text-right">
					<?php echo get_the_post_thumbnail( $id, 'md-thumbnail', array(
						'class' => 'avatar mb-half'
					) ); ?>
					<?php if ( ! empty( $name ) ) : ?>
						<p class="mb-none"><strong><?php echo esc_html( $name ); ?></strong></p>
					<?php endif; ?>
					<?php if ( ! empty( $role ) ) : ?>
						<p class="mb-none"><?php echo esc_html( $role ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $rating ) ) : ?>
						<p class="star-ratings" style="color: gold;">
							<?php $sc = 0; while ( $sc < $rating ) : $sc++; ?>
							    <span class="md-icon-star"></span>
							<?php endwhile; ?>
						</p>
					<?php endif; ?>
				</div>
			</div>
		<?php $c++; endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
<?php endif; ?>