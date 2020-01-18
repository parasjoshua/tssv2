<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryAvr */

$this->title = 'Update Inventory AVR: '.$model->brand.' - '.$model->serial_number;
$this->params['breadcrumbs'][] = ['label' => 'Inventory AVRs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->brand.' - '.$model->serial_number, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventory-avr-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'employeesList' => $employeesList,
		'inventorycomputersList' => $inventorycomputersList,
    ]) ?>

</div>
