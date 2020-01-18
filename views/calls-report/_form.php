<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\CallsReport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calls-report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_of_report')->dropDownList([ 'Hardware' => 'Hardware', 'Software' => 'Software', 'WiFi' => 'WiFi', 'Other' => 'Other', ], ['prompt' => 'Select Type of Report']) ?>

    <?= $form->field($model, 'department_id')->widget(Select2::classname(), [
            'data' => $departmentsList,
            'language' => 'de',
            'options' => ['placeholder' => 'Select Department'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>

    <?= $form->field($model, 'section_id')->widget(Select2::classname(), [
            'data' => $sectionsList,
            'language' => 'en',
            'options' => ['placeholder' => 'Select Section'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>
        
    <?= $form->field($model, 'name')->widget(Select2::classname(), [
            'data' => $employeesList,
            'language' => 'en',
            'options' => ['placeholder' => 'Select Employee'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Pending' => 'Pending', 'Done' => 'Done', ], ['prompt' => 'Select Status']) ?>

    <?= $form->field($model, 'concern')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admission_number')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
