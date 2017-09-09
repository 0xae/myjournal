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

.mj-logout-form {
    background-color: rgba(0,0,0,0.1);
    border-radius: 30px;
    margin-top: 10px;
}

.mj-logout-form img {
    height: 30px;
    width: 30px;
    border-radius: 20px;
}

.mj-logout-link {
    font-size: 11px;
    border:0px;
    padding:0px;
    background-color: transparent;
    margin-left: 10px;
    margin-right: 15px;
    color: #19CF86;
}

.mj-header {
    background-color: #337ab7;
    height: 400px;
    margin-bottom: -50px;
/*    background: url(static/images/88_berlin.jpg) no-repeat;
    background-position: 16% 23%;
*/
    background: linear-gradient(to bottom, rgba(255,255,255,0) 0%,rgba(0,0,0,0.8) 100%);
    max-height: 400px;
    /*
    */
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

.mj-category {
    font-size: 13px;
    margin-bottom: 3px;
    margin-top: 10px;
}

.mj-category small {
    font-size: 13px;
    color: #777;
}

.mj-link {
    color: #19CF86;
}

#mj-timeline {
    padding: 0px;
    min-height: 650px;
    background-color: #fff;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;    
}

#mj-right-column {
    /*margin-top: 65px;*/
    margin-left: -10px;
}

.mj-compose-btn {
    margin-bottom: 20px;
}

.mj-compose-btn button {
    padding: 10px;
    padding-left: 16px;
    padding-right: 16px;
    color: #19CF86;
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

.mj-btn-decor {
    display: table;
    border-radius: 18px;
    padding: 2px;
    /*width: 74px;*/
    margin-left: 5px;
}

.mj-btn {
    border-color: transparent;
    border-radius: 15px;
    font-weight: bold;
    color: #464242;
    /*
    font-size: 13px;
    padding: 6px 16px;
    */
    font-size: 11px;
    padding: 3px 11px;

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
    padding: 10px 10px;
    min-height: 200px;    
    max-height: 500px;    
    overflow-y: scroll;
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

#mj-composer-editor .mj-post-img {
    margin-bottom: 20px;
    margin-top: 15px;
    display: block;
    width: 100%;
}

#mj-composer-editor .mj-post-img img:hover {
    cursor: pointer;
}

#mj-composer-editor .mj-post-img img {
    height: 300px;
    width: 400px;
    /* border: 1px solid #A3EBCE; */
    border-radius: 3px;
}

#mj-composer-editor .mj-post-img img:hover {
    opacity: .7;
}

#mj-composer-editor .mj-post-img .fa-trash {
    font-size: 34px;
    color: #000;
}

#mj_category_filter {
    font-size: 12px;
    margin-top: -5px;
    border-radius: 0px;
    border: 0px;
}

.mj-category-option {
    width: 100%;
}

#mj-category-menu {
    max-height: 200px;
    min-height: 40px;
    min-width: 182px;
    max-width: 182px;
    overflow-y: scroll;
    overflow-x: hidden;
}

.mj-post .mj-post-img img {
    max-height: 300px;
    max-width: 400px;
    /* border: 1px solid #A3EBCE; */
    border-radius: 3px;
    margin-top: 10px;
}

.mj-post-img {
    max-width: 500px;
    max-height: 500px;
}

.mj-compose {
    margin-top: 10px;
    margin-right: 10px;
}

.mj-compose button {
    font-size: 11px;
    padding: 3px 11px;
}

</style>

</head>
<body>
<?php $this->beginBody() ?>

<div class="">
    <?php require_once 'navbar.php'; ?>
</div>

<div style="margin-top: 50px;">
    <?= $content ?>
</div>

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
