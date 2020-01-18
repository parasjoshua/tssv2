<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PhoneLocalsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doctors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctors-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php  
        if(!Yii::$app->user->isGuest){
          if(Yii::$app->user->identity->id == 102){
            echo Html::a('Add Doctors', ['create'], ['class' => 'btn btn-success']) ;
          }
        }  

        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'id',
            'lastname',
            'firstname',
            'midname',
            'chinesename',
            'room',
            'localnum',
            'department',
            'specialization',
            'schedule',
            // 'contactnum',
            [
                'format' => 'raw',
                'attribute' => 'status',
                'value' => function($model){
                    return $model->status == 1 ? '<span class="label label-danger">Inactive</span>' : '<span class="label label-success">Active</span>';
                }
            ],
            'remarks',

            [
              'class' => 'kartik\grid\ActionColumn',
              'visible' => Yii::$app->user->isGuest || Yii::$app->user->identity->id != 102 ? false:true,
              'template' => '{view}{update}{delete}',
              'options' => ['style' => 'width:200px'],
              'buttons'=>[
                  'view'=>function ($url, $model) {
                        return Html::a('<i class="glyphicon glyphicon-eye-open"></i> View', ['view', 
                          'id' => $model->id], ['class' => 'btn btn-info btn-xs']);
                    },
                  'update'=>function ($url, $model) {
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i> Update', ['update', 
                          'id' => $model->id], ['class' => 'btn btn-success btn-xs']);
                    },
                  'delete'=>function ($url, $model) {
                      return Html::a('<i class="glyphicon glyphicon-remove"></i> Delete', 
                        [
                          'delete', 'id' => $model->id
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



