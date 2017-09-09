<div class="mj-timeline-posts">
    <div id="mj-timeline-ref">
        <h3>
            <?php if ($categoryFilter): ?>
                Category <?= $categoryFilter['name'] ?>
            <?php else: ?>
                Home
            <?php endif; ?>                    
        </h3>
    </div>

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


