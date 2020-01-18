<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PhoneLocals */

$this->title = 'Add Phone Number';
$this->params['breadcrumbs'][] = ['label' => 'CGHMC Local Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-locals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
            'departmentsList' => $departmentsList,
            'sectionsList' => $sectionsList,
    ]) ?>

</div>
