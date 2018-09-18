<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php
if (drupal_is_front_page()) {
?>
<div class="fb-page" data-href="https://www.facebook.com/stunningmakeovers" data-tabs="timeline" data-width="300" data-height="650" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/stunningmakeovers" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/stunningmakeovers">Stunning Makeovers</a></blockquote></div>
<?php } else { ?>
	<div class="fb-page" data-href="https://www.facebook.com/stunningmakeovers" data-tabs="timeline" data-height="650" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/stunningmakeovers" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/stunningmakeovers">Stunning Makeovers</a></blockquote></div>
<?php } ?>
