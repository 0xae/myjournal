<?php
?>

<!-- Single button -->
<div class="btn-group" style="margin-bottom: 10px">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="" id="mj_category_label">general</span> 
        <span class="caret"></span>
        <span class="hidden" id="mj_category_id">1</span>
        <span class="hidden" id="mj_category_name">general</span>
  </button>
  <ul class="dropdown-menu" role="menu" id="mj-category-menu">
    <li style="padding: 0px;">
        <input type="text" class="form-control" placeholder="category name" id="mj_category_filter" />
    </li>
    <?php foreach ($categoryData as $cat): ?>
        <li class="mj-category-index" data-category-name="<?= $cat->name ?>" id="mj-category-<?= $cat->id ?>">
            <a style="border-top: 1px solid #ccc" href="#" 
                class="mj-category-option"
                data-category-id="<?= $cat->id ?>"
                data-category-name="<?= $cat->name ?>">
                <?= $cat->name ?>
            </a>
        </li>
    <?php endforeach; ?>
    <li style="padding: 0px;" id="cat_not_found">
        <a href="javascript:void(0)" style="font-size: 11px" id="mj_create_category">
            category not found. add ?
        </a>
    </li>
  </ul>
</div>

