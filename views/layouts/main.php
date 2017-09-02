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
    background: url(static/ck/2048x1365_739538.jpeg) no-repeat;
    background-position: 16% 23%;
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
    background-color: #fff;
    padding: 5px;
    margin-bottom: 10px;
    margin-left: 10px;
}

.mj-block h3.title {
    margin-top:7px;
    margin-bottom:7px;
    margin-left: 7px;
    
    font-size: 18px;
    font-weight: bold;
    color: #444;
}

.mj-block h3.title small {
    display:inline;
    font-weight:bold;
    font-size:11px;
}

.mj-block div.mj-content {
    padding: 20px;
    padding-top:0px;
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

h3.mj-category {
    font-size: 13px;
    margin-bottom: 3px;
    margin-top: 10px;
}

h3.mj-category small {
    font-size: 13px;
}

#mj-timeline {
    padding: 0px;
    min-height: 650px;
    background-color: #fff;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;    
}

#mj-right-column {
    margin-top: 65px;    
    margin-left: -10px;
}

.mj-post {
    cursor: pointer;
    padding-left: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid #f5eeee;
    margin-top: 0px;    
}

.mj-post:hover {
    background-color: rgba(0,0,0,.05);
}

.mj-post-media {
    margin-bottom: 6px;
}

.mj-post-media .mj-img-main {
    max-width: 400px;
    border-radius: 2px;
}

.mj-post-author {
    color: #2b55ad;
    font-weight: bold;
    font-size: 13px;
}

.mj-composer {
    padding: 13px;
    border-bottom: 1px solid #f5eeee;
    background-color: #E8FAF2;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}

.mj-composer .input-group input {
    border-right: 0px;
    border-color: #A3EBCE;
    color: #19CF86;
    box-shadow: 0px 0px 0px #fff;
}

.mj-composer .input-group span {
    background-color: #fff;
    border-color: #A3EBCE;    
    color: #19CF86;
}

.mj-composer .input-group span:hover {
    cursor: pointer;
}

.mj-composer .input-group span span{
    font-size: 14px;
}

.mj-btn {
    border-color: transparent;
    border-radius: 15px;
    font-weight: bold;
    color: #fff;
    font-size: 13px;
    padding: 6px 16px;
}

.mj-btn:focus {
    border-color: transparent;
}

.mj-btn:hover {
    border-color: transparent;
}

.mj-btn-success {
    background-color: #19CF86;
}

.mj-btn-danger {
    background-color: #e0245e;
}

.mj-btn-success:hover {
    background-color: #19CF86;
}

.mj-btn-decor {
    display: table;
    border-radius: 18px;
    padding: 2px;
    width: 74px;
    margin-left: 5px;
}

.mj-btn-decor-success {
    border: 2px solid #19CF86;
}

.mj-btn-decor-danger {
    border: 2px solid #e0245e;
}

.mj-btn-success:focus,
.mj-btn-success:active {
    background-color: #19CF86 !important;
    border-color: transparent !important;
}

.mj-btn-primary {
}

#composerModal .modal-dialog {
    width: 700px;
}

#composerModal .modal-content {
    border-radius: 8px;
}

#composerModal .modal-content .modal-header {
    text-align: center;
    padding: 10px;
}

#composerModal .modal-content .modal-header .close {
    font-size: 25px;
    color: #000 !important;
    opacity: .5;
}

#composerModal .modal-content .modal-body {
    background-color: #E8FAF2;
    border-radius: 8px;
}

.mj-post-content textarea {
    border-color: #A3EBCE;
    color: #666;
}

.mj-post-details {
    margin-top: 10px;
    min-height: 40px;
}

.mj-post-details div div.mj-editor-plugin {
    margin-right: 13px;
    display: inline;
}

.mj-post-details div a:hover,
.mj-post-details div a:focus,
.mj-post-details div a:active {
    text-decoration: none;
}

#mj-composer-editor {
    border: 1px solid #A3EBCE; 
    border-radius: 3px;
    color: #666;
    background-color: #fff;
    padding: 5px;
    min-height: 200px;
}

#mj-composer-editor:focus,
#mj-composer-editor:active {
    border: 1px solid #A3EBCE !important; 
}

.mj-composer-content div {
    display: block;
}

.mj-text-success {
    color: #19CF86;
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
