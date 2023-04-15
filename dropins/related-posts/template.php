<div class="related-posts">
	<div class="block-single-tb">
		<h3 class="text-center"><?php echo $settings['title']; ?></h3>
		<div class="columns-<?php echo $settings['columns']; ?> columns-single columns-flex">
			<?php while ( $related->have_posts() ) : $related->the_post();
			$image = wp_get_attachment_url( get_post_thumbnail_id() );
			?>
			<div class="col block-single-bot" id="content-<?php the_ID(); ?>">
			<?php md_hook_teaser_top(); ?>
			<?php if ( has_post_thumbnail() ) : ?><a href="<?php the_permalink(); ?>"><figure class="has-border" style="border-bottom:0"><?php the_post_thumbnail( 'md-banner' ); ?></figure></a><?php endif; ?>
			<h3 class="teaser-title mb-small block-half white has-border" style="font-size:17px; line-height:1.4;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>	
		</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>