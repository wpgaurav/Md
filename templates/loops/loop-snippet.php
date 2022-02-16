<!-- Web Tools Query -->
<h2 class="text-center block-single-tb">Free Web Tools</h2>
<?php 
   // the query
   $the_query = new WP_Query( array(
    'posts_per_page' => -1,
	  'post_type' => 'snippet',
	  'tax_query' => array(
        array (
            'taxonomy' => 'programming_language',
            'field' => 'slug',
            'terms' => 'web-tools',
        )
   ))); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="accordion inner block-single white">
	<div class="columns-2 columns-single columns-flex">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div id="content-<?php the_ID(); ?>" class="col">
						<h3 class="teaser-title block-single-tb"><a href="<?php the_permalink(); ?>"><i class="icon-triangle-right"></i> <?php the_title(); ?></a></h3>
		</div>
		<?php endwhile; ?>
	</div>
</div>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
<!-- Web Tools Query -->
<h2 class="text-center block-single-tb">PHP &amp; WordPress Snippets</h2>
<?php 
   // the query
   $the_query = new WP_Query( array(
    'posts_per_page' => -1,
	  'post_type' => 'snippet',
	  'tax_query' => array(
        array (
            'taxonomy' => 'programming_language',
            'field' => 'slug',
            'terms' => 'php',
        )
   ))); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="accordion inner block-single white">
	<div class="columns-2 columns-single columns-flex">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div id="content-<?php the_ID(); ?>" class="col">
						<h3 class="teaser-title block-single-tb"><a href="<?php the_permalink(); ?>"><i class="icon-triangle-right"></i> <?php the_title(); ?></a></h3>
		</div>
		<?php endwhile; ?>
	</div>
</div>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
<!-- Web Tools Query -->
<h2 class="text-center block-single-tb">CSS Snippets</h2>
<?php 
   // the query
   $the_query = new WP_Query( array(
    'posts_per_page' => -1,
	  'post_type' => 'snippet',
	  'tax_query' => array(
        array (
            'taxonomy' => 'programming_language',
            'field' => 'slug',
            'terms' => 'css',
        )
   ))); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="accordion inner block-single white">
	<div class="columns-2 columns-single columns-flex">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div id="content-<?php the_ID(); ?>" class="col">
						<h3 class="teaser-title block-single-tb"><a href="<?php the_permalink(); ?>"><i class="icon-triangle-right"></i> <?php the_title(); ?></a></h3>
		</div>
		<?php endwhile; ?>
	</div>
</div>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
<!-- Web Tools Query -->
<h2 class="text-center block-single-tb">.NET Snippets</h2>
<?php 
   // the query
   $the_query = new WP_Query( array(
    'posts_per_page' => -1,
	  'post_type' => 'snippet',
	  'tax_query' => array(
        array (
            'taxonomy' => 'programming_language',
            'field' => 'slug',
            'terms' => 'dot-net',
        )
   ))); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="accordion inner block-single white">
	<div class="columns-2 columns-single columns-flex">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div id="content-<?php the_ID(); ?>" class="col">
						<h3 class="teaser-title block-single-tb"><a href="<?php the_permalink(); ?>"><i class="icon-triangle-right"></i> <?php the_title(); ?></a></h3>
		</div>
		<?php endwhile; ?>
	</div>
</div>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
<!-- Web Tools Query -->
<h2 class="text-center block-single-tb">Javascript Snippets</h2>
<?php 
   // the query
   $the_query = new WP_Query( array(
    'posts_per_page' => -1,
	  'post_type' => 'snippet',
	  'tax_query' => array(
        array (
            'taxonomy' => 'programming_language',
            'field' => 'slug',
            'terms' => 'javascript',
        )
   ))); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="accordion inner block-single white">
	<div class="columns-2 columns-single columns-flex">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div id="content-<?php the_ID(); ?>" class="col">
						<h3 class="teaser-title block-single-tb"><a href="<?php the_permalink(); ?>"><i class="icon-triangle-right"></i> <?php the_title(); ?></a></h3>
		</div>
		<?php endwhile; ?>
	</div>
</div>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
<!-- Web Tools Query -->
<h2 class="text-center block-single-tb">SQL Snippets</h2>
<?php 
   // the query
   $the_query = new WP_Query( array(
    'posts_per_page' => -1,
	  'post_type' => 'snippet',
	  'tax_query' => array(
        array (
            'taxonomy' => 'programming_language',
            'field' => 'slug',
            'terms' => 'sql',
        )
   ))); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="accordion inner block-single white">
	<div class="columns-2 columns-single columns-flex">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div id="content-<?php the_ID(); ?>" class="col">
						<h3 class="teaser-title block-single-tb"><a href="<?php the_permalink(); ?>"><i class="icon-triangle-right"></i> <?php the_title(); ?></a></h3>
		</div>
		<?php endwhile; ?>
	</div>
