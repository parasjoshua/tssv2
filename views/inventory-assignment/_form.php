<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\time\TimePicker;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventory-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'building')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'floor')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'inventory_computer_id')->widget(Select2::classname(), [
            'data' => $inventorycomputersList,
            'language' => 'en',
            'options' => ['placeholder' => 'Select Computer'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>

    <?= $form->field($model, 'department')->widget(Select2::classname(), [
            'data' => $departmentsList,
            'language' => 'en',
            'options' => ['placeholder' => 'Select Department'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>

    <?= $form->field($model, 'section')->widget(Select2::classname(), [
            'data' => $sectionsList,
            'language' => 'en',
            'options' => ['placeholder' => 'Select Section'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
