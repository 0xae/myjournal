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
                Categories 
                <small>· settings</small>
            </h3>
<div style="padding: 20px;padding-top:0px;">
    <h3 class="special-link"> 
        #WorldPhotoDay<br/>
        <small>@GTRao is Tweeting about this</small>
     </h3> 

    <h3 class="special-link"> 
        #NationalAviationDay 
    </h3> 

    <h3 class="special-link"> 
        Boston  <br/>
        <small>@SSD is Tweeting about this</small>
    </h3> 

    <h3 class="special-link"> 
        #freespeechrally 
    </h3> 

    <h3 class="special-link"> 
        #STOARS 
    </h3> 

    <h3 class="special-link"> 
        Stoke 
    </h3> 

    <h3 class="special-link"> 
        #WengerOut 
    </h3> 

    <h3 class="special-link"> 
        #LV2017 
    </h3> 

    <h3 class="special-link"> 
        #Muzaffarnagar <br/>
        <small>@0xae is Tweeting about this</small>
    </h3> 
</div>
        </div>
    </div>

    <div class="col-md-6" id="mj-timeline">
    </div>
    
    <div class="col-md-3">
    </div>
</div>

