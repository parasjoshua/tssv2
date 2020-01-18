<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryComputer */

$this->title = $model->brand;
$this->params['breadcrumbs'][] = ['label' => 'Inventory Computers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-computer-view">

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
            'model_description',
            'serial_number',
            'inventory_number',
            'sticker_number',
            'date_of_purchased',
            'employees.employee_name',
            'storage',
            'ram',
            'ip_address',
            'usb',
            'office_suite_version',
            'office_suite_liscense_type',
            'office_suite_product_key',
            'operating_system_name_version',
            'operating_system_license_type',
            'operating_system_product_key',
            'antivirus_name_version',
            'antivirus_license_type',
            'antivirus_product_key',
        ],
    ]) ?>

</div>
