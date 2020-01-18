<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicereportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicereport-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'servicereportnum') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'payroll_num') ?>

    <?= $form->field($model, 'department') ?>

    <?= $form->field($model, 'section') ?>

    <?php // echo $form->field($model, 'datereceived') ?>

    <?php // echo $form->field($model, 'datecomplete') ?>

    <?php // echo  $form->field($model, 'timereceived') ?>

    <?php // echo $form->field($model, 'timecomplete') ?>

    <?php // echo $form->field($model, 'typeofservice') ?>

    <?php // echo $form->field($model, 'problem') ?>

    <?php // echo $form->field($model, 'actiontaken') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'signatureofuser') ?>

    <?php // echo $form->field($model, 'tssrepresentative') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
