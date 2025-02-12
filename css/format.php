<style type="text/css">

/*------------------------------*\
	$HELPERS
\*------------------------------*/

<?php
	$queries = array( 992 => 'tablet', 640 => 'mobile' );
?>

/* BODY */

body {
	font-size: <?php echo $typography['body']['font_size']['desktop'] / 16; ?>rem;
	font-family: <?php echo $typography['body']['font_family']; ?>;
	font-weight: <?php echo $font_weight; ?>;
	line-height: <?php echo $typography['body']['line_height']['desktop'] / $typography['body']['font_size']['desktop']; ?>;
}

<?php foreach ( $queries as $body_width => $body_device ) : ?>
	@media all and (max-width: <?php echo $body_width; ?>px) {
		body {
			font-size: <?php echo $typography['body']['font_size'][$body_device] / 16; ?>rem;
			line-height: <?php echo $typography['body']['line_height'][$body_device] / $typography['body']['font_size'][$body_device]; ?>;
		}
	}
<?php endforeach; ?>

/* HEADLINES */

<?php
	$titles = array(
		'huge' => '.huge-title',
		'h1' => 'h1, .large-title',
		'h2' => 'h2, .main-title',
		'h3' => 'h3, .med-title',
		'h4' => 'h4, .mid-title',
		'h5' => 'h5, .small-title',
		'h6' => 'h6, .micro-title'
	);
	$texts = array(
		'huge' => '.huge-text',
		'h1' => '.large-text',
		'h2' => '.main-text',
		'h3' => '.med-text',
		'h4' => '.mid-text',
		'h5' => '.small-text',
		'h6' => '.micro-text'
	);
	$h1_ff = ! empty( $typography['h1']['font_family'] ) ? $typography['h1']['font_family'] : $font_family;
	$h1_fw = ! empty( $typography['h1']['font_weight'] ) ? $typography['h1']['font_weight'] : $bold;

	foreach ( $titles as $attribute => $selector ) {
		$h_font_family = ! empty( $typography[$attribute]['font_family'] ) ? $typography[$attribute]['font_family'] : $h1_ff;
		$h_font_weight = ! empty( $typography[$attribute]['font_weight'] ) ? $typography[$attribute]['font_weight'] : $h1_fw;
		echo
			"$selector, " . $texts[$attribute] . " {\n".
				"\tfont-size: " . $typography[$attribute]['font_size']['desktop'] / 16 . "rem;\n".
				"\tline-height: " . $typography[$attribute]['line_height']['desktop'] / 16 . "rem;\n".
			"}\n";
		echo
			"$selector {\n".
				( ! empty( $typography[$attribute]['font_family'] ) || ! empty( $typography['h1']['font_family'] ) ? "\tfont-family: {$h_font_family};\n" : '' ).
				( ! empty( $typography[$attribute]['font_style'] ) ? "\tfont-style: italic;\n" : '' ).
				"\tfont-weight: {$h_font_weight};\n".
			"}\n";
	}

	foreach ( $queries as $w => $d ) {
		echo "@media all and (max-width: {$w}px) {\n";
		foreach ( $titles as $h => $selector ) {
			echo "\t$selector, " . $texts[$h] . " { ".
				 	'font-size: ' . $typography[$h]['font_size'][$d] / 16 . 'rem; '.
				 	'line-height: ' . $typography[$h]['line_height'][$d] / 16 . 'rem; '.
				 "}\n";
		}
		echo "}\n";
	}
?>

/* FORMAT */

.format { word-wrap: break-word; }


.format .headline, .format h1, .format h2, .format h3, .format h4, .format h5, .format h6 {
	margin-bottom: <?php echo $half / 16; ?>rem;
	position: relative;
}

.format .headline a, .format h1 a, .format h2 a, .format h3 a, .format h4 a, .format h5 a, .format h6 a {
	color: <?php echo $colors['site']['headline-links']; ?>;
}

.format ul, .format ol, .format dl, .format p, .format hr, .format blockquote, .format pre, .format table, .format .wp-caption, .format fieldset, .format .gfield, .format .alert, .format .note, .format .wp-block-image, .format .email-form-wrap { margin-bottom: <?php echo $single / 16; ?>rem; }

