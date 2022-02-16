<h1><?php echo __( 'Lessons Settings', 'md' ); ?></h1>
<hr />
<div class="md-content-wrap-small">
	<div class="md-sep-small">
		<?php $this->fields->field( 'slug', array(
			'type' => 'text',
			'label' => __( 'Page Slug', 'md' ),
			'description' =>  __( 'Change the URL of your Lessons pages.', 'md' ),
			'placeholder' => 'docs',
			'style' => 'width: 30%;'
		) ); ?>
	</div>
	<div class="md-sep-small">
		<?php $this->fields->field( 'archives_title', array(
			'type' => 'text',
			'label' => __( 'Page Title', 'md' ),
			'description' => __( 'Add an <code>h1</code> title tag to the top of the Docs archive page.', 'md' )
		) ); ?>
	</div>
	<div class="md-sep-small">
		<?php $this->fields->field( 'archives_text', array(
			'type' => 'textarea',
			'label' => __( 'Page Text', 'md' ),
			'description' => __( 'Write a description below the title.', 'md' ),
			'rows' => 4
		) ); ?>
	</div>
	<div class="md-sep-small">
		<?php $this->fields->field( 'layout', array(
			'type' => 'checkbox',
			'label' =>  __( 'Layout', 'md' ),
			'description' => sprintf( __( '<b>Tip:</b> Assign custom sidebars to your Docs pages on the <a href="%s">Widgets > Edit Sidebars</a> screen.', 'md' ), admin_url( 'widgets.php' ) ),
			'options' => array(
				'enable_search' => __( '<b>Enable</b> search bar', 'md' )
			)
		) ); ?>
	</div>
	<?php $this->fields->save(); ?>
</div>