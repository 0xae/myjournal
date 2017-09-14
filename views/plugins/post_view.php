<?php
$date = new DateTime($post->creation_date);
?>

<div class="media mj-post" 
     title="Post #<?= $post->id ?>" 
     id="mj_post_<?= $post->id ?>"
     data-post-id="<?= $post->id ?>"
     data-post-author="<?= $post->getAuthor()->id ?>"
     >
   
    <div class="media-left">
        <!--
        <a href="#">
            <img class="media-object mj-post-avatar" 
                 src="<?= $post->getAuthor()->picture; ?>" 
                 alt="Foto of <?= $post->getAuthor()->name; ?>" 
                 width="55" 
                 height="45" 
            />
        </a>
        -->
        <div class="mj-calendar">
            <div class="mj-calendar-header">
            <?= $date->format("M"); ?>
            </div>
            <h1><?= $date->format("d"); ?></h1>
        </div>        
    </div>

    <div class="media-body">
        <h4 class="mj-post-author" style="display: inline;">
            <?= $post->getAuthor()->name; ?>
            <span style="color: #999;">· </span>
            <a href="#" title="2017-08-28T11:55:03Z" style="font-size:11px;padding: 0px;padding-right:3px;color:#777;text-decoration:none;font-weight:normal;">
               <?= $post->creation_date; ?>   
            </a>
        </h4>

        <div style="margin-bottom:5px;font-size:13px;width:90%;"
             data-post-id="<?= $post->id ?>"
             data-post-author="<?= $post->getAuthor()->id ?>"
             class="mj-post-content">
            <?= $post->content ?>
        </div>

        <!--
        <div class="mj-post-media">
            <img class="mj-img-main" src="static/thumbs/d3a992083469da83e0a189a080cdadc5a3e3d2bc.jpg" />
        </div>
        -->
    </div>
</div>
