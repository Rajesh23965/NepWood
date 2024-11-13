<?php if (isset($topbar)): extract($topbar);endif?>
<span class='about-title'><i class="fab fa-facebook me-2"></i>सामाजिक संजाल</span>
<hr />
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v20.0&appId=959587082485275" nonce="i1w23i5C">

</script>
<div class="fb-page" data-href="<?=$facebook ?? ''?>" data-tabs="timeline" data-width="320" data-height="500"
    data-small-header="true" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="false">
    <blockquote cite="<?=$facebook ?? ''?>" class="fb-xfbml-parse-ignore">
        <a href="<?=$facebook ?? ''?>">IT Home Pvt. Ltd.</a>
    </blockquote>
</div>