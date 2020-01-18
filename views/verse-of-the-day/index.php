<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VerseOfTheDaySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Verse Of The Day';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verse-of-the-day-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Verse Of The Day', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'id_votd',
            'bible_verse',
            'bible_verse_desc',
            'totd',
            'date',

            [
              'class' => 'kartik\grid\ActionColumn',
              'template' => '{view}{update}{delete}',
              'options' => ['style' => 'width:200px'],
              'buttons'=>[
                  'view'=>function ($url, $model) {
                        return Html::a('<i class="glyphicon glyphicon-eye-open"></i> View', ['view', 
                          'id' => $model->id_votd], ['class' => 'btn btn-info btn-xs']);
                    },
                  'update'=>function ($url, $model) {
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i> Update', ['update', 
                          'id' => $model->id_votd], ['class' => 'btn btn-success btn-xs']);
                    },
                  'delete'=>function ($url, $model) {
                      return Html::a('<i class="glyphicon glyphicon-remove"></i> Delete', 
                        [
                          'delete', 'id' => $model->id_votd
                        ], 
                        [
                          'class' => 'btn btn-danger btn-xs',
                          'data' => [
                              'confirm' => 'Are you sure you want to delete?',
                              'method' => 'post']
                        ]);
                  }
              ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
