<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\time\TimePicker;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryMonitor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventory-monitor-form">

    <?php $form = ActiveForm::begin(); ?>
        
    <?= $form->field($model, 'accountability')->widget(Select2::classname(), [
            'data' => $employeesList,
            'language' => 'en',
            'options' => ['placeholder' => 'Select Employee'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>
    <?= $form->field($model, 'inventory_computer_id')->widget(Select2::classname(), [
            'data' => $inventorycomputersList,
            'language' => 'en',
            'options' => ['placeholder' => 'Select Computer'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inventory_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_purchased')->widget(
        DatePicker::className(), [
            'name' => 'date', 
            'value' => date('d-M-Y'),
            'type' => DatePicker::TYPE_COMPONENT_APPEND,
            'options' => ['placeholder' => 'Select Date'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'autoclose'=>true,
            ]
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
