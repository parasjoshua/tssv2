
<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InventoryAssignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventory Assignments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-assignment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Inventory Assignment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel'=>[
            'type'=>'info',
            'heading' => '<h3 class="panel-title"><i class="fa fa-address-book"></i> Computer Assignments</h3>',
        ],
        'export'=>[
            'fontAwesome'=>true,
            'showConfirmAlert'=>false,
            'target'=>GridView::TARGET_BLANK
        ],
        'exportConfig' => [
                GridView::EXCEL => [ 'label' => 'Export to Excel File']
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'id',
            'building',
            'floor',
            [
                'attribute' => 'inventory_computer_id',
                'value' => 'inventorycomputer.brandserial',
            ],
            [
                'attribute' => 'department',
                'value' => 'departments.name',
            ],
            [
                'attribute' => 'section',
                'value' => 'sections.name',
            ],
       
            [
              'class' => 'kartik\grid\ActionColumn',
              'visible' => Yii::$app->user->isGuest ? false:true,
              'template' => '{view}{update}{delete}',
              'options' => ['style' => 'width:220px'],
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
