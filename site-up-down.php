<?php
/**
 * Template Name: Site Down or Up Template
 * Template Post Type: snippet
 */
?>
<?php get_header(); ?>
<div class="builder format">
  <div class="inner white-bg accordion block-single text-center mt-single mb-single">
  <h1 class="large-title block-single-tb">Is my site up or down?</h1>
  <form class="down-tool-form form-attached" id="form" method="post" action="">
<input style="width:75%" type="url" name="website" id="down-tool-form-input" placeholder="Enter full url here !" pattern="https?://.+" required="" title="Please enter full url with https." autocomplete="off"><input width="24%" type="submit" id="down-tool-form-submit" class="button button-arrow"name="submit" value="check">
</form>
  <?php 

function url_test($url){


  $timeout=101;
  $ch =curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

  curl_setopt($ch, CURLOPT_TIMEOUT,$timeout);


  $http_respond=curl_exec($ch);
  $http_respond=trim(strip_tags($http_respond));
  $http_code=curl_getinfo($ch,CURLINFO_HTTP_CODE);



  if(($http_code=='200')||($http_code=='302')){

    return true;
  }else{
    return false;
  }


curl_close($ch);
}

if (isset($_POST["submit"])){


$website=$_POST["website"];


if(!url_test($website)){
  echo "<h2>".$website. " is <mark> DOWN &darr; </mark>"."</h2>";
  header( "Refresh:10; url=https://gauravtiwari.org/snippet/is-my-site-down-or-not/", true, 303);
}else{
  echo "<h2>".$website." is <mark> UP &uarr; </mark>"."</h2>";
}
header( "Refresh:20; url=https://gauravtiwari.org/snippet/is-my-site-down-or-not/", true, 303);
}
?>
</div>
</div>
<div class="inner block-double has-border white mt-double mb-single">
 <div class="format">
  <?php if ( md_has_content_box() ) : ?>
  <?php the_content(); ?>
<?php endif; ?>
</div>
</div>
<?php get_footer(); ?>