.format ul, .format ol { margin-left: <?php echo $single / 16; ?>rem; }

.format li ul, .format li ol { margin-top: <?php echo $third / 16; ?>rem; }

.format li, .format dd {
	margin-bottom: <?php echo $third / 16; ?>rem;
	position: relative;
}

.content .headline, .content .headline a, .content-text h1, .content-text h2, .content-text h3, .content-text h4, .content-text h5, .content-text h6 { color: <?php echo $colors['site']['headline']; ?>; }

.content-text h2:not(:first-child), .content-text h3:not(:first-child), .content-text h4:not(:first-child), .content-text h5:not(:first-child) { margin-top: <?php echo $mid / 16; ?>rem; }

/* ALIGNMENTS */

.alignleft, .alignright, .aligncenter, .alignnone {
	display: block;
	position: relative;
	margin-bottom: <?php echo $single / 16; ?>rem;
}

.alignleft {
	float: left;
	margin-right: <?php echo $single / 16; ?>rem;
}

.alignright {
	float: right;
	margin-left: <?php echo $single / 16; ?>rem;
}

.alignwide, .alignfull { max-width: initial; }

.alignwide img:not([class]), .alignfull img:not([class]) { width: 100%; }

.aligncenter {
	clear: both;
	float: none;
	margin-left: auto;
	margin-right: auto;
	text-align: center;
}

.alignnone {
	clear: both;
	float: none;
}

.width-full {
	clear: both;
	display: block;
	width: 100%;
}

.display-block { display: block; }

.auto {
	margin-left: auto;
	margin-right: auto;
}

@media all and (max-width: 768px) {
	.alignright, .alignleft,
	.wp-block-image .alignleft, .wp-block-image .alignright {
		clear: both;
		display: block;
		float: none;
		margin-left: auto;
		margin-right: auto;
		text-align: center;
	}
	.wp-block-image .aligncenter > figcaption,
	.wp-block-image .alignleft > figcaption,
	.wp-block-image .alignright > figcaption { display: block; }
}

/* TEXT STYLES */

.text-center { text-align: center; }

.text-left { text-align: left; }

.text-right { text-align: right; }

.caps { text-transform: uppercase; }

