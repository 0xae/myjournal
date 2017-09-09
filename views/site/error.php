<?php
use yii\helpers\Html;
$this->title = $name;
?>

<div class="container">
    <h1>
        <?= Html::encode($this->title) ?><br/>
        <small>
        <?= nl2br(Html::encode($message)) ?>
        </small>        
    </h1>

    <div class="well">
        <p>
            The above error occurred while the Web server was processing your request.
        </p>
        <p>
            Please contact us if you think this is a server error.
        </p>
        <p>
            <i>Thank you.</i>
        </p>
    </div>
</div>

