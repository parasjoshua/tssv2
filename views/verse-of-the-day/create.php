<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VerseOfTheDay */

$this->title = 'Create Verse Of The Day';
$this->params['breadcrumbs'][] = ['label' => 'Verse Of The Days', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verse-of-the-day-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
