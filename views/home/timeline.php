<?php 

foreach ($postData as $post) {
    echo \Yii::$app->view->renderFile(
        "@app/views/home/post.php",
        ['post' => $post]
    );
}

?>

