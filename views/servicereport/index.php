<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url; 
/* @var $this yii\web\View */
/* @var $searchModel app\models\ServicereportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Service Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicereport-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if(Yii::$app->user->isGuest){ ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'servicereportnum',
            // 'payroll_num',
            'name',
            'department',
            'section',
            // 'datereceived',
            //'datecomplete',
            //'timereceived',
            //'timecomplete',
            'typeofservice',
            'problem',
            //'actiontaken',
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
            //'signatureofuser',
            //'tssrepresentative',
        ],
    ]); ?>
    <?php }else{ ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'pjaxSettings'=>[
        'neverTimeout'=>true,
        'refreshGrid' => true,
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'servicereportnum',
            'payroll_num',
            'name',
            'department',
            'section',
            'datereceived',
            //'datecomplete',
            'timereceived',
            //'timecomplete',
            'typeofservice',
            'problem',
            //'actiontaken',
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
            //'signatureofuser',
            //'tssrepresentative',

            [
              'class' => 'kartik\grid\ActionColumn',
              'template' => '{view}{update}{print}',
              'options' => ['style' => 'width:220px'],
              'buttons'=>[
                  'print'=>function ($url, $model) {
                      $t = '@web/servicereport/servicerequest?id='. $model->servicereportnum;
                      return  Html::a('<i class="glyphicon glyphicon-print"></i> Print', Url::to($t, true),['class' => 'btn-xs btn btn-primary','target' => '_blank']);
                  },
                  'view'=>function ($url, $model) {
                        return Html::a('<i class="glyphicon glyphicon-eye-open"></i> View', ['view',
                          'id' => $model->servicereportnum], ['class' => 'btn btn-info btn-xs']);
                    },
                  'update'=>function ($url, $model) {
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i> Update', ['update', 
                          'id' => $model->servicereportnum], ['class' => 'btn btn-success btn-xs']);
                    },
              ],
            ],
        ],
    ]); ?>
    <?php } ?>
</div>
