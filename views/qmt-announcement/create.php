<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QmtAnnouncement */

$this->title = 'Add Announcement';
$this->params['breadcrumbs'][] = ['label' => 'QMT Announcements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qmt-announcement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
