<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InventoryAvrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventory AVRs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-avr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Inventory AVR', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel'=>[
            'type'=>'info',
            'heading' => '<h3 class="panel-title"><i class="fa fa-plug"></i> AVRs</h3>',
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
            [
                'attribute' => 'inventory_computer_id',
                'value' => 'inventorycomputer.brandserial',
            ],

            'brand',
            'model',
            'serial_number',
            'inventory_number',
            'sticker_number',
            'date_of_purchased',         
            [
                'attribute' => 'accountability',
                'value' => 'employees.employee_name',
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
