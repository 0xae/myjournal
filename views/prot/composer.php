<div class="mj-timeline-composer">

    <div class="media mj-composer">
        <div class="media-left media-middle">
            <a href="#">
                <img
                      class="media-object mj-header-logo"
                      src="<?= \Yii::$app->user->identity->picture; ?>"
                />
            </a>
        </div>
      
      <div class="media-body">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Write new post" aria-describedby="sizing-addon2">
            <span class="input-group-addon" id="sizing-addon2" data-toggle="modal" data-target="#composerModal">
                <span class="fa fa-edit"></span>
            </span>
        </div>
      </div>

    </div>

</div>

