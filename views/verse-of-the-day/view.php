<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VerseOfTheDay */

$this->title = $model->bible_verse;
$this->params['breadcrumbs'][] = ['label' => 'Verse Of The Days', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verse-of-the-day-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_votd], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_votd], [
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
            // 'id_votd',
            'bible_verse',
            'bible_verse_desc',
            'totd',
            'date',
        ],
    ]) ?>

</div>
