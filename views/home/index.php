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

        <div class="mj-block">
            <h3 class="title">
                Welcome
            </h3>

            <div class="mj-content">
                <h3 class="title">
                    <small>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                    </small>                
                </h3>
            </div>
        </div>

        <div class="mj-block">
            <h3 class="title">
                Categories 
                <small>· settings</small>
            </h3>
            
            <div class="mj-content">
                <?php foreach ($categoryData as $cat): ?>
                    <p class="mj-category">
                        <a href="index.php?r=home/index&id=<?= $cat->id ?>#begin" class="mj-link">
                            <?= $cat->name ?>
                        </a>
                        <br/>
                        <small class="mj-category-posts-count">
                            <?= count($cat->getPosts()) ?> posts
                        </small>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
        

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
                "@app/views/home/twitch_plugin.php",
                ["user" => "yoda"]
            );
        ?>
    </div>
</div>




