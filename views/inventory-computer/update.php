<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryComputer */

$this->title = 'Update Inventory Computer: '.$model->brand;
$this->params['breadcrumbs'][] = ['label' => 'Inventory Computers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->brand, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventory-computer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'employeesList' => $employeesList,
    ]) ?>

</div>
