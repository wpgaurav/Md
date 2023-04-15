<div class="header-logo">

	<?php if ( md_has_logo() ) : ?>
		<<?php md_logo_html(); ?> class="logo">
			<?php if ( md_has_custom_logo() ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home"><?php md_the_logo(); ?></a>
			<?php endif; ?>
			<?php if ( md_has_site_title() ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title box-lr mr-single" rel="home" aria-label="Opens Homepage"><img src="https://i0.wp.com/gauravtiwari.org/wp-content/uploads/2022/01/icon-1.png?w=90" rel="preload" class="skip-lazy" loading="eager" alt="Gaurav Tiwari" width="45" height="45"><span class="block-half-lr"><?php echo get_bloginfo( 'name' ); ?></span></a>
			<?php endif; ?>
		</<?php echo md_logo_html(); ?>>
	<?php endif; ?>

	<?php if ( md_has_tagline() ) : ?>
		<p class="tagline" itemprop="description"><?php bloginfo( 'description' ); ?></p>
	<?php endif; ?>

	<?php md_hook_header_logo_bottom(); ?>

</div>