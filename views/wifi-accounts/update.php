<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WifiAccounts */

$this->title = 'Update Wifi Accounts: '.'Admission Number: '.$model->admission_number;
$this->params['breadcrumbs'][] = ['label' => 'Wifi Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Admission Number: '.$model->admission_number, 'url' => ['view', 'id' => $model->admission_number]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wifi-accounts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
