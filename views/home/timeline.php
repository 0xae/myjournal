<?php 

foreach ($postData as $post) {
    echo \Yii::$app->view->renderFile(
        "@app/views/plugins/post.php",
        ['post' => $post]
    );
}

?>

