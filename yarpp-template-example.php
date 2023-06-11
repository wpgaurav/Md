<?php
/*
YARPP Template: Photo List Template
Description: A simple starter example template that you can edit.
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
<aside class="yarpp-photolist alignright has-white-background-color has-border border-radius width-50 mb-single shadow" style="font-size:16px; line-height:1.3; z-index:10;">
	<p class="mb-half block-half bold has-border-bottom has-latest-green-background-color has-almond-color" style="border-radius:5px 5px 0 0">Related</p>
<?php if ( have_posts() ) : ?>
 <div class="md-inline-related block-half-tb">
	 <?php
	while ( have_posts() ) :
		the_post();
		?>
	 <div class="single-related box-lr block-half-lr" style="display:block; clear:both; margin-bottom:5px">
	<a href="<?php the_permalink(); ?>" rel="bookmark norewrite" title="<?php the_title_attribute(); ?>" class="md-thumbnail noborder nomobile"><?php the_post_thumbnail( 'md-thumbnail', array( 'class' => 'noborder alignleft circle', 'style' => 'width:40px; height:auto' ) ); ?></a>
	<a href="<?php the_permalink(); ?>" rel="bookmark norewrite" title="<?php the_title_attribute(); ?>" style="color:#00005e; text-decoration:none; display:block; font-weight:500"><?php the_title(); ?></a>
   </div>
	 <?php endwhile; ?>
	</div>
	<?php else : ?>
<p>No related posts.</p>
<?php endif; ?>
</aside>
<style>
@media (min-width:700px){
	.yarpp-photolist{
		max-width:400px
	}}
	.md-inline-related .alignleft{
		text-align:left!important;
	}
</style>