<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InventoryPrinter */

$this->title = 'Add Inventory Printer';
$this->params['breadcrumbs'][] = ['label' => 'Inventory Printers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-printer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'employeesList' => $employeesList,
        'inventorycomputersList' => $inventorycomputersList,
    ]) ?>

</div>
