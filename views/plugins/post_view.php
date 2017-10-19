<?php
$date = new DateTime($post->creation_date);
$replies = $post->getReplies();
?>

<div class="media mj-post-outdoor mj-post <?= $post->parent ? 'mj-reply' : '' ;?>" 
     title="Post #<?= $post->id ?>" 
     id="mj_post_<?= $post->id ?>"
     data-post-id="<?= $post->id ?>"
     data-post-author="<?= $post->getAuthor()->id ?>"
     style="min-height: 300px"
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

        <ul class="nav nav-pills">
            <li role="presentation" class="" title="2 love">
                <a href="#" style="font-size:10px;padding: 0px;padding-right:3px;color:#e0245e">
                    <strong>
                        <span class="fa fa-heart-o" style="padding-right:5px;"></span> 0
                    </strong>                    
                </a>
            </li>
            
            <?php if (!$post->parent): ?>

                <li role="presentation" class="" style="margin-left: 24px;" title="0 comments">
                    <a href="javascript:void(0)" style="color:#1da1f2;font-size:10px;padding: 0px;">
                        <strong>
                        <span class="fa fa-commenting" style="padding-right:5px;"></span> 
                           <?= count($post->getReplies()); ?>
                        </strong>
                    </a>
                </li>
            
            <?php endif; ?>

            <li role="presentation" class="" style="margin-left: 24px;" title="views">
                <a href="javascript:void(0)" style="color:#1da1f2;font-size:10px;padding: 0px;">
                    <strong>
                    <span class="glyphicon glyphicon-signal" style="padding-right:5px;"></span> 0
                    </strong>
                </a>
            </li>
            
            <?php if (!$post->parent): ?>

            <li role="presentation" title="category <?= $post->getCategory()->name; ?>" style="margin-left: 24px;">
                <a href="index.php?r=home/index&id=<?= $post->getCategory()->id ?>" style="color:#777;font-size:11px;padding: 0px;margin-top: -1px;padding-left: 3px;padding-right: 3px;">                       
                    <strong>
                        <span class="fa fa-tag" style="font-size: 9px;"></span>
                        <?= $post->getCategory()->name ?>
                    </strong>
                </a>
            </li>

            <?php endif; ?>
        </ul>

    </div>
</div>

<?php if (count($replies) == 0): ?>
<!--
<div class="mj-no-replies">
    <center>
    <h3 style="margin-top:30px;margin-bottom:30px;" class="mj-special-h3">No replies</h3>
    </center>
</div>
-->
<?php endif; ?>

<div class="mj-post-replies">
    <div id="mj-reply-index"></div>

    <?php foreach ($replies as $reply): ?>
         <div>
            <?= \Yii::$app->view->renderFile(
                "@app/views/plugins/post.php",
                ['post' => $reply]
            );
            ?>
         </div>
    <?php endforeach; ?>
</div>



