<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Servicereport */

$this->title = $model->problem;
$this->params['breadcrumbs'][] = ['label' => 'Service Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicereport-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->servicereportnum], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->servicereportnum], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <h4><strong>Service Details</strong></h4>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'servicereportnum',
            'name',
            'payroll_num',
            'department',
            'section',
            'datereceived',
            'datecomplete',
            'timereceived',
            'timecomplete',
            'typeofservice',
            'problem',
            'actiontaken',
            'remarks',
            'status',
            // 'signatureofuser',
            'tssrepresentative',
        ],
    ]) ?>
    <h4><strong>Installation Report</strong></h4>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'servicereportnum',
            'installation_report',
            'quantity',
            'installation_report_status',
            'description',
            'tag_number_serial_number',
        ],
    ]) ?>

</div>
