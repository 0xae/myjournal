<?php
/* @var $this yii\web\View */
?>

<div class="row">
    <div class="col-md-12">
        <div class="mj-header">
            <img src="static/ck/88_berlin.jpg" />
        </div>
    </div>

    <div class="col-md-3">
        <div class="media mj-user-badge">
              <div class="media-left media-middle">
                    <a href="#">
                      <img class="media-object mj-header-logo" src="static/img/d9e5634djw1east9pi6bej2050050dfw.jpg" />
                    </a>
              </div>
              <div class="media-body">
                    <h4 class="media-heading mj-media-heading inline mj-b-shadow">
                        <?= \Yii::$app->user->identity->name; ?>
                        <br/>
                        <small>
                            @<?= \Yii::$app->user->identity->username; ?>
                        </small>
                    </h4>
                    <a href="javascript:void(0)" class="mj-b-shadow mj-seen">· Seen 15mn ago</a>
                    <!--
                    <a href="javascript:void(0)">
                        <span class="mj-settings-icon glyphicon glyphicon-cog"></span>
                    </a>
                    -->
              </div>
        </div>
        
        <div class="mj-block">
        </div>
    </div>

    <div class="col-md-8" id="mj-timeline">
    </div>
</div>

