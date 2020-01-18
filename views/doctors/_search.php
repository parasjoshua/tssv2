<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DoctorsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctors-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'lastname') ?>

    <?= $form->field($model, 'firstname') ?>

    <?= $form->field($model, 'midname') ?>

    <?= $form->field($model, 'chinesename') ?>

    <?= $form->field($model, 'room') ?>

    <?= $form->field($model, 'localnum') ?>

    <?= $form->field($model, 'department') ?>

    <?= $form->field($model, 'specialization') ?>

    <?= $form->field($model, 'schedule') ?>

    <?= $form->field($model, 'contactnum') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'remarks') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
