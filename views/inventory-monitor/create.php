<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InventoryMonitor */

$this->title = 'Add Inventory Monitor';
$this->params['breadcrumbs'][] = ['label' => 'Inventory Monitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-monitor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'employeesList' => $employeesList,
        'inventorycomputersList' => $inventorycomputersList,
    ]) ?>

</div>
