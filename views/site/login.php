<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <h1>
        My Journal <small>Login</small>
    </h1>
    <p>
        <?= Html::a('Dont have an account?<br/>Signup here.', ['signup']); ?>
    </p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "<div class=\"col-lg-3\">{label}<br/>{input}</div><br/><div class=\"col-lg-8\">{error}</div>",
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
</div>
