<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Dropdown;

use app\models\ImgUpload;
use app\models\Post;

$uploadModel = new ImgUpload;
$postModel = new Post;
?>

<style type="text/stylesheet">
</style>

<div id="composer_<?= $pluginId ?>" class="mj-composer-instance">
    <div class="mj-post-content">
        <div class="mj-composer-content" id="mj-composer-editor-<?=$pluginId?>" contenteditable="true">Write...</div>
    </div>

    <div class="mj-post-details">
        <div class="pull-left" style="font-size: 18px;padding: 10px;">
            <div class="mj-editor-plugin">                            
                <?php 
                    $form = ActiveForm::begin([
                        "options" => ["enctype" => "multipart/form-data", 
                                      "class" => "hidden",
                                      "id" => "mj-composer-form-$pluginId"], 
                        "action" => "index.php?r=api/upload",                                                                                     
                    ]); 

                    echo $form->field($uploadModel, 'file')->fileInput(["id" => "form_upload_file_$pluginId"]);
                    ActiveForm::end(); 
                ?>

                <a id="mj-composer-upload-img-<?= $pluginId ?>" href="javascript:void(0)">
                    <span class="fa fa-picture-o mj-text-success"></span>
                </a>
            </div>

            <div class="mj-editor-plugin">
                <a id="mj-composer-insert-video-<?= $pluginId ?>" href="javascript:void(0)">
                    <span class="fa fa-video-camera mj-text-success"></span>
                </a>
            </div>

            <div class="mj-editor-plugin">
                <a id="mj-composer-insert-code-<?= $pluginId ?>" href="javascript:void(0)" style="font-size: 20px;">
                    <span class="fa fa-angle-left mj-text-success"></span>
                    <span class="fa fa-angle-right mj-text-success"></span>
                </a>
            </div>
        </div>

        <div class="mj-btn-decor mj-btn-decor-success pull-right">
            <button type="button" id="mj-save-post-<?=$pluginId?>" class=" btn btn-primary mj-btn mj-btn-success">Save</button>
        </div>
        
        <!--
        <div class="mj-btn-decor mj-btn-decor-danger pull-right">
            <button type="button" class=" btn btn-primary mj-btn mj-btn-danger">Cancel</button>
        </div>
        -->

        <?php $postForm = ActiveForm::begin([
            "options" => ["class" => "hidden","id" => "mj-composer-form-$pluginId"], 
            "action" => "index.php?r=post/create",
        ]); ?>

            <?= $postForm->field($postModel, 'content')->textarea(['rows' => 6, 'id'=>"form_post_content-$pluginId"]) ?>
            <?= $postForm->field($postModel, 'category')->textInput(['id' => "form-post-category-$pluginId"]) ?>
            <?= $postForm->field($postModel, 'parent')->textInput(['id' => "form-post-parent-$pluginId"]) ?>
        <?php ActiveForm::end(); ?>
    </div>

<!-- .mj-composer-instance -->
</div>

<?php

$scrip = <<<JS
        ($onInit)('$pluginId');
        $("#form-post-category-$pluginId").val(1);
        $("body").on("click", "#mj-save-post-$pluginId", function () {        
            var htmlBuffer = $("#mj-composer-editor-$pluginId").html().trim();
            var category = $("#form-post-category-$pluginId").val().trim();
            var parentPost = $("#form-post-parent-$pluginId").val().trim();

            if (!htmlBuffer || htmlBuffer == 'Write...'){
                return;
            }

            var newPost = {
                content: htmlBuffer,
                category: category
            };

            if (parentPost) {
                newPost.parent = parentPost;
            }
            
            savePost(newPost)
            .then(function (data){
                var json = JSON.parse(data);
                $("#mj-composer-editor-$pluginId").text("Write...");
                newPost.id = json.id;
                ($onSave)(newPost);
            }, function (error) {
                $(onError)(error);
            });
        });

        $("body").on("click", "#mj-composer-upload-img-$pluginId", function () {
            $("#form_upload_file_$pluginId").click();
        });

        $("#form_upload_file_$pluginId").change(function(){
            var form = $("#mj-composer-form-$pluginId _csrf");
            var fd = new FormData();
            fd.append("ImgUpload[file]", $("#form_upload_file_$pluginId")[0].files[0]);
            fd.append("X-CSRF-Token", $("#mj-composer-form-$pluginId input[name=_csrf]").val());
            fd.append("X-Requested-With", "XMLHttpRequest");

            $.ajax({
                type: "POST",
                url: "index.php?r=api/upload",
                data: fd,
                processData: false,
                contentType: false,

                success: function(data) {
                    var json = JSON.parse(data);                
                    var id = json.id;
                    var name = json.name;
                    $("#mj-composer-editor-$pluginId").append('<div class="mj-post-img" data-img="'+name+'" id="mj'+id+'"><img src="'+json.path+'" /></div><br/>');
                },

                error: function (err) {
                    ($onError)(err);
                }
            });
        });
JS;

$this->registerJs($scrip);
?>
