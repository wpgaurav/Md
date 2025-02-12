<style type="text/css">

/*------------------------------*\
	$BLOCKS
\*------------------------------*/

.block { padding: <?php echo $single / 16; ?>rem <?php echo $double / 16; ?>rem; }

/* HALF */

.block-half, .frame { padding: <?php echo $half / 16; ?>rem; }

.block-half-top { padding-top: <?php echo $half / 16; ?>rem; }

.block-half-bot { padding-bottom: <?php echo $half / 16; ?>rem; }

.block-half-tb {
	padding-bottom: <?php echo $half / 16; ?>rem;
	padding-top: <?php echo $half / 16; ?>rem;
}

.block-half-lr {
	padding-left: <?php echo $half / 16; ?>rem;
	padding-right: <?php echo $half / 16; ?>rem;
}

/* SINGLE */

.block-single, .tagcloud, .note, .alert { padding: <?php echo $single / 16; ?>rem; }

.block-single-tb {
	padding-bottom: <?php echo $single / 16; ?>rem;
	padding-top: <?php echo $single / 16; ?>rem;
}

.block-single-lr {
	padding-left: <?php echo $single / 16; ?>rem;
	padding-right: <?php echo $single / 16; ?>rem;
}

.block-single-top, .block-full-content { padding-top: <?php echo $single / 16; ?>rem; }

.block-single-bot { padding-bottom: <?php echo $single / 16; ?>rem; }

/* MID */

.block-mid { padding: <?php echo $mid / 16; ?>rem; }

.block-mid-tb {
	padding-bottom: <?php echo $mid / 16; ?>rem;
	padding-top: <?php echo $mid / 16; ?>rem;
}

.block-mid-lr {
	padding-left: <?php echo $mid / 16; ?>rem;
	padding-right: <?php echo $mid / 16; ?>rem;
}

.block-mid-top { padding-top: <?php echo $mid / 16; ?>rem; }

.block-mid-bot { padding-bottom: <?php echo $mid / 16; ?>rem; }

/* DOUBLE */

.block-double { padding: <?php echo $double / 16; ?>rem; }

.block-double-tb {
	padding-bottom: <?php echo $double / 16; ?>rem;
	padding-top: <?php echo $double / 16; ?>rem;
}

.block-double-lr {
	padding-left: <?php echo $double / 16; ?>rem;
	padding-right: <?php echo $double / 16; ?>rem;
}

.block-double-top, .block-full-top { padding-top: <?php echo $double / 16; ?>rem; }

.block-double-bot, .block-full-content { padding-bottom: <?php echo $double / 16; ?>rem; }

.block-double-content { padding: <?php echo $single / 16; ?>rem <?php echo $double / 16; ?>rem <?php echo $double / 16; ?>rem; }

/* NONE */

.pt-none { padding-top: 0; }
.pr-none { padding-right: 0; }
.pb-none { padding-bottom: 0; }
.pl-none { padding-left: 0; }

@media all and (min-width: <?php echo $site_width; ?>px) {
	.close-on-desktop { display: none !important; }
}

@media all and (min-width: 992px) {
	[class*="block-full"] {
		padding-left: <?php echo $breakout_full; ?>%;
		padding-right: <?php echo $breakout_full; ?>%;
	}
}

@media all and (max-width: <?php echo $site_width; ?>px) {
	.close-on-max { display: none; }
}

@media all and (max-width: 992px) {
	/* DOUBLE */
	.block-double, .block-double-content { padding: <?php echo $double / 16; ?>rem; }
	.block-double-tb {
		padding-bottom: <?php echo $double / 16; ?>rem;
		padding-top: <?php echo $double / 16; ?>rem;
	}
	.block-double-lr {
		padding-left: <?php echo $double / 16; ?>rem;
		padding-right: <?php echo $double / 16; ?>rem;
	}
	.block-double-top { padding-top: <?php echo $double / 16; ?>rem; }
	.block-double-bot { padding-bottom: <?php echo $double / 16; ?>rem; }
	/* SINGLE */
	.sidebar {
		padding-bottom: <?php echo $single / 16; ?>rem;
		padding-top: <?php echo $single / 16; ?>rem;
	}
}

@media all and (max-width: 640px) {
	.block, .block-single, .tagcloud, .note, .alert {
		padding-left: <?php echo $half / 16; ?>rem;
		padding-right: <?php echo $half / 16; ?>rem;
	}
	.block-double-top { padding-top: <?php echo $single / 16; ?>rem; }
	.block-double-bot { padding-bottom: <?php echo $single / 16; ?>rem; }
}
