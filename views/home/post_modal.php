<!-- Modal -->
<div class="modal fade" id="postViewModal" tabindex="-1" role="dialog" aria-labelledby="postViewModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!--
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      -->

      <div class="modal-body" style="padding:0px;" class="">
            <div style="padding:0px;" id="mj-post-view">
            </div>

            <div class="mj-composer-reply" style="background-color: #E8FAF2;border-bottom-left-radius: 4px;border-bottom-right-radius: 4px;">
                <?php
                    echo \Yii::$app->view->renderFile(
                        "@app/views/plugins/composer_plugin.php",
                        [
                            'pluginId' => 'post_reply_12',
                            'class' => '',
                            'onInit' => "function (pluginId) {
                             }",
                            'onSave' => 'function (post) {
                                console.info("the post is ", post);
                                
                                setTimeout(function (){
                                    streamPost(post.id)
                                    .then(function (data) {
                                        $("#mj-post-view").append(data);
                                        $(".mj-no-replies").hide();
                                    });
                                }, 150);
                            }',
                            'onError' => 'function (error){
                                 console.error(error);
                            }',
                        ]
                    ); 
                ?>
            </div>
      </div>
    </div>
  </div>
</div>

