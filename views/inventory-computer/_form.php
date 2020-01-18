<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\time\TimePicker;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryComputer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventory-computer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inventory_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sticker_number')->textInput(['maxlength' => true]) ?>

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
        
    <?= $form->field($model, 'accountability')->widget(Select2::classname(), [
            'data' => $employeesList,
            'language' => 'en',
            'options' => ['placeholder' => 'Select Employee'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>

    <?= $form->field($model, 'storage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usb')->dropDownList([ 'Enable' => 'Enable', 'Disable' => 'Disable', ], ['prompt' => 'Select']) ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                  <div class="panel-heading">
                    <i class="fa fa-laptop"></i> <strong> Office Software</strong></div>
                  <div class="panel-body">
                    <div class="col-lg-4">
                        <?= $form->field($model, 'office_suite_version')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'office_suite_liscense_type')->dropDownList([ 'Licensed' => 'Licensed','Free (Not Licensed)' => 'Free (Not Licensed)', ], ['prompt' => 'Select']) ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'office_suite_product_key')->textInput(['maxlength' => true]) ?>
                    </div>
                  </div>
            </div>   
        </div>     
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-warning">
                  <div class="panel-heading">
                    <i class="fa fa-cogs"></i> <strong> Operating System</strong></div>
                  <div class="panel-body">
                    <div class="col-lg-4">
                        <?= $form->field($model, 'operating_system_name_version')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'operating_system_license_type')->dropDownList([ 'Licensed' => 'Licensed','Free (Not Licensed)' => 'Free (Not Licensed)', ], ['prompt' => 'Select']) ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'operating_system_product_key')->textInput(['maxlength' => true]) ?>
                    </div>
                  </div>
            </div>   
        </div>     
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-danger">
                  <div class="panel-heading">
                    <i class="fa fa-bug"></i> <strong> Antivirus</strong></div>
                  <div class="panel-body">
                    <div class="col-lg-4">
                        <?= $form->field($model, 'antivirus_name_version')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'antivirus_license_type')->dropDownList([ 'Licensed' => 'Licensed','Free (Not Licensed)' => 'Free (Not Licensed)', ], ['prompt' => 'Select']) ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'antivirus_product_key')->textInput(['maxlength' => true]) ?>
                    </div>
                  </div>
            </div>   
        </div>     
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
