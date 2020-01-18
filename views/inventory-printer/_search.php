<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryPrinterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventory-printer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'brand') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'serial_number') ?>

    <?= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'loan') ?>

    <?php // echo $form->field($model, 'inventory_number') ?>

    <?php // echo $form->field($model, 'date_of_purchased') ?>

    <?php // echo $form->field($model, 'accountability') ?>

    <?php // echo $form->field($model, 'inventory_computer_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
