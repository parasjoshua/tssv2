<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PhoneLocals */

$this->title = $model->section=="" ? $model->departments->name.''."":$model->departments->name.' - '.$model->sections->name;
$this->params['breadcrumbs'][] = ['label' => 'CGHMC Local Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-locals-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->phone_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->phone_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'phone_id',
            'departments.name',
            'sections.name',
            'localnum',
            'conperson',
        ],
    ]) ?>

</div>
