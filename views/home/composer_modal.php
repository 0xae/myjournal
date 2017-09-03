<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<!-- Modal -->
<div class="modal fade" id="composerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    Compose new post
                </h4>
            </div>

            <div class="modal-body">
                <div class="mj-post-content">
                    <div class="mj-composer-content" id="mj-composer-editor" contenteditable="true">Write...</div>
                </div>
                
                <div class="mj-post-details">
                    <div class="pull-left" style="font-size: 18px;padding: 10px;">
                        <div class="mj-editor-plugin">                            
                            <?php $form = ActiveForm::begin([
                                "options" => ["enctype" => "multipart/form-data", 
                                              "class" => "hidden",
                                              "id" => "mj-composer-form"], 
                                "action" => "index.php?r=api/upload",
                                                                                        
                             ]); ?>
                                <?= $form->field($uploadModel, 'file')->fileInput(["id" => "form_upload_file"]) ?>
                            <?php ActiveForm::end(); ?>

                            <a id="mj-composer-upload-img" href="javascript:void(0)">
                                <span class="fa fa-picture-o mj-text-success"></span>
                            </a>
                        </div>

                        <div class="mj-editor-plugin">
                            <a id="mj-composer-insert-video" href="javascript:void(0)">
                                <span class="fa fa-video-camera mj-text-success"></span>
                            </a>
                        </div>

                        <div class="mj-editor-plugin">
                            <a id="mj-composer-insert-code" href="javascript:void(0)" style="font-size: 20px;">
                                <span class="fa fa-angle-left mj-text-success"></span>
                                <span class="fa fa-angle-right mj-text-success"></span>
                            </a>
                        </div>
                    </div>

                    <div class="mj-btn-decor mj-btn-decor-success pull-right">
                        <button type="button" id="mj-save-post" class=" btn btn-primary mj-btn mj-btn-success">Save</button>
                    </div>
                    
                    <!--
                    <div class="mj-btn-decor mj-btn-decor-danger pull-right">
                        <button type="button" class=" btn btn-primary mj-btn mj-btn-danger">Cancel</button>
                    </div>
                    -->

                    <?php $postForm = ActiveForm::begin([
                        "options" => ["enctype" => "multipart/form-data", 
                                      "class" => "hidden",
                                      "id" => "mj-composer-form"], 
                        "action" => "index.php?r=api/upload",
                    ]); ?>

                        <?= $postForm->field($postModel, 'content')->textarea(['rows' => 6]) ?>
                        <?= $postForm->field($postModel, 'author')->textInput() ?>
                        <?= $postForm->field($postModel, 'category')->textInput() ?>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        <!-- .modal-content -->
        </div>

    <!-- .modal-dialog -->
    </div>    
<!-- .modal -->
</div>




