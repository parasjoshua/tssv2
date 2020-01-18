<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = 'Update Activity: '.$model->details;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->details, 'url' => ['view', 'id' => $model->activity_num]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="activity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
            'departmentsList' => $departmentsList,
            'sectionsList' => $sectionsList,
    ]) ?>

</div>
