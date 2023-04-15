<?php
/**
 * Title: Testimonial Card
 * Slug: card-testimonial
 * Description: 
 * Categories: card, testimonial
 * Keywords: testimonial, card, avatar, text, quote, review, rating
 * Viewport Width: 600
 * Block Types: 
 * Post Types: 
 * Inserter: true
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}},"border":{"radius":"5px"}},"borderColor":"textshade","backgroundColor":"base","className":"is-style-default","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-default has-border-color has-textshade-border-color has-base-background-color has-background" style="border-radius:5px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:quote -->
<blockquote class="wp-block-quote"><!-- wp:paragraph -->
<p>I love using WordPress but traditionally it has been hard to design in. Not any more! Now, I can quickly build full page designs with beautiful patterns!</p>
<!-- /wp:paragraph --></blockquote>
<!-- /wp:quote -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"id":1107900,"width":60,"height":60,"sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded-full is-style-rounded"} -->
<figure class="wp-block-image size-thumbnail is-resized is-style-rounded-full is-style-rounded"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/luis-caffarelli-400x400.jpg" alt="" class="wp-image-1107900" width="60" height="60"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<p style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">Alex Glacier</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
