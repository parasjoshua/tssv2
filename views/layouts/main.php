<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Modal;


AppAsset::register($this);
$this->registerJs(
'$(document).on("click", ".showModalButton", function(){
            event.preventDefault();
            $("#modal").find("#modalContent").load($(this).attr("href"),function(){$("#modal").modal("show");
            });
    });
'
);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
         blink {
           color:red;
           -webkit-animation: blink 1s step-end infinite;
           animation: blink 4s step-end infinite
         }
 
          @-webkit-keyframes blink {
          67% { opacity: 0 }
         }
 
         @keyframes blink {
         67% { opacity: 0 }
        }
      </style>
</head>
<body>
<?php $this->beginBody() ?>

<?php
                    Modal::begin([
                    // 'headerOptions' => ['id' => 'modalHeader'],
                    'id' => 'modal',
                    'size' => 'modal-lg',
                    'options' =>
                        [
                            'tabindex' => 'false',
                            'data-keyboard' => 'false',
                            'data-backdrop' => 'static',
                        ],
                    ]);
                    echo "<div id='modalContent'></div>";
                    Modal::end();
                ?>

<div class="wrap">
    <?php 
    $theID = 0;
    if(empty(Yii::$app->user->identity->id)){
        $theID = 0;
    }
    else
    {
      $theID = Yii::$app->user->identity->id;
    }
    ?>

    <?php

    NavBar::begin([
        'brandLabel' => 'ICT-D ONLINE SERVICES',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-inverse navbar-fixed-top',
           
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'MENU', 'url' => ['#'], 
            'visible' => $theID != 100 ? false:true,
            'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
            'items' => [
                ['label' => 'Service Requests', 'url' => ['/servicereport/index']],
                ['label' => 'Wifi Accounts', 'url' => ['/wifi-accounts/index']],
                ['label' => 'Inventory', 'url' => ['/inventory-computer/index'],
            'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
            'items' => [
                ['label' => 'AVR', 'url' => ['/inventory-avr/index']],
                ['label' => 'Monitor', 'url' => ['/inventory-monitor/index']],
                ['label' => 'Printer', 'url' => ['/inventory-printer/index']],
                ['label' => 'Assignment', 'url' => ['/inventory-assignment/index']],
            ],],
                ['label' => 'Phone Directory', 'url' => ['/phone-locals/index']],
                ['label' => 'Activities', 'url' => ['/activity/index']],
                ['label' => 'Calls Report', 'url' => ['/calls-report/index']],
                ['label' => 'Verse of the day', 'url' => ['/verse-of-the-day/index']],
                ['label' => 'Employee List', 'url' => ['/employee/index']],
            ],],
            ['label' => 'CGHMC Announcement', 'url' => ['/qmt-announcement'], 'visible' =>  $theID != 101 ? false:true],
            ['label' => 'Doctors', 'url' => ['/doctors'], 'visible' =>  $theID != 102 ? false:true],
            ['label' => 'SERVICES', 'url' => ['/site#ourservices']],
            ['label' => 'CONTACT', 'url' => ['/site#contactUs']],
            ['label' => 'TUTORIALS', 'url' => ['/site#tutorials']],
            ['label' => 'WORKS', 'url' => ['/site#works']],
            ['label' => 'ABOUT', 'url' => ['/site#about']],
   
   
            Yii::$app->user->isGuest ? (
                ['label' => 'LOGIN', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )

        ],

    ]);


    NavBar::end();


    ?>

    <div style="padding-top:50px"> 
        <div class="col-lg-12">
            <div class="container col-lg-12">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
                
        <br>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
  <div id="copyright" class="clear"> 
    <div class="container pull-left">
        <p>Copyright &copy; 2018- All Rights Reserved - <a href="#top">CGHMC iCT-Department</a></p>
    </div>
  </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
