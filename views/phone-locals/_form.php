<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\PhoneLocals */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phone-locals-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <?= $form->field($model, 'localnum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conperson')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
