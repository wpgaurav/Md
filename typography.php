<style type="text/css">

/*------------------------------*\
	$HELPERS
\*------------------------------*/

<?php
	$queries = array( 900 => 'tablet', 700 => 'mobile' );
?>

/* BODY */
body {
    font-family: halyard-display-variable, -apple-system, BlinkMacSystemFont, "Google Sans Text", "Google Sans", "Segoe UI", Ubuntu, "Helvetica Neue", Arial, sans-serif;
    font-size: clamp(1rem, 0.34vw + 0.91rem, 1.19rem);
    font-weight: 300;
	font-variation-settings: 'wght' 300;
    line-height: 1.7;
}

/* HEADLINES */
h2, h3, h4, h5, h6, .main-title,  .med-title,  .mid-title, .small-title, .micro-title {
    font-weight: 700;
	font-variation-settings: 'wght' 700;
}
.huge-title, .huge-text {
    font-size: clamp(3.05rem, 3.54vw + 2.17rem, 5rem);
    line-height: 1.2;
}
.huge-title, h1, .site-title {
    font-weight: 900;
	font-variation-settings: 'wght' 900;
}
h1, .large-title, .large-text {
    font-size: clamp(2.44rem, 2.38vw + 1.85rem, 3.75rem);
    line-height: 1.1;
}
h2, .main-title, .main-text {
    font-size: clamp(1.56rem, 1vw + 1.31rem, 2.11rem);
    line-height: 1.15;
}

h3, .med-title, .med-text, .site-title {
    font-size: clamp(22px, 3vw, 26px);
    line-height: 1.3;
}

h4, .mid-title, .mid-text {
    font-size: clamp(1.25rem, 0.61vw + 1.1rem, 1.58rem);
    line-height: 1.4;
}
h5, .small-title, .small-text {
    font-size: clamp(18px, 2vw, 20px);
    line-height: 1.5;
}

h6, .micro-title, .micro-text {
    font-size: clamp(0.8rem, 0.17vw + 0.76rem, 0.89rem);
    line-height: 1.5;
}

/* FORMAT */

.format { word-wrap: break-word; }

.format a:hover, .format .no-border { border-bottom-width: 0; }

.format .headline, .format h1, .format h2, .format h3, .format h4, .format h5, .format h6 {
	margin-bottom: <?php echo $half; ?>px;
	position: relative;
}

.format .headline a, .format h1 a, .format h2 a, .format h3 a, .format h4 a, .format h5 a, .format h6 a {
	border-bottom: 0;
	color: <?php echo $colors['site']['headline-links']; ?>;
}

.format ul, .format ol, .format dl, .format p, .format hr, .format blockquote, .format pre, .format table, .format .wp-caption, .format fieldset, .format .gfield, .format .alert, .format .note, .format .wp-block-image, .format .email-form-wrap { margin-bottom: <?php echo $single; ?>px; }

.format ul, .format ol { margin-left: <?php echo $single; ?>px; }

.format li ul, .format li ol { margin-top: <?php echo $third; ?>px; }

.format li, .format dd {
	margin-bottom: <?php echo $third; ?>px;
	position: relative;
}

<?php if ( ! has_filter( 'md_filter_disable_format_fix' ) ) : ?>
	.format *:last-child { margin-bottom: 0; }
<?php endif; ?>

.content .headline, .content .headline a, .content-text h1, .content-text h2, .content-text h3, .content-text h4, .content-text h5, .content-text h6 { color: <?php echo $colors['site']['headline']; ?>; }

.content-text h2:not(:first-child), .content-text h3:not(:first-child), .content-text h4:not(:first-child), .content-text h5:not(:first-child) { margin-top: <?php echo $mid; ?>px; }

/* ALIGNMENTS */

.alignleft, .alignright, .aligncenter, .alignnone {
	display: block;
	position: relative;
	margin-bottom: <?php echo $single; ?>px;
}

.alignleft {
	float: left;
	margin-right: <?php echo $single; ?>px;
}

.alignright {
	float: right;
	margin-left: <?php echo $single; ?>px;
}

.alignwide, .alignfull { max-width: initial; }

.alignwide img, .alignfull img { width: 100%; }

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

@media all and (max-width: 800px) {
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
	font-size: 4.5em;
	line-height: 1;
	margin-bottom: 0.1em;
	margin-right: 0.1em;
}

.text-sep { position: relative; }

.text-sep:after {
	background-color: <?php echo $colors['site']['primary']; ?>;
	content: '';
	display: block;
	height: 4px;
	margin-top: 20px;
	width: 146px;
}

.text-center.text-sep:after, .text-center .text-sep:after {
	margin-left: auto;
	margin-right: auto;
}

.badge {
    background-color: #f58f2a;
    border-radius: 2px;
    color: #fff;
    margin-left: 4px;
    font-size: 13px;
    padding: 3px 5px 3px 4px;
    position: relative;
    text-transform: uppercase;
}

a.badge { border-bottom: 0; }

.middot:not(:last-child):after {
	content: '\00b7';
	margin-left: 6px;
	margin-right: 3px;
}

@media all and (min-width: 900px) {
	.text-intro, .intro, .subtitle {
		font-size: 1.2em;
		line-height: 1.5em;
	}
}

/* LISTS */

.list, .list > ul, ul.list-check { list-style: none; }

.list li, ul.list-check li { position: relative; }

.list > li:not(:last-child),
.box-style-list ul > li:not(:last-child) {
	border-bottom: 1px solid rgba(0, 0, 0, 0.15);
	margin-bottom: <?php echo $third; ?>px;
	padding-bottom: <?php echo $third; ?>px;
}

.list.list-large > li:not(:last-child) {
	margin-bottom: <?php echo $single; ?>px;
	padding-bottom: <?php echo $single; ?>px;
}

.list .children {
	border-left: 1px solid #ddd;
	margin-left: 0;
	margin-top: <?php echo $single; ?>px;
	padding-left: <?php echo $single; ?>px;
}

.list .children li:not(:last-child) { margin-bottom: <?php echo $single; ?>px; }

.list li.small a {
	border-bottom-color: <?php echo $colors['site']['text-sec']; ?>;
	color: <?php echo $colors['site']['text-sec']; ?>;
}

/* LIST CHECK */

ul.list-check li:not(:last-child) { margin-bottom: <?php echo $third; ?>px; }

ul.list-check li:before {
	color: green;
	position: absolute;
		left: -<?php echo $single; ?>px;
		top: 3px;
}

.list-check.style-bullets {
	border: 2px solid #21a340;
	border-radius: 2px;
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
	margin-left: 0;
}
.list-check.style-bullets li { padding: 7px 7px 7px 48px; }
.list-check.style-bullets li:not(:last-child) {
	border-bottom: 2px solid #21a340;
	margin-bottom: 0;
}
.list-check.style-bullets li:before {
	background-color: #21a340;
	border-radius: 5px;
	color: #fff;
	left: 7px;
	top: auto;
	padding: 6px;
}

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

/* FIXES */

@media all and (max-width: 700px) {
	.close-on-mobile { display: none; }
}