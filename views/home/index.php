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
                    <a href="javascript:void(0)" class="mj-b-shadow mj-seen">· Seen 15mn ago</a>
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
                <h3 class="mj-category"> 
                    Food<br/>
                    <small>10 posts</small>
                 </h3> 

                <h3 class="mj-category"> 
                    #Trender tech<br/>
                    <small>2 posts</small>
                </h3> 
            </div>
        </div>
    </div>

    <div class="col-md-6" id="mj-timeline">
    </div>
    
    <div class="col-md-3">
    </div>
</div>

