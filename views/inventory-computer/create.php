<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InventoryComputer */

$this->title = 'Add Inventory Computer';
$this->params['breadcrumbs'][] = ['label' => 'Inventory Computers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-computer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
            'employeesList' => $employeesList,
    ]) ?>

</div>
