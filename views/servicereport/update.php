<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Servicereport */

$this->title = 'Update Service Report: '.$model->problem;
$this->params['breadcrumbs'][] = ['label' => 'Service Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->problem, 'url' => ['view', 'id' => $model->servicereportnum]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicereport-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
