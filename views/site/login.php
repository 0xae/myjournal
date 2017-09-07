<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<p>
    <?= Html::a('Dont have an account? Signup here.', ['signup']); ?>
</p>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'action' => ['site/login'],
    'fieldConfig' => [
        'template' => "<div class=\"col-lg-4\">{label}<br/>{input}</div><br/><div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'cool-label control-label'],
    ],
]); ?>

    <?= 
        $form->field($model, 'username')
             ->textInput(['autofocus' => true])
    ?>

    <?= 
        $form->field($model, 'password')
             ->passwordInput()                 
    ?>

    <?php
        $btn = '<span class="glyphicon glyphicon-lock"></span>';            
        echo Html::submitButton("$btn Log me in", ['class' => 'btn btn-success', 'name' => 'login-button']);
    ?>
<?php ActiveForm::end(); ?>


