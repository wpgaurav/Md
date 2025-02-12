<style type="text/css">

/*------------------------------*\
	$SPACERS
\*------------------------------*/

.mt-none { margin-top: 0 !important; }
.mr-none { margin-right: 0; }
.mb-none { margin-bottom: 0 !important; }
.ml-none { margin-left: 0; }

/* QUAD */

.mt-quad:not(:last-child) { margin-top: <?php echo $quad / 16; ?>rem; }
.mb-quad:not(:last-child) { margin-bottom: <?php echo $quad / 16; ?>rem; }

/* TRIPLE */

.mt-triple:not(:last-child) { margin-top: <?php echo $triple / 16; ?>rem; }
.mb-triple:not(:last-child) { margin-bottom: <?php echo $triple / 16; ?>rem; }

/* DOUBLE */

.mt-double { margin-top: <?php echo $double / 16; ?>rem; }
.mr-double { margin-right: <?php echo $double / 16; ?>rem; }
.mb-double:not(:last-child) { margin-bottom: <?php echo $double / 16; ?>rem; }

/* MID */

.mt-mid { margin-top: <?php echo $mid / 16; ?>rem; }
.mb-mid:not(:last-child) { margin-bottom: <?php echo $mid / 16; ?>rem; }

/* SINGLE */

.mt-single { margin-top: <?php echo $single / 16; ?>rem; }
.mr-single { margin-right: <?php echo $single / 16; ?>rem; }
.mb-single:not(:last-child) { margin-bottom: <?php echo $single / 16; ?>rem; }

/* HALF */

.mt-half { margin-top: <?php echo $half / 16; ?>rem; }
.mr-half { margin-right: <?php echo $half / 16; ?>rem; }
.mb-half:not(:last-child), .byline { margin-bottom: <?php echo $half / 16; ?>rem; }

/* SMALL */

.mt-small { margin-top: <?php echo $small / 16; ?>rem; }
.mr-small { margin-right: <?php echo $small / 16; ?>rem; }
.mb-small:not(:last-child) { margin-bottom: <?php echo $small / 16; ?>rem; }
.ml-small { margin-left: <?php echo $small / 16; ?>rem; }

/* WRAPS */

@media all and (min-width: 992px) {
	.aligncenter.wrap, .alignleft.wrap{ margin-left: -<?php echo $double; ?>px; }
	.aligncenter.wrap, .alignright.wrap{ margin-right: -<?php echo $double; ?>px; }

	.aligncenter.wrap-small, .alignleft.wrap-small, .alignwide { margin-left: -<?php echo $single; ?>px; }
	.aligncenter.wrap-small, .alignlright.wrap-small, .alignwide { margin-right: -<?php echo $single; ?>px; }

	.content-full .aligncenter.wrap, .content-full .alignleft.wrap, .content-full .alignfull { margin-left: -<?php echo $breakout; ?>%; }
	.content-full .aligncenter.wrap, .content-full .alignright.wrap, .content-full .alignfull { margin-right: -<?php echo $breakout; ?>%; }

	.content-full .aligncenter.wrap-small, .content-full .alignleft.wrap-small, .content-full .alignwide { margin-left: -<?php echo $quad; ?>px; }
	.content-full .aligncenter.wrap-small, .content-full .alignright.wrap-small, .content-full .alignwide { margin-right: -<?php echo $quad; ?>px; }
}

@media all and (max-width: 992px) {
	/* TRIPLE */
	.mt-quad:not(:last-child) { margin-top: <?php echo $triple; ?>px; }
	.mb-quad:not(:last-child) { margin-bottom: <?php echo $triple; ?>px; }
	/* DOUBLE */
	.mt-triple:not(:last-child) { margin-top: <?php echo $double; ?>px; }
	.mb-triple:not(:last-child) { margin-bottom: <?php echo $double; ?>px; }
}

@media all and (max-width: 768px) {
	/* DOUBLE */
	.mt-quad:not(:last-child) { margin-top: <?php echo $double; ?>px; }
	.mb-quad:not(:last-child) { margin-bottom: <?php echo $double; ?>px; }
	/* SINGLE */
	.mt-triple:not(:last-child) { margin-top: <?php echo $single; ?>px; }
	.mb-triple:not(:last-child), .mb-double:not(:last-child) { margin-bottom: <?php echo $single; ?>px; }
}