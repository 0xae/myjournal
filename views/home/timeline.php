<?php foreach ($postData as $post): ?>

<div class="media mj-post" title="">
    <div class="media-left">
        <a href="#">
            <img class="media-object" src="static/thumbs/U5dtDf43rbDTZNgQkELFyjqZxyF9RGU_256x512.jpg" alt="Foto of steemerhrn" width="70" height="50" />
        </a>
    </div>

      <div class="media-body">
        <!--
        <img src="static/img/steemit-196x196.png" style="display:inline;width:15px;height:15px;"> 
        -->
        <h4 class="mj-post-author" style="display: inline;">
            <?= $post->getAuthor()->name; ?>
            <span style="color: #999;">· </span>
            <a href="#" title="2017-08-28T11:55:03Z" style="font-size:11px;padding: 0px;padding-right:3px;color:#777;text-decoration:none;font-weight:normal;">
               <?= $post->creation_date; ?>   
            </a>
        </h4>

        <div style="margin-bottom:5px;font-size:13px;">
            <?= $post->content ?>
        </div>
        
        <!--
        <div class="mj-post-media">
            <img class="mj-img-main" src="static/thumbs/d3a992083469da83e0a189a080cdadc5a3e3d2bc.jpg" />
        </div>
        -->

        <ul class="nav nav-pills">
            <li role="presentation" class="" title="2 love">
                <a href="#" style="font-size:10px;padding: 0px;padding-right:3px;color:#e0245e">
                    <strong>
                    <span class="fa fa-heart-o" style="padding-right:5px;"></span> 0
                    </strong>                    
                </a>
            </li>

            <li role="presentation" class="" style="margin-left: 24px;" title="0 comments">
                <a target="__blank" href="https://steemit.com/news/@steemerhrn/4pt19c-news-todays-most-popular-posts-here-promotion" style="color:#1da1f2;font-size:10px;padding: 0px;">
                    <strong>
                    <span class="fa fa-commenting" style="padding-right:5px;"></span> 0
                    </strong>
                </a>
            </li>

            <li role="presentation" class="" style="margin-left: 24px;" title="views">
                <a target="__blank" href="https://steemit.com/news/@steemerhrn/4pt19c-news-todays-most-popular-posts-here-promotion" style="color:#1da1f2;font-size:10px;padding: 0px;">
                    <strong>
                    <span class="glyphicon glyphicon-signal" style="padding-right:5px;"></span> 0
                    </strong>
                </a>
            </li>
            
            <!--
            <li role="presentation" class="" style="margin-left: 24px;">
                <a target="__blank" href="https://steemit.com/news/@steemerhrn/4pt19c-news-todays-most-popular-posts-here-promotion" style="color:#777;font-size:13px;padding: 0px;">
                    <strong>more..</strong>
                </a>
            </li>
            -->
        </ul>
      </div>
</div>

<?php endforeach; ?>

