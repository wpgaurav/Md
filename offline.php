<?php 
/*
* This is the default offline template if you are using PWA on your WordPress website.
* All WordPress themes must come with this to ensure future compatibilities.
* @package PWA_Offline_Template
 */
namespace PWA_Offline_Template;
?>
<?php get_header(); ?>
<div id="content_box" class="content-box content-full style-default loop-default format">
  <div class="inner">
    <div id="content" class="content">
      <article id="offline-page" class="page post-box">
          <div class="content-text">
            <div class="content-inner">
              <p class="has-text-align-center">Uh oh!</p>
              <h1 class="has-text-align-center">You are offline.</h1>
              <?php wp_service_worker_error_message_placeholder(); ?>
              <p >I know this sucks. But can you retry <button onClick="window.location.href=window.location.href">reloading this page</button>? You can also <a href="/">return back to homepage</a> to see if this is temporary.</p>
				<a href="https://play.google.com/store/apps/details?id=org.gauravtiwari.app&hl=en_IN" rel="nofollow">You can install my android app to browse articles offline.</a>
            </div>
          </div>
      </article>
    </div>
  </div>
</div>
<?php get_footer(); ?>