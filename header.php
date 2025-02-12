<?php md_template( 'html' ); ?>
<?php md_hook_before_html(); ?>
<?php if ( md_has_header() ) : ?>
<header role="banner" id="header" class="<?php echo md_header_classes(); ?>" itemtype="https://schema.org/WPHeader" itemscope>
<?php md_hook_header_top(); ?>
<div class="inner">
<?php md_hook_before_header(); ?>
<div class="header-wrap">
<?php md_hook_header(); ?>
			<?php if ( md_has_menu() ) : ?>
			<div class="header-aside box-lr" style="justify-content: space-between">
				<?php md_hook_header_aside(); ?>
			</div>
			<?php endif; ?>
			<div class="header-triggers">
				<style id="trigger-custom">@media (max-width: 767px) {
					.header-triggers{
						padding-top:0;
						display: flex;
        				flex-direction: row;
        				align-items: center;
					}
					
					}
					@media (min-width: 768px){
						.header-triggers .md-popup-trigger{padding:16px}
						.header-triggers .md-popup-trigger:hover, .header .dark-header-invert:hover {background: #eee;border-radius: 100rem;}
						.header .dark-header-invert{background: #d2efd3;border-radius: 100rem;border:1px solid #a5c7ac}
					}
				</style>
				<?php echo do_shortcode('[md_popup id="frtRbA4" type="text" text="Search"]');?>
				<a href="/newsletter/" class="dark-header-invert invert" style="padding:16px;"><i class="md-icon-mail-alt" aria-hidden="true"></i> <span class="nomobile notablet bold">Newsletter</span></a>
				<?php md_hook_header_triggers(); ?>
			</div>
		</div>
		<?php md_hook_after_header(); ?>
</div>
<?php md_hook_header_bottom(); ?>
</header>
<?php endif; ?>
<?php if ( md_filter_template() !== false ) : ?>
	<?php md_hook_before_content_box(); ?>
<?php endif; ?>