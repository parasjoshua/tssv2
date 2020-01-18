<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VerseOfTheDay */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="verse-of-the-day-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bible_verse')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bible_verse_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'totd')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
