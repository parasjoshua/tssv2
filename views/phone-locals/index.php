<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PhoneLocalsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'CGHMC Local Numbers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-locals-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php  
        if(!Yii::$app->user->isGuest){
          if(Yii::$app->user->identity->id == 100){
            echo Html::a('Add Phone Number', ['create'], ['class' => 'btn btn-success']) ;
          }
        }  

        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'phone_id',
            [
                'attribute' => 'department',
                'value' => 'departments.name'
            ],
            [
                'attribute' => 'section',
                'value' => 'sections.name'
            ],
            'localnum',
            'conperson',
            [
              'class' => 'kartik\grid\ActionColumn',
              'visible' => Yii::$app->user->isGuest || Yii::$app->user->identity->id != 100 ? false:true,
              'template' => '{view}{update}{delete}',
              'options' => ['style' => 'width:200px'],
              'buttons'=>[
                  'view'=>function ($url, $model) {
                        return Html::a('<i class="glyphicon glyphicon-eye-open"></i> View', ['view', 
                          'id' => $model->phone_id], ['class' => 'btn btn-info btn-xs']);
                    },
                  'update'=>function ($url, $model) {
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i> Update', ['update', 
                          'id' => $model->phone_id], ['class' => 'btn btn-success btn-xs']);
                    },
                  'delete'=>function ($url, $model) {
                      return Html::a('<i class="glyphicon glyphicon-remove"></i> Delete', 
                        [
                          'delete', 'id' => $model->phone_id
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
