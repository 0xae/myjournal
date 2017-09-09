<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!--
        <a class="navbar-brand" href="#">
            Trender
        </a>
        -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="index.php?r=home/index" style="font-size: 13px;">
                   <span class="fa fa-newspaper-o"></span>
                   <strong>My Journal</strong>
                </a>
            </li>

            <!--
            <li>
                <a href="index.php?r=tv/index" style="font-size: 13px;">
                   <strong>Live TV</strong>
                </a>
            </li>

            <li>
                <a href="index.php?r=search/index" style="font-size: 13px;">
                   <strong>Search</strong>
                </a>
            </li>
            -->
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <?php if (Yii::$app->user->isGuest): ?>
                <li>
                    <a href="index.php?r=site/login" style="font-size: 13px;">
                       <strong>Login</strong>
                    </a>
                </li>
            <?php else: ?>
                <li>                    
                    <div class="mj-btn-decor mj-compose mj-btn-decor-success pull-right">
                        <button type="button" class="btn btn-primary mj-btn mj-btn-success" data-toggle="modal" data-target="#composerModal">
                            Compose
                            <span class="fa fa-pencil"></span>
                        </button>
                    </div>
                </li>

                <li>
                    <?php
                    echo Html::beginForm(['/site/logout'], 'post', ["class"=>"mj-logout-form"])
                        . '<img
                              src="' . \Yii::$app->user->identity->picture . '?>"
                           />'
                        . Html::submitButton(
                            'Logout',
                            ['class' => 'mj-logout-link']
                        )
                        . Html::endForm();
                    ?>
                </li>
            <?php endif; ?>
        </ul>
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>
