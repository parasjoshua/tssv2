<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QmtAnnouncement */

$this->title = 'Update Announcement: '.$model->announcement;
$this->params['breadcrumbs'][] = ['label' => 'Qmt Announcements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->announcement, 'url' => ['view', 'id' => $model->id_qmt]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="qmt-announcement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
