<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\time\TimePicker;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'date')->widget(
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

    <?= $form->field($model, 'time')->widget(TimePicker::classname(), []); ?>   

    <?= $form->field($model, 'details')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'status')->dropDownList([ 'Pending' => 'Pending', 'Done' => 'Done', ], ['prompt' => 'Select Status']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
