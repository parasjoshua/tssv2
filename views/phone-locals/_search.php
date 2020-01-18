<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PhoneLocalsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phone-locals-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'phone_id') ?>

    <?= $form->field($model, 'department') ?>

    <?= $form->field($model, 'section') ?>

    <?= $form->field($model, 'localnum') ?>

    <?= $form->field($model, 'conperson') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
