<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Dropdown;

use app\models\ImgUpload;
use app\models\Post;
?>

<!-- Single button -->
<div class="btn-group" style="margin-bottom: 10px">
  <button type="button" class="btn btn-default dropdown-toggle" style="border-color: #19CF86;font-weight: bold;font-size: 13px;" data-toggle="dropdown" aria-expanded="false">
        <span class="" id="mj_category_label_<?=$pluginId?>">general</span> 
        <span class="caret"></span>
        <span class="hidden" id="mj_category_id_<?=$pluginId?>">1</span>
        <span class="hidden" id="mj_category_name_<?=$pluginId?>">general</span>
  </button>
  <ul class="dropdown-menu" role="menu" id="mj-category-menu-<?=$pluginId?>">
    <li style="padding: 0px;position:fixed;border-bottom:1px solid #19CF86;">
        <input type="text" style="width: 165px;color: #19CF86" class="form-control" placeholder="category name" id="mj_category_filter_<?=$pluginId?>" />
    </li>
    <li style="padding: 0px;margin-bottom: 28px;">
    </li>

    <?php foreach ($categoryData as $cat): ?>
        <li class="mj-category-index" data-category-name="<?= $cat['name'] ?>" id="mj-category-<?= $cat['id'] ?>">
            <a style="border-top: 1px solid #ccc" 
                href="javascript:void(0)" 
                class="mj-category-option-<?=$pluginId?>"
                data-category-id="<?= $cat['id'] ?>"
                data-category-name="<?= $cat['name'] ?>">
                <?= $cat['name'] ?>
            </a>
        </li>
    <?php endforeach; ?>
    <li style="padding: 0px;margin-top: 35px;" id="cat_not_found_<?= $pluginId ?>">
        <a href="javascript:void(0)" style="font-size: 11px" id="mj_create_category_<?=$pluginId?>">
            few results found.<br/>
            create <span id="mj_new_category_pl_<?=$pluginId?>"></span> ?
        </a>
    </li>
  </ul>
</div>

<?php
$scrip = <<<JS
    $("#cat_not_found_$pluginId").hide();

    $("body").on("click", "a.mj-category-option-$pluginId", function () {
        var curr = $("#mj_category_id_$pluginId").text().trim();
        var data = {
            id: $(this).attr("data-category-id"),
            name: $(this).attr("data-category-name")
        };

        if (data.id==curr)
            return;

        $("#mj_category_id_$pluginId").text(data.id);
        $("#mj_category_name_$pluginId").text(data.name);
        $("#mj_category_label_$pluginId").text(data.name);

        ($onChange)(data);
    });

    $("#mj_category_filter_$pluginId").on("keyup", function () {
        var query = $(this).val();
        var count = 0;

        $("#mj-category-menu-$pluginId .mj-category-index").each(function (el) {
            if ($(this).attr("data-category-name").indexOf(query) == -1) {
                $(this).hide();
            } else {
                count += 1;
                $(this).show();
            }
        });

        if (count <= 1) {
            $("#mj_new_category_pl_$pluginId").text(query);
            $("#cat_not_found_$pluginId").show();
        } else {
            $("#cat_not_found_$pluginId").hide();
        }
    });

    $("#mj_create_category_$pluginId").on("click", function () {
        var catName = encodeURIComponent($("#mj_category_filter_$pluginId").val());
        $.ajax({
            type: "GET",
            url: "index.php?r=api/category_create&name=" + catName,
            success: function (data){
                var json = JSON.parse(data);                
                var id = json.id;
                var name = json.name;

                $("#mj_category_id_$pluginId").text(id);
                $("#mj_category_name_$pluginId").text(name);
                $("#mj_category_label_$pluginId").text(name);
                $("#cat_not_found_$pluginId").hide();

                ($onChange)(json);
                
                // TODO: do not append this node if it's already there
                var tpl = '<li class="mj-category-index" data-category-name="'+name+'>" id="mj-category-'+id+'">'+
                    '<a style="border-top: 1px solid #ccc" href="#"'+
                        'class="mj-category-option"'+
                        'data-category-id="'+id+'"'+
                        'data-category-name="'+name+'">'+
                        name +
                    '</a>'+
                '</li>';

                $("#mj-category-menu-$pluginId").append(tpl);                
            },

            error: function (e) {
                ($onError)(e);
            }
        });
    });
JS;

$this->registerJs($scrip);
?>

