<?php if ( ! in_array( 'author', $byline ) || in_array( 'avatar', $byline ) ) : ?>
    <span class="byline-author byline-item box-lr ase-avatar">
        <?php 
        if ( in_array( 'avatar', $byline ) ) :
            $avatar_size = isset( $args['avatar_size'] ) ? $args['avatar_size'] : 80;
            $avatar_url = get_avatar_url( get_the_author_meta( 'ID' ), array( 'size' => $avatar_size ) );
        ?>
            <img 
                src="<?php echo esc_url( $avatar_url ); ?>" 
                alt="<?php echo esc_attr( get_the_author_meta( 'display_name' ) ); ?>" 
                class="circle mr-half byline-avatar-40" 
                width="<?php echo esc_attr( $avatar_size ); ?>" 
                height="<?php echo esc_attr( $avatar_size ); ?>" 
            />
        <?php endif; ?>
        <?php if ( ! in_array( 'author', $byline ) ) : ?>
            <span class="author vcard mr-small">
                <i class="md-icon-user-circle" aria-hidden="true"></i> <span class="byline-author-name" itemprop="name"><?php echo esc_html( get_the_author() ); ?></span>
            </span>
        <?php endif; ?>
    </span>
<?php endif; ?>