<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Dropdown;
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
                <?php
                 $composerId = 'composer55dk';
                 $categoryId = 'category77pk';

                    echo \Yii::$app->view->renderFile(
                        "@app/views/plugins/category_selector.php",
                        [
                            'pluginId' => $categoryId,
                            'categoryData' => $categoryData,
                            'onChange' => "function (newCat){                                    
                                  $('#form-post-category-$composerId').val(newCat.id);
                            }",
                            'onError' => 'function (error){
                                 console.error(error);
                            }'                           
                        ]
                    ); 
 
                     echo \Yii::$app->view->renderFile(
                        "@app/views/plugins/composer_plugin.php",
                        [
                            'pluginId' => $composerId,
                            'onInit' => 'function(){}',
                            'onSave' => 'function (post){                        
                                $("#composerModal").modal("hide");

                                setTimeout(function (){
                                    streamPost(post.id)
                                    .then(function (data) {
                                        $("#mj-timeline-ref").append(data);
                                    });
                                }, 700);
                            }',
                            'onError' => 'function (error){
                                 console.error(error);
                            }',
                        ]
                    ); 
                ?> 

            </div>
        <!-- .modal-content -->
        </div>

    <!-- .modal-dialog -->
    </div>    
<!-- .modal -->
</div>




