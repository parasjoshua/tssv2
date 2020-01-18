<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InventoryAssignment */

$this->title = 'Add Inventory Assignment';
$this->params['breadcrumbs'][] = ['label' => 'Inventory Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-assignment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'inventorycomputersList' => $inventorycomputersList,
        'departmentsList' => $departmentsList,
        'sectionsList' => $sectionsList,
    ]) ?>

</div>
