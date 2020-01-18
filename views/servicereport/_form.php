<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Servicereport */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="servicereport-form">
<div class="row">

    <?php $form = ActiveForm::begin(); ?>

    <?php if(Yii::$app->controller->action->id == 'create' && Yii::$app->user->isGuest){ ?>
    <div class="col-lg-6">
    <?= $form->field($model, 'payroll_num')->textInput() ?>
    </div>
    <div class="col-lg-6">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'readOnly' => true]) ?>
    </div>
    <div class="col-lg-12">
    <?= $form->field($model, 'department')->textInput(['maxlength' => true, 'readOnly' => true]) ?>
    </div>
    <div class="col-lg-12">
    <?= $form->field($model, 'section')->textInput(['maxlength' => true, 'readOnly' => true]) ?>
    </div>
    <div class="col-lg-12">
    <?= $form->field($model, 'typeofservice')->dropDownList([ 'Service' => 'Service Report', 'Installation' => 'Installation Report'], ['prompt' => 'Select Type']) ?>
    </div>
    <div class="col-lg-12">
    <?= $form->field($model, 'problem')->textArea(['row' => 2]) ?>
    </div>
    <div class="col-lg-12">
    <?= $form->field($model, 'installation_descrip')->textArea(['row' => 2]) ?>
    </div>
    
    <?php } else {?>

    <div class="col-lg-6">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'disabled' => true]) ?>
    </div>
    <div class="col-lg-6">

    <?= $form->field($model, 'payroll_num')->textInput(['maxlength' => true, 'disabled' => true]) ?>
    </div>
    <div class="col-lg-6">

    <?= $form->field($model, 'department')->textInput(['maxlength' => true, 'disabled' => true]) ?>
    </div>
    <div class="col-lg-6">

    <?= $form->field($model, 'section')->textInput(['maxlength' => true, 'disabled' => true]) ?>
    </div>
    <div class="col-lg-6">

    <?= $form->field($model, 'typeofservice')->textInput(['maxlength' => true, 'disabled' => true]) ?>
    </div>

    <div class="col-lg-6">
    <?= $form->field($model, 'problem')->textInput() ?>
    </div>

    <div class="col-lg-6">
    <?= $form->field($model, 'installation_descrip')->textInput() ?>
    </div>

    <div class="col-lg-6">
    <?= $form->field($model, 'status')->dropDownList([ 'Pending' => 'Pending', 'Done' => 'Done', ], ['prompt' => 'Select Status']) ?>
    </div>

    <div class="col-lg-6">
    <?= $form->field($model, 'tssrepresentative')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-12">
    <?= $form->field($model, 'actiontaken')->textInput() ?>
    </div>

    <div class="col-lg-12">
    <?= $form->field($model, 'remarks')->textInput() ?>
    </div>

    <div class="col-lg-12">
        <div class="panel panel-info">
              <div class="panel-heading">
                <i class="fa fa-report"></i> <strong> Installation Report</strong></div>
              <div class="panel-body">
                <div class="col-lg-2">
                    <?= $form->field($model, 'installation_report')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-2">
                    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-2">
                    <?= $form->field($model, 'installation_report_status')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-2">
                    <?= $form->field($model, 'tag_number_serial_number')->textInput(['maxlength' => true]) ?>
                </div>
              </div>
        </div>
    </div>

    <?php }?>

    <div class="col-lg-6">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        
    </div>

<?php
$storeuseidurl = \yii\helpers\Url::to(['servicereport/getdata']);
$storeuseidurldept = \yii\helpers\Url::to(['servicereport/getdatadept']);
$storeuseidurlsec = \yii\helpers\Url::to(['servicereport/getdatasec']);
$this->registerJs(' 
    $("#servicereport-payroll_num").keyup(function(){
    var value = $("#servicereport-payroll_num").val();

    $.ajax({
        url: "'.$storeuseidurl.'",
        data: { value:value}
        
    }).done(function(result) {
         $( "#servicereport-name").val(result.employee_name);
    });

    $.ajax({
        url: "'.$storeuseidurldept.'",
        data: { value:value}
        
    }).done(function(result) {
         $( "#servicereport-department").val(result.name);
    });

    $.ajax({
        url: "'.$storeuseidurlsec.'",
        data: { value:value}
        
    }).done(function(result) {
         $( "#servicereport-section").val(result.name);
    });

     });
');

?>

    <?php ActiveForm::end(); ?>
</div>
</div>
