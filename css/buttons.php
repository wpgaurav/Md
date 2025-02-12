<style type="text/css">

/*------------------------------*\
	$BUTTONS
\*------------------------------*/

input[type="submit"],
button,
.button, a.button, .button a,
.format .button {
	
	background-color: <?php echo $colors['site']['button']; ?>;
	border: none;
	border-radius: var(--radius-s);
	color: <?php echo $colors['site']['button-text']; ?>;
	cursor: pointer;
	font-size: inherit;
	font-family: inherit;
	display: inline-block;
	font-weight: 400;
	padding: 0.5rem 1rem;
	position: relative;
	text-align: center;
	transition: 0.3s;
	-webkit-appearance: none;
	padding: 0.5rem 1rem;
}

input[type="submit"]:hover,
button:hover,
.button:hover, a.button:hover, .button a:hover,
.format .button:hover {
	-moz-transform: translateY(1px);
	-ms-transform: translateY(1px);
	-webkit-transform: translateY(1px);
	transform: translateY(1px);
	box-shadow: var(--mainshadow);
}

.button-subtext { font-weight: <?php echo $font_weight; ?>; }

.button-subtext:empty { display: none; }

/* COLORS */

.button.button-sec, a.button.button-sec,
.button.button-sec a {
	background-color: <?php echo $colors['site']['button-sec']; ?>;
	color: <?php echo $colors['site']['button-sec-text']; ?>;
}

/* SIZES */

.button.button-small {
	font-size: 0.9rem;
	padding: 0.5rem 0.9rem;
}

.button.button-large {
	font-size: 1.4rem;
	padding: <?php echo $single; ?>px <?php echo $mid; ?>px;
}

.button-text {
	font-size: <?php echo $typography['h5']['font_size']['desktop']; ?>px;
	line-height: <?php echo $typography['h5']['line_height']['desktop']; ?>px;
}

/* OUTLINE */

.button.button-outline, .button.button-outline:hover {
	background-color: transparent;
	border: 3px solid <?php echo $colors['site']['button']; ?>;
	border-bottom-width: 3px;
	color: <?php echo $colors['site']['button']; ?>;
}

.menu .button.button-outline a { background-color: transparent; }

/* ARROW */

.button.button-arrow:after,
.button.button-arrow.button-text:after,
.menu .button-arrow a:after,
.woocommerce ul.products li.product .button:after {
	content: '\e80f';
	display: inline-block;
	font-family: 'md-icon';
	margin-left: 13px;
	-o-transition: 0.3s;
	-ms-transition: 0.3s;
	-moz-transition: 0.3s;
	-webkit-transition: 0.3s;
	transition: 0.3s;
}

.button.button-arrow:hover:after,
.button.button-arrow.button-text:after,
.menu .button-arrow a:hover:after,
.woocommerce ul.products li.product .button:after {
	-moz-transform: translateX(4px);
	-ms-transform: translateX(4px);
	-webkit-transform: translateX(4px);
	transform: translateX(4px);
}

.menu .button-arrow:after { display: none; }

/* BADGE */

.button.button-badge {
	border-bottom: 0;
	border-radius: 0 2px 2px 0;
	padding-right: 84px;
	position: relative;
}

.button.button-badge .badge {
	border-radius: 0 2px 2px 0;
	font-size: 20px;
	height: 100%;
	padding: 16px;
	position: absolute;
		top: 0;
		right: 0;
}

/* QUERIES */

@media all and (min-width: 640px) {
	.button + .button { margin-left: <?php echo $half; ?>px; }
}

@media all and (max-width: 640px) {
	.button, button, input[type="submit"] {
		display: block;
		width: 100%;
	}
	.button + .button { margin-top: <?php echo $half; ?>px; }
}