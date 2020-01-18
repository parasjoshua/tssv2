<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WifiAccounts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wifi-accounts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
    if(Yii::$app->user->isGuest){
    ?>
	<?= $form->field($model, 'payroll_num')->textInput() ?>

	<span type="submit" id="searchData" class="btn btn-success" style="width: 100%;" > Search</span>
	<br><br>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'readOnly' => true]) ?>

    <?= $form->field($model, 'department')->textInput(['readOnly' => true]) ?>

    <?= $form->field($model, 'section')->textInput(['readOnly' => true]) ?>

    <?php }?>

    <?= $form->field($model, 'admission_number')->textInput(['maxlength' => true, 'disabled' => Yii::$app->user->isGuest ? true:false]) ?>
    <?php 
    if(Yii::$app->user->isGuest){
    ?>
	<span type="submit" id="searchWifiPassword" class="btn btn-success" style="width: 100%;margin-bottom: 10px" > Search Password</span>
	<?php }?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true, 'disabled' => Yii::$app->user->isGuest ? true:false]) ?>
    <?php 
    if(!Yii::$app->user->isGuest){
    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php }?>

<?php
$storeuseidurl = \yii\helpers\Url::to(['servicereport/getdata']);
$storeuseidurldept = \yii\helpers\Url::to(['servicereport/getdatadept']);
$storeuseidurlsec = \yii\helpers\Url::to(['servicereport/getdatasec']);
$storeuseidurlwifi = \yii\helpers\Url::to(['servicereport/getdatawifi']);
$storeuseidurlwifilogs = \yii\helpers\Url::to(['servicereport/savelogs']);
$this->registerJs(' 
	$(document).ready(function(){
		$("#searchWifiPassword").hide();
	});

	$("#searchWifiPassword").click(function(){
    var value = $("#wifiaccounts-admission_number").val();
    
    var payroll_number = $("#wifiaccounts-payroll_num").val();
    var employee_name = $("#wifiaccounts-name").val();
    var department = $("#wifiaccounts-department").val();
    var section = $("#wifiaccounts-section").val();
    var admission_number = $("#wifiaccounts-admission_number").val();

    $.ajax({
        url: "'.$storeuseidurlwifi.'",
        data: { value:value}
        
    }).done(function(result) {
         $( "#wifiaccounts-password").val(result.password);
         if($("#wifiaccounts-password").val() == "")
	     {
	     	alert("No Data Found");
	     }
    });

    $.ajax({
        url: "'.$storeuseidurlwifilogs.'",
        data: { payroll_number:payroll_number,
        	employee_name:employee_name,
        	department:department,
        	section:section,
        	admission_number:admission_number}
        
    }).done(function(result) {
    });
    
	});

	$("#wifiaccounts-admission_number").keyup(function(){
		$("#wifiaccounts-password").val("");
	});

	$("#wifiaccounts-payroll_num").keyup(function(){
		$("#wifiaccounts-name").val("");
		$("#wifiaccounts-department").val("");
		$("#wifiaccounts-section").val("");
		$("#searchWifiPassword").hide();
	    $("#wifiaccounts-admission_number").attr("disabled", true);
	    $("#wifiaccounts-admission_number").val("");
		$("#wifiaccounts-password").val("");
	});

    $("#searchData").click(function(){
    var value = $("#wifiaccounts-payroll_num").val();


    $.ajax({
        url: "'.$storeuseidurl.'",
        data: { value:value}
        
    }).done(function(result) {
         $( "#wifiaccounts-name").val(result.employee_name);
	     if($("#wifiaccounts-name").val() == "" && $("#wifiaccounts-department").val() == "" && $("#wifiaccounts-section").val() == "")
	     {
	     	alert("No Data Found");
	     	$("#wifiaccounts-admission_number").attr("disabled", true);
	     }
	     else
	     {
	     	$("#wifiaccounts-admission_number").attr("disabled", false);
	     	$("#searchWifiPassword").show();
	     }	
    });

    $.ajax({
        url: "'.$storeuseidurldept.'",
        data: { value:value}
        
    }).done(function(result) {
         $( "#wifiaccounts-department").val(result.name);
    });

    $.ajax({
        url: "'.$storeuseidurlsec.'",
        data: { value:value}
        
    }).done(function(result) {
         $( "#wifiaccounts-section").val(result.name);
    });

     });
');
?>
    <?php ActiveForm::end(); ?>

</div>
