<?php
use app\models\LoginForm;
$this->title = 'My Journal';
?>


<div class="row">
    <div class="col-md-2">
    </div>

    <div class="col-md-3" style="margin-top: 100px;">
        <div class="">
            <h1><span class="fa fa-newspaper-o"></span> My Journal!</h1>

            <p class="lead">
                Fantastic microblogging!
            </p>
        </div>
    </div>
    
    <div class="col-md-1" style="height: 700px;border-left: 1px solid #ccc;">
    </div>

    <div class="col-md-6" style="margin-top: 100px;">
        <?php
            echo \Yii::$app->view->renderFile(
                "@app/views/site/login.php",
                ['model' => new LoginForm]
            ); 
        ?>
    </div>
</div>

