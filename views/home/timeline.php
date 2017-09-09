<div class="mj-timeline-posts">
    <span id="mj-timeline-ref"></span>

    <?php 
    foreach ($postData as $post) {
        echo \Yii::$app->view->renderFile(
            "@app/views/plugins/post.php",
            ['post' => $post]
        );
    }
?>
</div>

<?php
echo \Yii::$app->view->renderFile(
    "@app/views/plugins/post_modal.php"
);
?>


