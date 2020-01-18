<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VerseOfTheDaySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="verse-of-the-day-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_votd') ?>

    <?= $form->field($model, 'bible_verse') ?>

    <?= $form->field($model, 'bible_verse_desc') ?>

    <?= $form->field($model, 'totd') ?>

    <?= $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