</div>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
<!-- Web Tools Query -->
<h2 class="text-center block-single-tb">XML Snippets</h2>
<?php 
   // the query
   $the_query = new WP_Query( array(
    'posts_per_page' => -1,
	  'post_type' => 'snippet',
	  'tax_query' => array(
        array (
            'taxonomy' => 'programming_language',
            'field' => 'slug',
            'terms' => 'xml',
        )
   ))); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="accordion inner block-single white">
	<div class="columns-2 columns-single columns-flex">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div id="content-<?php the_ID(); ?>" class="col">
						<h3 class="teaser-title block-single-tb"><a href="<?php the_permalink(); ?>"><i class="icon-triangle-right"></i> <?php the_title(); ?></a></h3>
		</div>
		<?php endwhile; ?>
	</div>
</div>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <?php md_template( 'content-item-404' ); ?>
<?php endif; ?>
<h2 class="text-center block-single-tb">Frequently Asked Questions</h2>
<div id="faqs" class="accordion inner block-double-tb">

  <!-- Group 1 -->

  <div id="faqs_1" class="accordion-group active">
    <div class="accordion-title" data-accordion="1">
How do I use these Code Snippets?</div>
    <div class="accordion-content">
    Depending on the programming language, the usage can differ. Please refer to the individual article/code snippet for detailed instructions on how to use these code snippets.
    </div>
  </div>

  <!-- Group 2 -->

  <div id="faqs_2" class="accordion-group">
    <div class="accordion-title" data-accordion="2">Do I need to credit you for the code?</div>
    <div class="accordion-content">
   Absolutely not. You can use these codes in your projects whether that’s personal or commercial. But it would be very kind of you if you could provide credit. That will encourage me to do better.
    </div>
  </div>

  <!-- Group 3 -->

  <div id="faqs_3" class="accordion-group">
    <div class="accordion-title" data-accordion="3">‘This’ code snippet doesn’t work, what to do?</div>
    <div class="accordion-content">
    If something doesn’t work, you can report that to me at gaurav@gauravtiwari.org :) I’ll take a maximum of 12 hours to respond to your email.
    </div>
  </div>
<div id="faqs_4" class="accordion-group">
    <div class="accordion-title" data-accordion="4">How to save these code snippets for later?</div>
    <div class="accordion-content">
    You can bookmark the pages or save the URLs to getpocket.com — and visit back later. You can also follow me on Twitter to get regular code updates.
    </div>
  </div>
</div>
<script type="application/ld+json" class="rank-math-schema-pro">
{
   "@type":"FAQPage",
   "@id":"https://gauravtiwari.org/code/#webpage",
   "url":"https://gauravtiwari.org/code/",
   "name":"60+ Free Code Snippets and Tutorials by Gaurav Tiwari",
   "datePublished":"2015-01-18T20:42:14-05:00",
   "dateModified":"2021-03-06T23:14:43-05:00",
   "author":{
      "@id":"https://gauravtiwari.org/author/wpgaurav/"
   },
   "isPartOf":{
      "@id":"https://gauravtiwari.org/#website"
   },
   "primaryImageOfPage":{
      "@id":"https://gauravtiwari.org/wp-content/uploads/2020/09/developer-code.jpeg"
   },
   "inLanguage":"en-US",
   "breadcrumb":{
      "@id":"https://gauravtiwari.org/code/#breadcrumb"
   },
   "mainEntity":[
      {
         "@type":"Question",
         "url":"https://gauravtiwari.org/code/#faq-question-1615090156293",
         "name":"How do I use these Code Snippets?",
         "acceptedAnswer":{
            "@type":"Answer",
            "text":"Depending on the programming language, the usage can differ. Please refer to the individual article/code snippet for detailed instructions on how to use these code snippets."
         }
      },
      {
         "@type":"Question",
         "url":"https://gauravtiwari.org/code/#faq-question-1615090216375",
         "name":"Do I need to credit you for the code?",
         "acceptedAnswer":{
            "@type":"Answer",
            "text":"Absolutely not. You can use these codes in your projects whether that's personal or commercial. But it would be very kind of you if you could provide credit. That will encourage me to do better."
         }
      },
      {
         "@type":"Question",
         "url":"https://gauravtiwari.org/code/#faq-question-1615090296435",
         "name":"'This' code snippet doesn't work, what to do?",
         "acceptedAnswer":{
            "@type":"Answer",
            "text":"If something doesn't work, you can report that to me at gaurav@gauravtiwari.org :)  I'll take a maximum of 12 hours to respond to your email."
         }
      },
      {
         "@type":"Question",
         "url":"https://gauravtiwari.org/code/#faq-question-1615090364405",
         "name":"How to save these code snippets for later?",
         "acceptedAnswer":{
            "@type":"Answer",
            "text":"You can bookmark the pages or save the URLs to getpocket.com \u2014 and visit back later. You can also <a href=\"https://twitter.com/wpgaurav\" class=\"rank-math-link\">follow me on Twitter</a> to get regular code updates."
         }
      }
   ]
}
</script>