<?php if ( md_has_menu() ) : ?>
	<button id="header-menu-trigger" class="header-menu-trigger header-trigger" aria-controls="primary-menu" aria-expanded="false" style="background:none; padding:12px;box-shadow: none;" aria-label="Browse">
		<?php echo md_icon( 'menu', array( 'classes' => 'header-menu-trigger-icon' ) ); ?>
		<span class="header-trigger-text"><?php echo md_get_menu_name( 'header' ); ?></span>
	</button>
<?php endif; ?>