.text-dark { color: #1e1e1e; }

.text-sec, .entry-subtitle { color: <?php echo $colors['site']['text-sec']; ?>; }

.text-white .text-sec { color: #ddd; }

.text-white { color: #fff; }

.text-intro:first-letter, .has-drop-cap:first-letter, .drop {
	color: <?php echo $colors['site']['links']; ?>;
	float: left;
	font-size: 4.5rem;
	line-height: 1;
	margin-bottom: 0.1rem;
	margin-right: 0.1rem;
}

.text-sep { position: relative; }

.text-sep:after {
	background-color: <?php echo $colors['site']['primary']; ?>;
	content: '';
	display: block;
	height: 0.25rem;
	margin-top: 1.25rem;
	width: 9.125rem;
}

.text-center.text-sep:after, .text-center .text-sep:after {
	margin-left: auto;
	margin-right: auto;
}

.badge {
    background-color: #001947;
    border-radius: 0.125rem;
    color: #fff;
    margin-left: 0.25rem;
    font-size: 0.85rem;
    padding: 0.1875rem 0.3125rem 0.1875rem 0.25rem;
    position: relative;
    text-transform: uppercase;
}

a.badge { border-bottom: 0; }

.middot:not(:last-child):after {
	content: '\00b7';
	margin-left: 0.375rem;
	margin-right: 0.1875rem;
}

@media all and (min-width: 992px) {
	.text-intro, .intro, .subtitle {
		font-size: 1.35rem;
		line-height: 1.5;
	}
}

/* LISTS */

.list, .list > ul, ul.list-check { list-style: none; }

.list li, ul.list-check li { position: relative; }

.list > li:not(:last-child),
.box-style-list ul > li:not(:last-child) {
	border-bottom: 1px solid rgba(0, 0, 0, 0.15);
	margin-bottom: <?php echo $third / 16; ?>rem;
	padding-bottom: <?php echo $third / 16; ?>rem;
}

.list.list-large > li:not(:last-child) {
	margin-bottom: <?php echo $single / 16; ?>rem;
	padding-bottom: <?php echo $single / 16; ?>rem;
}

.list .children {
	border-left: 1px solid #ddd;
	margin-left: 0;
	margin-top: <?php echo $single / 16; ?>rem;
	padding-left: <?php echo $single / 16; ?>rem;
}

.list .children li:not(:last-child) { margin-bottom: <?php echo $single / 16; ?>rem; }

.list li.small a {
	border-bottom-color: <?php echo $colors['site']['text-sec']; ?>;
	color: <?php echo $colors['site']['text-sec']; ?>;
}

/* LIST CHECK */

ul.list-check li:not(:last-child) { margin-bottom: <?php echo $third / 16; ?>rem; }

ul.list-check li:before {
	color: green;
	position: absolute;
		left: -<?php echo $single / 16; ?>rem;
		top: 3px;
}

.list-check.style-bullets {
	border: 2px solid #21a340;
	border-radius: 0.125rem;
	box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.1);
	margin-left: 0;
}
.list-check.style-bullets li { padding: 0.4375rem 0.4375rem 0.4375rem 3rem; }
.list-check.style-bullets li:not(:last-child) {
	border-bottom: 2px solid #21a340;
	margin-bottom: 0;
}
.list-check.style-bullets li:before {
	background-color: #21a340;
	border-radius: 0.3125rem;
	color: #fff;
	left: 0.4375rem;
	top: auto;
	padding: 0.375rem;
}

/* BLOCKQUOTE REMOVED */

/* OVERLAY */

.image-overlay {
	background-position: center top;
	background-size: cover;
	display: block;
	position: relative;
	z-index: 0;
}

.image-overlay:after { z-index: -1; }

.overlay, .image-overlay:after {
	background-color: <?php echo $content['featured_image']['cover_color']; ?>;
	content: '';
	display: block;
	height: 100%;
	position: absolute;
		bottom: 0;
		left: 0;
		right: 0;
		top: 0;
	width: 100%;
}
/* DESIGN */

.circle { border-radius: 50%; }

.shadow, .wp-block-image.shadow img { box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2); }

.shadow-large, .wp-block-image.shadow-large img { box-shadow: 0 5px 55px rgba(0, 0, 0, 0.15); }

.shadow-small, .wp-block-image.shadow-small img { box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15); }

.wp-block-image.shadow, .wp-block-image.shadow-large, .wp-block-image.shadow-small { box-shadow: none; }

.box { background-color: #fff; }

.box-sec, .frame, .note { background-color: #eee; }

.box-dark {
	background-color: #1e1e1e;
	color: #fff;
}

.box-dark .text-sec { color: #ddd; }

.alert { background-color: #fffbcc; }

.avatar {
	border-radius: 50%;
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* CIRCLE ICON */

.circle-icon, a.circle-icon {
	background-color: rgba(0, 0, 0, 0.15);
	border-bottom: 0;
	border-radius: 50%;
	color: <?php echo $colors['site']['text']; ?>;
	display: inline-block;
	line-height: 1;
	position: relative;
}

.circle-icon.micro {
	bottom: -2px;
	font-size: 15px;
	height: 25px;
	padding-top: 5px;
	width: 25px;
}

/* VIDEO */

.video-wrap {
	height: 0;
	position: relative;
	padding-bottom: 56.25%;
	padding-top: 25px;
}

.video-wrap iframe {
	height: 100%;
	position: absolute;
		left: 0;
		top: 0;
	width: 100%;
}

.play-button {
	border: 4px solid #fff;
	border-radius: 50%;
	cursor: pointer;
	display: inline-block;
	height: 75px;
	padding: 20px 26px 26px;
	position: relative;
	text-align: center;
	width: 75px;
}

.play-button:after {
	content: '';
	display: block;
	border-style: solid;
	border-width: 15px 0 15px 22px;
	border-color: transparent transparent transparent rgba(255, 255, 255, 1);
}

.play-button-text {
	font-size: 13px;
	font-weight: bold;
	text-transform: uppercase;
}

/* TWITTER */

.twitter-tweet {
	margin-left: auto;
	margin-right: auto;
}

/* FIXES */

@media all and (max-width: 640px) {
	.close-on-mobile { display: none; }
}