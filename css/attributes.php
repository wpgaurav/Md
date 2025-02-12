<style type="text/css">

<?php echo '/*
	Theme Name: Marketers Delight
	Version: ' . MD_VERSION . '
	Author: Alex Mangini
		Description: Built on a foundation of typography and a vision to fuel powerful features with lightweight performance, Marketers Delight is your website marketing framework for now and into the future. Capture Leads with MD Optins, write and design beautiful long-form content with interactive tools, curate reading lists with the Bookshelf, and much, much more.
	Theme URI: https://marketersdelight.com/
	Author URI: https://kolakube.com/
	Text Domain: md
*/';
?>

/*------------------------------*\
	$ATTRIBUTES
\*------------------------------*/

*, *:before, *:after {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}

@font-face {
	font-family: md-icon;
	font-display: swap;
	src: url('<?php echo md_font_icons_url(); ?>') format('woff2');
	font-style: normal;
	font-weight: 400;
}

body {
	background-color: <?php echo $colors['site']['bg_color']; ?>;
	color: <?php echo $colors['site']['text']; ?>;
	position: relative;
}

b, strong, .bold { font-weight: <?php echo $bold; ?>; }

i, em, .italic { font-style: italic; font-variation-settings: "ital" 10 }

[class*="md-icon"] { display: inline-block; }

[class*="md-icon"]:before {
	display: inline-block;
	font-family: md-icon;
	font-style: normal;
	font-variant: normal;
	font-weight: 400;
	line-height: 1;
	speak: none;
	text-align: center;
	text-decoration: inherit;
	text-transform: none;
}

.md-icon.icon-data:before { content: attr(data-md-icon); }

.small {
	font-size: var(--fs-s);
	line-height: 1.5em;
}

.has-text-color.has-white-color { color: #fff; }

#cancel-comment-reply-link:before, .menu-icon a, .list-check li:before {
	display: inline-block;
	font-family: md-icon;
	font-style: normal;
	font-weight: normal;
	line-height: 1;
}

main { display: block; }

ul { list-style: square; }

p { position: relative; }

a {
	color: <?php echo $colors['site']['links']; ?>;
	text-decoration: none;
}

img, a img, .size-auto, .size-full, .size-large, .size-medium, .size-thumbnail {
	height: auto;
	max-width: 100%;
	vertical-align: top;
}

iframe, video, object { max-width: 100%; }

sup { line-height: 1; }

hr {
    border: 0;
    height: 0;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}

pre, code {
	background-color: #ddd;
	color: #3e3e3e;
	font-family: Consolas, Monaco, Menlo, Courier, Verdana, sans-serif;
	font-size: 0.9em;
}

code a, .format code a {
	border-bottom: 0;
	color: #3e3e3e;
}

pre {
	overflow: auto;
	padding: 26px;
}

code {
	border-radius: 3px;
	padding: 2px 5px;
}

abbr, acronym {
	border-bottom: 1px dotted #777;
	cursor: help;
	text-decoration: none;
}

a abbr, a acronym { border-bottom: none; }