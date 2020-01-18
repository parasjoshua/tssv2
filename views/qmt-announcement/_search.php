<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QmtAnnouncementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qmt-announcement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_qmt') ?>

    <?= $form->field($model, 'announcement') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'updatedby') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
