<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CallsReport */

$this->title = $model->type_of_report.' - '.$model->concern;
$this->params['breadcrumbs'][] = ['label' => 'Call Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calls-report-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'type_of_report',
            'departments.name',
            'sections.name',
            'status',
            'concern',
            'employees.employee_name',
            'admission_number',
        ],
    ]) ?>

</div>
