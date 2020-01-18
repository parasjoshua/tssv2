<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'payroll_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_name')->textInput(['maxlength' => true]) ?>

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
