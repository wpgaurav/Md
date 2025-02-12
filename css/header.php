<style type="text/css">

/*------------------------------*\
	$HEADER
\*------------------------------*/

.header {
	background-color: <?php echo $colors['header']['bg_color']; ?>;
	color: <?php echo $colors['header']['color']; ?>;
	<?php if ( ! empty( $typography['header']['font_family'] ) ) : ?>
		font-family: <?php echo $typography['header']['font_family']; ?>;
	<?php endif; ?>
	<?php if ( ! empty( $typography['header']['font_size']['desktop'] ) ) : ?>
		font-size: <?php echo $typography['header']['font_size']['desktop']; ?>px;
	<?php endif; ?>
	<?php if ( ! empty( $typography['header']['font_weight'] ) ) : ?>
		font-weight: <?php echo $typography['header']['font_weight']; ?>;
	<?php endif; ?>
	<?php if ( ! empty( $typography['header']['line_height']['desktop'] ) ) : ?>
		line-height: <?php echo $typography['header']['line_height']['desktop']; ?>px;
	<?php endif; ?>
	position: relative;
}

.header-simple { text-align: center; }

.header-wrap { position: relative; }

.header-trigger { margin-left: <?php echo $half; ?>px; }

.header.featured-image-cover { padding-bottom: 0; }

/* LOGO + TAGLINE */

.site-title {
	<?php echo ( ! empty( $typography['site_title']['font_family'] ) ? "\tfont-family: " . $typography['site_title']['font_family'] . ";\n" : '' ); ?>
	<?php echo ( ! empty( $typography['site_title']['font_style'] ) ? "font-style: italic;\n" : '' ); ?>
	<?php echo ( ! empty( $typography['site_title']['font_weight'] ) ? "\tfont-weight: " . $typography['site_title']['font_weight'] . ";\n" : '' ); ?>
	vertical-align: middle;
}

<?php if ( ! empty( $colors['header']['site_title'] ) ) : ?>
	.header .site-title, .header .site-title:hover { color: <?php echo $colors['header']['site_title']; ?>; }
<?php endif; ?>

.header-logo { display: inline-block; }

.site-logo {
	display: inline-block;
	vertical-align: middle;
}

.custom-logo-link {
	display: inline-block;
	position: relative;
	<?php echo ( ! empty( $header['logo_width']['desktop'] ) ? 'width: ' . $header['logo_width']['desktop'] . 'px;' : '' ); ?>
	z-index: 10;
}

.header-simple .site-logo { display: inline-block; }

.tagline {
	color: <?php echo $colors['header']['site_tagline']; ?>;
	<?php if ( ! empty( $typography['site_tagline']['font_family'] ) ) : ?>
		font-family: <?php echo $typography['site_tagline']['font_family']; ?>;
	<?php endif; ?>
	font-size: <?php echo $typography['site_tagline']['font_size']['desktop']; ?>px;
	<?php if ( ! empty( $typography['site_tagline']['font_style'] ) ) : ?>
		font-style: italic;
	<?php endif; ?>
	<?php if ( ! empty( $typography['site_tagline']['font_weight'] ) ) : ?>
		font-weight: <?php echo $typography['site_tagline']['font_weight']; ?>;
	<?php endif; ?>
	line-height: <?php echo $typography['site_tagline']['line_height']['desktop'] ; ?>px;
}

.tagline a { color: <?php echo $colors['header']['site_tagline']; ?>; }

/* TRIGGERS */

.header-triggers { text-align: right; }

.header-trigger {
	cursor: pointer;
	display: inline-block;
	position: relative;
	vertical-align: middle;
}

.header-menu-trigger-icon {
	font-size: 25px;
	line-height: 1;
	vertical-align: middle;
}

.header-trigger-text {
	margin-left: <?php echo $small; ?>px;
	vertical-align: middle;
}

.has-mobile-menu .header-menu-trigger-icon:before { content: '\e810'; }

/* MENU */

