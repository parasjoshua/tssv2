<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CallsReport */

$this->title = 'Create Report';
$this->params['breadcrumbs'][] = ['label' => 'Call Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calls-report-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'departmentsList' => $departmentsList,
        'sectionsList' => $sectionsList,
        'employeesList' => $employeesList,
    ]) ?>

</div>
