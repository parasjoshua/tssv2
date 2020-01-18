<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        if(!Yii::$app->user->isGuest){
          if(Yii::$app->user->identity->id == 100){            
            echo Html::a('Add Activity', ['create'], ['class' => 'btn btn-success']); 
          }
        }
        ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'activity_num',
            'date',
            'time',
            'details',
            [  
              'attribute' => 'department',
              'value' => 'departments.name',
            ],
            [  
              'attribute' => 'section',
              'value' => 'sections.name',
            ],
           [  
              'attribute' => 'status',
              'format' => 'raw',
              'value' => function($model, $key, $index, $grid){
                 if($model->status=='Pending'){
                   return "<label class='label label-danger' style='text-align: center;'>Pending</label>";
                 }
                 else if($model->status=='Done'){
                   return "<label class='label label-success' style='text-align: center;'>Done</label>";
                 }
              },
          ],

            [
              'class' => 'kartik\grid\ActionColumn',
              'visible' => Yii::$app->user->isGuest || Yii::$app->user->identity->id != 100 ? false:true,
              'template' => '{view}{update}{delete}',
              'options' => ['style' => 'width:220px'],
              'buttons'=>[
                  'view'=>function ($url, $model) {
                        return Html::a('<i class="glyphicon glyphicon-eye-open"></i> View', ['view', 
                          'id' => $model->activity_num], ['class' => 'btn btn-info btn-xs']);
                    },
                  'update'=>function ($url, $model) {
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i> Update', ['update', 
                          'id' => $model->activity_num], ['class' => 'btn btn-success btn-xs']);
                    },
                  'delete'=>function ($url, $model) {
                      return Html::a('<i class="glyphicon glyphicon-remove"></i> Delete', 
                        [
                          'delete', 'id' => $model->activity_num
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
