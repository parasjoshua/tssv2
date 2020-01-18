<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CallsReport */

$this->title = 'Update Call Report: '.$model->type_of_report.' - '.$model->concern;
$this->params['breadcrumbs'][] = ['label' => 'Call Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->type_of_report.' - '.$model->concern, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="calls-report-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'departmentsList' => $departmentsList,
        'sectionsList' => $sectionsList,
        'employeesList' => $employeesList,
    ]) ?>

</div>
