<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryAssignment */

$this->title = 'Update Inventory Assignment: '.$model->building.', '.$model->floor;
$this->params['breadcrumbs'][] = ['label' => 'Inventory Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->building.', '.$model->floor, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventory-assignment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'departmentsList' => $departmentsList,
        'sectionsList' => $sectionsList,
		'inventorycomputersList' => $inventorycomputersList,
    ]) ?>

</div>
