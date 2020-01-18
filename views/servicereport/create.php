<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Servicereport */

$this->title = 'File Service Report';
if(Yii::$app->controller->action->id == 'create' && Yii::$app->user->isGuest){}
else {$this->params['breadcrumbs'][] = ['label' => 'Service Reports', 'url' => ['index']];$this->params['breadcrumbs'][] = $this->title;}
?>
<div class="servicereport-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
