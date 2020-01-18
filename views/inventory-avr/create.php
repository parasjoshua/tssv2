<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InventoryAvr */

$this->title = 'Add Inventory AVR';
$this->params['breadcrumbs'][] = ['label' => 'Inventory AVRs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-avr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'employeesList' => $employeesList,
		'inventorycomputersList' => $inventorycomputersList,
    ]) ?>

</div>
