-<!-- 
-src="http://player.twitch.tv/?channel=plyasm&muted=true" 
-src="http://player.twitch.tv/?channel=litchi_2525&muted=true"
-src="http://player.twitch.tv/?channel=yoda&muted=true"
-<div style="padding-top:0px;padding:10px;margin-bottom:10px;padding-bottom:0px;border-bottom: 1px solid #f5eeee;">
-    <h3 style="margin-bottom:0px;margin-top:0px;" class="tr-sec-title">
-        twitch
-    </h3>
-    <p style="color: #666;font-size:11px;">
-        <strong>
-        @litchi_2525
-        </strong>
-    </p>
-</div>
--->

<div class="mj-block">
    <h3 class="title">
        Twitch
        <small>· @<?= $user ?></small>
    </h3>

    <center>
        <iframe
          src="http://player.twitch.tv/?channel=<?= $user ?>&muted=true&autoplay=0" 
          height="200"
          width="290"
          border="0"
          style="border:0px"
          scrolling="no"
          allowfullscreen="true">
        </iframe>
    </center>
</div>