.header a { color: <?php echo $colors['header']['menu']['links']; ?>; }

.header a:hover { color: <?php echo $colors['header']['menu']['hover']; ?>; }

.header .button, .header .button:hover, .header .menu > .current-menu-item.button > a { color: #fff; }

/* QUERIES */

@media all and (min-width: 768px) {
	.header {
		padding-bottom: <?php echo $header['spacing_bottom']['desktop']; ?>px;
		padding-top: <?php echo $header['spacing_top']['desktop']; ?>px;
	}
	.header-wrap {
		display: table;
		width: 100%;
	}
	.header-logo, .header-triggers, .header-aside {
		display: table-cell;
		vertical-align: middle;
	}
	.header-aside { text-align: right; }
	.site-title {
		font-size: <?php echo $typography['site_title']['font_size']['desktop']; ?>px;
		line-height: <?php echo $typography['site_title']['line_height']['desktop'] . 'px'; ?>;
	}
	.header-standard .site-logo { margin-right: <?php echo $third; ?>px; }
}

@media all and (max-width: <?php echo $site_width; ?>px) {
	.header-wrap {
		padding-left: <?php echo $half; ?>px;
		padding-right: <?php echo $half; ?>px;
	}
}

@media all and (max-width: 768px) {
	.header {
		<?php if ( ! empty( $typography['header']['font_size']['tablet'] ) ) : ?>
			font-size: <?php echo $typography['header']['font_size']['tablet']; ?>px;
		<?php endif; ?>
		<?php if ( ! empty( $typography['header']['line_height']['tablet'] ) ) : ?>
			line-height: <?php echo $typography['header']['line_height']['tablet']; ?>px;
		<?php endif; ?>
		padding-bottom: <?php echo $header['spacing_top']['tablet']; ?>px;
		padding-top: <?php echo $header['spacing_bottom']['tablet']; ?>px;
	}
	.site-title {
		font-size: <?php echo $typography['site_title']['font_size']['tablet']; ?>px;
		line-height: <?php echo $typography['site_title']['line_height']['tablet']; ?>px;
	}
	.tagline {
		font-size: <?php echo $typography['site_tagline']['font_size']['tablet']; ?>px;
		line-height: <?php echo $typography['site_tagline']['line_height']['tablet']; ?>px;
	}
	<?php if ( ! empty( $header['logo_width']['tablet'] ) ) : ?>
		.custom-logo-link { width: <?php echo $header['logo_width']['tablet']; ?>px; }
	<?php endif; ?>
	.header-triggers {
		padding-top: <?php echo $third; ?>px;
		position: absolute;
			top: 0;
			right: <?php echo $half; ?>px;
	}
}

@media all and (max-width: 640px) {
	.header {
		<?php if ( ! empty( $typography['header']['font_size']['mobile'] ) ) : ?>
			font-size: <?php echo $typography['header']['font_size']['mobile']; ?>px;
		<?php endif; ?>
		<?php if ( ! empty( $typography['header']['line_height']['mobile'] ) ) : ?>
			line-height: <?php echo $typography['header']['line_height']['mobile']; ?>px;
		<?php endif; ?>
		padding-bottom: <?php echo $header['spacing_top']['mobile']; ?>px;
		padding-top: <?php echo $header['spacing_bottom']['mobile']; ?>px;
	}
	.site-title {
		font-size: <?php echo $typography['site_title']['font_size']['mobile']; ?>px;
		line-height: <?php echo $typography['site_title']['line_height']['mobile']; ?>px;
	}
	.tagline {
		font-size: <?php echo $typography['site_tagline']['font_size']['mobile']; ?>px;
		line-height: <?php echo $typography['site_tagline']['line_height']['mobile']; ?>px;
	}
	<?php if ( ! empty( $header['logo_width']['mobile'] ) ) : ?>
		.custom-logo-link { width: <?php echo $header['logo_width']['mobile']; ?>px; }
	<?php endif; ?>
}