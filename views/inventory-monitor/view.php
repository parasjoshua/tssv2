<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryMonitor */

$this->title = $model->brand.' - '.$model->serial_number;
$this->params['breadcrumbs'][] = ['label' => 'Inventory Monitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-monitor-view">

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
            'brand',
            'model',
            'description',
            'serial_number',
            'inventory_number',
            'date_of_purchased',
            'employees.employee_name',
            'inventorycomputer.brandserial',
        ],
    ]) ?>

</div>
