<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryComputerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventory-computer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'brand') ?>

    <?= $form->field($model, 'model_description') ?>

    <?= $form->field($model, 'serial_number') ?>

    <?= $form->field($model, 'inventory_number') ?>

    <?php // echo $form->field($model, 'sticker_number') ?>

    <?php // echo $form->field($model, 'date_of_purchased') ?>

    <?php // echo $form->field($model, 'accountability') ?>

    <?php // echo $form->field($model, 'storage') ?>

    <?php // echo $form->field($model, 'ram') ?>

    <?php // echo $form->field($model, 'ip_address') ?>

    <?php // echo $form->field($model, 'usb') ?>

    <?php // echo $form->field($model, 'office_suite_version') ?>

    <?php // echo $form->field($model, 'office_suite_liscense_type') ?>

    <?php // echo $form->field($model, 'office_suite_product_key') ?>

    <?php // echo $form->field($model, 'operating_system_name_version') ?>

    <?php // echo $form->field($model, 'operating_system_license_type') ?>

    <?php // echo $form->field($model, 'operating_system_product_key') ?>

    <?php // echo $form->field($model, 'antivirus_name_version') ?>

    <?php // echo $form->field($model, 'antivirus_license_type') ?>

    <?php // echo $form->field($model, 'antivirus_product_key') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
