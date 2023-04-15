<?php
/*
YARPP Template: Thumbnails
Description: This template returns the related posts as thumbnails in an ordered list. Requires a theme which supports post thumbnails.
Author: YARPP Team
*/
?>

<?php
/*
Templating in YARPP enables developers to uber-customize their YARPP display using PHP and template tags.

The tags we use in YARPP templates are the same as the template tags used in any WordPress template. In fact, any WordPress template tag will work in the YARPP Loop. You can use these template tags to display the excerpt, the post date, the comment count, or even some custom metadata. In addition, template tags from other plugins will also work.

If you've ever had to tweak or build a WordPress theme before, you’ll immediately feel at home.

// Special template tags which only work within a YARPP Loop:

1. the_score()		// this will print the YARPP match score of that particular related post
2. get_the_score()		// or return the YARPP match score of that particular related post

Notes:
1. If you would like Pinterest not to save an image, add `data-pin-nopin="true"` to the img tag.

*/
?>

<?php
/* Pick Thumbnail */
global $_wp_additional_image_sizes;
if ( isset( $_wp_additional_image_sizes['yarpp-thumbnail'] ) ) {
	$dimensions['size'] = 'md-banner';
} else {
	$dimensions['size'] = 'md-banner'; // default
}
?>
<aside class="bleed block-single mt-single" style="background-color: #F3F4F6;">
<div class="inner text-center">
<h3 class="aligncenter">More like this</h3>
<?php if ( have_posts() ) : ?>
<div class="grid-3" style="row-gap: 20px; column-gap: 20px; line-height:1.25">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="col has-white-background-color has-border border-radius">
		<a href="<?php the_permalink(); ?>" rel="bookmark norewrite" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( $dimensions['size'], array( 'data-pin-nopin' => 'true' ) ); ?></a>
	<a href="<?php the_permalink(); ?>" rel="bookmark norewrite" title="<?php the_title_attribute(); ?>" style="text-decoration:none; color:#262a5d;"><p class="mb-half block-half bold"><?php the_title(); ?></p></a>
	</div>
		<?php endif; ?>
	<?php endwhile; ?>
</div>

<?php else : ?>
<p>No related posts.</p>
<?php endif; ?>
</div>
</aside>
<style id="md-yarpp">.loop-default.style-default .post-box > div{border-bottom:0!important} .yarpp img.wp-post-image {
    margin-bottom: 17px;
}</style>