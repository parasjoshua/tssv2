<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<link rel="shortcut icon" href="C:\xampp\htdocs\TSSv2\web\img\call.png" type="favicon/ico" />
<center>
<div class="col-lg-4"></div>
<div class="col-lg-4">
<br><br><br>
<div class="panel panel-primary">
<div class="panel-heading">TSS Admin / QMT Login</div>
    <div class="panel-body">
    <?php
    $this->title = 'TSS Admin Login';
    ?>
<div class="col-lg-12">
</div>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>

<div class="col-lg-12">
        <?= $form->field($model, 'username')->textInput(['options' => ['style' => 'width:100%']]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
</div>
<div class="form-group">
    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
</div>

    <?php ActiveForm::end(); ?>
</div>
</div>
</div>
<div class="col-lg-4"></div>
</center>   
