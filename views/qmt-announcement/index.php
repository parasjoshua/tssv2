<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\QmtAnnouncementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'CGHMC Announcements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qmt-announcement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Announcement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'id_qmt',
            'announcement',
            'date',
            // 'updatedby',
            [
              'class' => 'kartik\grid\ActionColumn',
              'visible' => Yii::$app->user->isGuest ? false:true,
              'template' => '{view}{update}',
              'options' => ['style' => 'width:160px'],
              'buttons'=>[
                  'view'=>function ($url, $model) {
                        return Html::a('<i class="glyphicon glyphicon-eye-open"></i> View', ['view', 
                          'id' => $model->id_qmt], ['class' => 'btn btn-info btn-xs']);
                    },
                  'update'=>function ($url, $model) {
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i> Update', ['update', 
                          'id' => $model->id_qmt], ['class' => 'btn btn-success btn-xs']);
                    },
                  // 'delete'=>function ($url, $model) {
                  //     return Html::a('<i class="glyphicon glyphicon-remove"></i> Delete', 
                  //       [
                  //         'delete', 'id' => $model->id_qmt
                  //       ], 
                  //       [
                  //         'class' => 'btn btn-danger btn-xs',
                  //         'data' => [
                  //             'confirm' => 'Are you sure you want to delete?',
                  //             'method' => 'post']
                  //       ]);
                  // }
              ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
<script type="text/javascript">
  window.onload = setupRefresh;

  function setupRefresh(){
    setTimeout("refreshPage();", 10000);
  }
  function refreshPage(){
    window.location = location.href;
  }
</script>