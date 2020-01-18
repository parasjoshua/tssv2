<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CallsReportSearcg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calls-report-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type_of_report') ?>

    <?= $form->field($model, 'department_id') ?>

    <?= $form->field($model, 'section_id') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'concern') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'admission_number') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
