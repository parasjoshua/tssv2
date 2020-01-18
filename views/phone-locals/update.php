<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PhoneLocals */

$this->title = $model->section=="" ? $model->departments->name.''."":$model->departments->name.' - '.$model->sections->name;
$this->params['breadcrumbs'][] = ['label' => 'CGHMC Local Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->section=="" ? $model->departments->name.''."":$model->departments->name.' - '.$model->sections->name, 'url' => ['view', 'id' => $model->phone_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phone-locals-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
            'departmentsList' => $departmentsList,
            'sectionsList' => $sectionsList,
    ]) ?>

</div>
