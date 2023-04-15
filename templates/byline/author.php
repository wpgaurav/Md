<?php if ( ! in_array( 'author', $byline ) || in_array( 'avatar', $byline ) ) : ?>
	<span class="byline-author byline-item">
		<?php if ( in_array( 'avatar', $byline ) ) :
			$avatar_size = isset( $args['avatar_size'] ) ? $args['avatar_size'] : 40;
		?>
			<?php echo get_avatar( get_the_author_meta( 'ID' ), $avatar_size, '', false, array(
				'class' => 'circle'
			) ); ?>
		<?php endif; ?>
		<?php if ( ! in_array( 'author', $byline ) ) : ?>
			<em><?php echo __( 'by', 'md' ); ?></em>
			<span class="author vcard mr-small">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><span class="byline-author-name fn" itemprop="name"><?php esc_html( the_author() ); ?></span></a>
			</span>
		<?php endif; ?>
	</span>
<?php endif; ?>