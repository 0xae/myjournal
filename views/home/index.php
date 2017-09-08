<?php
$this->title = 'My Journal';
?>

<div class="row" style="margin-right: 0px;">
    <div class="col-md-12">
        <div class="mj-header">
            <!-- <img src="static/ck/2048x1365_739538.jpeg" /> -->
        </div>
    </div>

    <div class="col-md-3">
        <div class="media mj-user-badge" style="margin-bottom: 10px;">
              <div class="media-left media-middle">
                    <a href="#">
                      <img
                          class="media-object mj-header-logo"
                          src="<?= \Yii::$app->user->identity->picture; ?>"
                        />
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
                    <a href="javascript:void(0)" class="mj-b-shadow mj-seen">· seen 15mn ago</a>
                    <!--
                    <a href="javascript:void(0)">
                        <span class="mj-settings-icon glyphicon glyphicon-cog"></span>
                    </a>
                    -->
              </div>
        </div>

        <?php
            echo \Yii::$app->view->renderFile(
                "@app/views/plugins/welcome_card.php",
                []
            ); 
        ?>

        <?php
            echo \Yii::$app->view->renderFile(
                "@app/views/plugins/category_listing.php",
                ["categoryData" => $categoryData]
            ); 
        ?>
    </div>

    <div class="col-md-6" id="mj-timeline">
        <!--
        <div class="mj-timeline-composer">
            <?php
                echo \Yii::$app->view->renderFile(
                    "@app/views/home/composer.php",
                    []
                ); 
            ?>
        </div>
        -->

        <div class="mj-timeline-posts">
            <span id="mj-timeline-ref"></span>
            <?php
                echo \Yii::$app->view->renderFile(
                    "@app/views/home/timeline.php",
                    ['postData' => $postData]
                ); 
            ?>
        </div>
    </div>

    <div class="col-md-3" id="mj-right-column">
        <div class="mj-compose-btn" style="">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#composerModal">
                <span class="fa fa-pencil"></span>
                <strong>Compose</strong>
            </button>
        </div>

        <?php
        echo \Yii::$app->view->renderFile(
            "@app/views/home/composer_modal.php",
            [
                "uploadModel" => $uploadModel,
                "postModel" => $postModel,
                "categoryData" => $categoryData
            ]
        );
        ?>

        <?php
            echo \Yii::$app->view->renderFile(
                "@app/views/plugins/twitch_plugin.php",
                ["user" => "yoda"]
            );
        ?>
    </div>
</div>

