<div class="mj-block">
    <h3 class="title">
        Categories 
        <small>· settings</small>
    </h3>
    
    <div class="mj-content">
        <?php foreach ($categoryData as $cat):  ?>
            <p class="mj-category">
                <a href="index.php?r=home/index&id=<?= $cat['id'] ?>" class="mj-link"><?= $cat['name'] ?></a>
                <br/>
                <small class="mj-category-posts-count">
                    <?= $cat['total_post'] ?> posts
                </small>
            </p>
        <?php endforeach; ?>
    </div>
</div>

