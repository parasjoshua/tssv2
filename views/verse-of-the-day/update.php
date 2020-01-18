<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VerseOfTheDay */

$this->title = 'Update: '.$model->bible_verse;
$this->params['breadcrumbs'][] = ['label' => 'Verse Of The Days', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bible_verse, 'url' => ['view', 'id' => $model->id_votd]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="verse-of-the-day-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
