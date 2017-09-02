<?php
    $posts = [1,2];
    foreach ($posts as $p){
        echo \Yii::$app->view->renderFile(
            "@app/views/home/post.php",
            []
        );         
    };  
?>

