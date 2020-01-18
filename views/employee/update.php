<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */

$this->title = 'Update Employee: '. $model->payroll_number.' - '.$model->employee_name;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>  $model->payroll_number.' - '.$model->employee_name, 'url' => ['view', 'id' => $model->employee_count]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'departmentsList' => $departmentsList,
        'sectionsList' => $sectionsList,
    ]) ?>

</div>
