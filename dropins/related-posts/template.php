<div class="related-posts">
	<div class="block-single">
		<h3 class="text-center"><?php echo $settings['title']; ?></h3>
		<div class="columns-<?php echo $settings['columns']; ?> columns-single columns-flex">
			<?php while ( $related->have_posts() ) : $related->the_post(); ?>
				<div class="col">
						<div><i class="icon-triangle-right"></i> <a class="related-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>