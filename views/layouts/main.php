<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
<style>
body {
    background-color: #e6ecf0;
}
.mj-header {
    background-color: #337ab7;
    height: 400px;
    margin-bottom: -50px;
    /*
    background: url(static/ck/2048x1365_739538.jpeg) no-repeat;
    background-position: 50% 50%;
    */
    max-height: 400px;
    overflow:hidden;
    overflow-y:scroll;
}

.mj-b-shadow {

}

.mj-user-badge {
    padding: 10px;
    padding-top:0px;
}
.mj-media-heading {
    color: blanchedalmond;
}
.mj-media-heading small,
.mj-user-badge a {
    color: #e6ecf0;
}

.mj-seen {
    font-size: 11px;
}

.mj-seen:hover {
    text-decoration: none;
}

.mj-block {
}

.mj-header-logo {
    width: 40px;
    border-radius: 40px;
}
.inline {
    display: inline;
}
.mj-settings-icon{
}

#mj-timeline {
    padding: 10px;
    min-height: 650px;
    background-color: #fff;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;    
}
</style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="">
    <?php
        NavBar::begin([
            'brandLabel' => '<span class="fa fa-newspaper-o"></span> My Journal',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-default navbar-fixed-top',
            ],
        ]);
        
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        NavBar::end();
    ?>
</div>

<?= $content ?>

<!--
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
