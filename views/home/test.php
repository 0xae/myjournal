<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], "action" => "index.php?r=api/upload"]); ?>
    <?= $form->field($model, 'file')->fileInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Create') ?>
    </div>
<?php ActiveForm::end(); ?>

