 





       <?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Carousel;

/* @var $this yii\web\View */

$this->title = 'ICTD ONLINE';
$this->registerJs('
    $(".aaaa").click(function(){
        window.location.href = "'. \Yii::$app->urlManager->createUrl(['site#tutorials']).'";
    });
    $("#opdphilhealth").click(function(){
        $("#videojs-w1_html5_api").attr("src", "video/vidfinal.mp4");
    });
    $("#blackhat").click(function(){
        $("#videojs-w1_html5_api").attr("src", "video/nationalanthem.mp4");
    });
    
');


    

?>

<style type="text/css">
    .aaaa{
        background-color: Transparent;
        background-repeat: no-repeat;
        border: none;
        cursor: pointer;
        overflow: hidden;
        outline: none;
    }
    .aaaa:hover{
        color: #337ab7;
    }

    .aaaal{
        background-color: Transparent;
        background-repeat: no-repeat;
        border: none;
        cursor: pointe r;
        overflow: hidden;
        outline: none;
    }
    .aaaal:hover{
        color: #337ab7;
    }
</style>
<br>
<?php

    echo Carousel::widget([
        'items' => [
            [
                'content' =>  Html::a(Html::img('@web/img/demo/slides/team1.PNG')),
                // 'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
                'class' => 'img-responsive',
            ],
            [
                'content' =>  Html::a(Html::img('@web/img/demo/slides/team1.PNG')),
                // 'caption' =>
                'class' => 'img-responsive',
            ],
        ],
    ]);
?>
<br>

<div class="site-index">

<div class="body-content">

<!-- 1st row options -->
<center>

<div class="nabvar panel-warning navbar-fixed-bottom">
<?php 
echo '<div class="panel-heading">
        <h1><strong><blink>"'.$qmt_announcement->announcement.'"</blink></strong></h1></div>';
?>

</div>


</center>
<br>

<div class="panel panel-primary" id="ourservices"> 
  <div class="panel-heading"><h4><center><i class="fa fa-tasks"></i> Our Services</center></h4></div>
  <div class="panel-body"><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-1" style="margin-left: -5px;"></div>
                    
                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/wifia.png', 
                                [
                                    'alt' => 'Wifi','style' => 'width:60%;'
                                ]), 
                                '@web/wifi-accounts/create',['class' => 'showModalButton']); 
                            ?>
                            <br><br>
                            <strong>WI-FI ACCOUNTS</strong>
                            <br>
                            Doctors and Patients
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/tuser.png', 
                                [
                                    'alt' => 'Web Mail','style' => 'width:60%;'
                                ]), 
                                'http://cghmc.com.ph/helpdesk/index.php', ['target'=>'_blank']); 
                            ?>                   
                            <br><br>
                            <strong>Ticketing System(for USER)</strong>
                            <br>
                            Support and Request
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/tadmin.png', 
                                [
                                    'alt' => 'Web Mail','style' => 'width:60%;'
                                ]), 
                                'http://cghmc.com.ph/helpdesk/scp/login.php', ['target'=>'_blank']); 
                            ?>                   
                            <br><br>
                            <strong>Ticketing System(for ADMIN)</strong>
                            <br>
                            ADMIN ACCESS
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/phones.png', 
                                [
                                    'alt' => 'Phones','style' => 'width:60%;'
                                ]), 
                                '@web/phone-locals/index',['class' => 'showModalButton']); 
                            ?>              
                            <br><br>
                            <strong>PHONE DIRECTORY</strong>
                            <br>
                            CGHMC Local Number
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/doc.png', 
                                [
                                    'alt' => 'doctors','style' => 'width:60%;'
                                ]), 
                                '@web/doctors/view-index',['class' => 'showModalButton']); 
                            ?>              
                            <br><br>
                            <strong>Doctor's Schedule</strong>
                            <br>
                            for Viewing of Doctor's Information
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    
                    <div class="col-lg-1" style="margin-right: -5px;"></div>
                </div>
                <div class="col-lg-1">
                </div>
            </div>
        </div>

        <!-- 2nd row options -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-1" style="margin-left: -5px;"></div>
                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/anydesk.png', 
                                [
                                    'alt' => 'QMT','style' => 'width:60%;'
                                ]), 
                                'webrun:V:\Competency\ICTD\AnyDesk.exe'); 
                            ?>                   
                            <br><br>
                            <strong>Any Desk</strong>
                            <br>
                            Connect to the Technical Support/ I.T.
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/eds.png', 
                                [
                                    'alt' => 'EDS','style' => 'width:60%;'
                                ]), 
                                'webrun:X:'); 
                            ?>                            
                            <br><br>
                            <strong>EDS - LINK</strong>
                            <br>
                            Electronic Data System
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/competency.png', 
                                [
                                    'alt' => 'CMatrix','style' => 'width:60%;'
                                ]), 
                                'webrun:V:'); 
                            ?>                            
                            <br><br>
                            <strong>COMPETENCY MATRIX</strong>
                            <br>
                            Free Training Evaluation of Employees
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/webmail.png', 
                                [
                                    'alt' => 'Web Mail','style' => 'width:60%;'
                                ]), 
                                '//www.cghmc.com.ph/webmail/', ['target'=>'_blank']); 
                            ?>                   
                            <br><br>
                            <strong>WEBMAIL</strong>
                            <br>
                            CGHMC Official Web Mail
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">

                            <?= Html::a(Html::img('@web/img/employee.png', 
                                [
                                    'alt' => 'Send','style' => 'width:60%;'
                                ]),

                                '//10.10.1.251/CGHMC_128ONLINE', ['target'=>'_blank']); 
                            ?>                   
                            <br><br>
                            <strong>EMPLOYEE ONLINE</strong>
                            <br>
                            You can see your Payslip record here
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>


                   
                    <div class="col-lg-1" style="margin-right: -5px;"></div>
                </div>
                <div class="col-lg-1">
                </div>
            </div>
        </div>
        <!-- 3nd row options -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-1" style="margin-left: -5px;"></div>
                    
                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                      <div class="row">
                        <?= Html::a(Html::img('@web/img/ip.png', 
                                [
                                    'alt' => 'My IP','style' => 'width:60%;'
                                ]), 
                                '//10.10.20.220/TSSv2/views/site/ip.php', ['target'=>'_blank']);
                                // 'webrun:C:\Windows\ip'); 
                            ?>                   
                            <br><br>
                            <strong>MY IP ADDRESS</strong>
                            <br>
                            Look for IPv4 Address
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>


                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/fut.png', 
                                [
                                    'alt' => 'MERX','style' => 'width:60%;'
                                ]),
                            
                                // '//10.0.6.103', ['target'=>'_blank']);  
                                //'//10.10.20.220/TSSv2/views/site/merx.php', ['target'=>'_blank']); 
                                
                                 '//merx.cghmc.com.ph', ['target'=>'_blank']); 
                            ?>                   
                            <br><br>
                            <strong>HIS and CMS (MERX)</strong>
                            <br>
                            Hospital Information System & Clinical Management System
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/vid.png', 
                                [
                                    'alt' => 'CMatrix','style' => 'width:60%;'
                                ]), 
                                'webrun:V:\Competency\joshua'); 
                            ?>                            
                            <br><br>
                            <strong>Merx Tutorial Videos</strong>
                            <br>
                            How to use Merx System? Open for Turorials
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/den.png', 
                                [
                                    'alt' => 'EXIST','style' => 'width:60%;'
                                ]), 
                                'https://projects.exist.com/projects/cghsupport/issues/new',['target'=>'_blank']); 
                            ?>                   
                            <br><br>
                            <strong>CGH DEN (DEFECTS MONITORING)</strong>
                            <br>
                            (Defects Logging) User Credential
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/easyphil.png', 
                                [
                                    'alt' => 'easy','style' => 'width:60%;'
                                ]), 
                                'http://10.10.30.226/easyclaims/Account/Login?ReturnUrl=%2Feasyclaims%2F', ['target'=>'_blank']);  
                            ?>                   
                            <br><br>
                            <strong>EASY CLAIMS</strong>
                            <br>
                            for Philhealth use only
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>
                    
                   
                    
                    <div class="col-lg-1" style="margin-right: -5px;"></div>
                </div>
                <div class="col-lg-1">
                </div>
            </div>
        </div>

        <!-- 4th row options -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-1" style="margin-left: -5px;"></div>
                    

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/hrtime.png', 
                                [
                                    'alt' => 'hr','style' => 'width:60%;'
                                ]), 
                                'http://10.10.1.251/CGHMC_128TIMEKEEP/Account/Login?ReturnUrl=%2fCGHMC_128TIMEKEEP',['target'=>'_blank']); 
                            ?>                   
                            <br><br>
                            <strong>TIME KEEPING</strong>
                            <br>
                            for Human Resource Department use only (HR)
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/hrpayroll.png', 
                                [
                                    'alt' => 'hr','style' => 'width:60%;'
                                ]), 
                                'http://10.10.1.251/CGHMC_128PAYROLL/Account/Login?ReturnUrl=%2fCGHMC_128PAYROLL',['target'=>'_blank']); 
                            ?>                   
                            <br><br>
                            <strong>PAYROLL</strong>
                            <br>
                            for Human Resource Department use only (HR)
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/hris.png', 
                                [
                                    'alt' => 'hr','style' => 'width:60%;'
                                ]), 
                                '//10.10.1.251/CGHMC_128hris', ['target'=>'_blank']); 
                            ?>                   
                            <br><br>
                            <strong>HRIS</strong>
                            <br>
                            for Human Resource Department use only (HR)
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/service.png', 
                                [
                                    'alt' => 'Services','style' => 'width:60%;'
                                ]), 
                                '@web/servicereport/create',['class' => 'showModalButton']); 
                            ?>
                            <br><br>
                            <strong>SERVICE REQUEST FORM</strong>
                            <br>
                            Send a request to Technical Support Section
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/inventory.png', 
                                [
                                    'alt' => 'inventory','style' => 'width:60%;'
                                ]), 
                                'webrun:V:\Technical\Inventory.bat'); 
                            ?>                            
                            <br><br>
                            <strong>Inventory</strong>
                            <br>
                            for Inventory (PSCD and Pharmacy)
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                    
                    <div class="col-lg-1" style="margin-right: -5px;"></div>
                </div>
                <div class="col-lg-1">
                </div>
            </div>
        </div>




<!-- 5th row options -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-1" style="margin-left: -5px;"></div>
                    

                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/fuser.png', 
                                [
                                    'alt' => 'hr','style' => 'width:60%;'
                                ]), 
                                'http://cloud.cghmc.com.ph/cghmc/public/formulary',['target'=>'_blank']); 
                            ?>                   
                            <br><br>
                            <strong>FORMULARY</strong>
                            <br>
                            for CGHMC employee use only (USER)
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>


                    <div class="col-lg-2" style="margin-left: 5px;margin-right: 5px;">
                        <center>
                        <div class="row">
                            <?= Html::a(Html::img('@web/img/pharmacy.png', 
                                [
                                    'alt' => 'hr','style' => 'width:60%;'
                                ]), 
                                'http://cloud.cghmc.com.ph/cghmc/public/login',['target'=>'_blank']); 
                            ?>                   
                            <br><br>
                            <strong>FORMULARY</strong>
                            <br>
                            for Pharmacy Department use only
                            <br>
                            <br>
                        </div>
                        </center>
                    </div>

                <div class="col-lg-1" style="margin-right: -5px;"></div>
                </div>
                <div class="col-lg-1">
                </div>
            </div>
        </div>

    </div>
    </div>
</div>

                        
    
<!-- TUTORIAL VIDOES -->
 



<div class="row" id="contactUs">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4><center><i class="fa fa-phone"></i> Contact Us</center></h4></div>
                <div class="panel-body"><br>
                    <div class="row">
                    <div class="col-lg-12">
                        <center>
                        <div class="one_half first paditout">

                              <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                      <div class="panel panel-info">
                                          <div class="panel-heading">
                                              <i class="fa fa-phone"></i> <strong> TSS Local Number</strong></div>
                                              <div class="panel-body">
                                                  <p>711-41-41 Loc. 512</p>
                                               </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-12">
                                      <div class="panel panel-info">
                                          <div class="panel-heading">
                                            <i class="fa fa-envelope"></i> <strong> Emails</strong></div>
                                              <div class="panel-body">
                                                  <p>rexesmeralda@cghmc.com.ph</p>
                                                  <p>jdparas@cghmc.com.ph</p>
                                        
                                               </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-12">
                                      <div class="panel panel-info">
                                          <div class="panel-heading">
                                            <i class="fa fa-globe"></i> <strong> Website</strong></div>
                                              <div class="panel-body">
                                                  <p>cghmc.com.ph/webmail</p>
                                               </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-12">
                                      <div class="panel panel-info">
                                          <div class="panel-heading">
                                            <i class="fa fa-book"></i> <strong> Company Address</strong></div>
                                              <div class="panel-body">
                                                  <p>286 Blumentritt, Sta. Cruz, Manila, +632 711-41-41</p>
                                               </div>
                                      </div>
                                    </div>
                                </div>
                              </div>

                              <div class="col-lg-8">
                                <div class="row">
                                    <div class="panel panel-info">
                                          <div class="panel-heading">
                                            <i class="fa fa-map-marker"></i> <strong> Map</strong></div>
                                          <div class=" y">
                                            <iframe style="box-shadow: 5px 5px 5px 5px #bce8f1;border-radius: 5px;"
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241.28307183325245!2d120.98792393426464
                                            !3d14.625877905669231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b61eac2d274d%3A0x9d5d7ff3c9f
                                            74435!2sChinese+General+Hospital+and+Medical+Center!5e0!3m2!1sen!2sph!4v1493192380636" width="100%" height="445px" 
                                            frameborder="0" allowfullscreen >
                                            </iframe>           
                                          </div>
                                    </div>
                                </div>
                              </div>

                        </div>
                        </center>
                        <div class="one_half">
                        
                        </div>
                    </div>
                    </div>
                </div>
        </div>
    </div>

<div class="col-lg-12" id="works">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4><center><i class="fa fa-wrench"></i> TSS Works</center></h4></div>
                <div class="panel-body"><br>
                    <div class="row">
                    
                        <div class="col-lg-4">
                            <center>
                                <?= Html::a(Html::img('@web/img/jot/wifi.jpg', 
                                    [
                                        'alt' => 'Wifi','style' => 'width:60%;',
                                        'class' => 'img-responsive',
                                    ]), 
                                    '#'); 
                                ?>     
                                <br>                                   
                                <strong>CGHMC WI-FI</strong>
                                <br>Departments, Sections, Doctors and Patients<br>
                            </center>
                        </div>
                    
                        <div class="col-lg-4">
                            <center>
                                <?= Html::a(Html::img('@web/img/jot/hardsoftware.jpg', 
                                    [
                                        'alt' => 'Wifi','style' => 'width:60%;',
                                        'class' => 'img-responsive',
                                    ]), 
                                    '#'); 
                                ?>    
                                <br>                                    
                                <strong>HARDWARE AND SOFTWARE</strong>
                                <br>Service and Maintenance<br>
                            </center>
                        </div>
                    
                        <div class="col-lg-4">
                            <center>
                                <?= Html::a(Html::img('@web/img/jot/cctv.jpg', 
                                    [
                                        'alt' => 'Wifi','style' => 'width:60%;',
                                        'class' => 'img-responsive',
                                    ]), 
                                    '#'); 
                                ?>     
                                <br>                                   
                                <strong>CLOSED - CIRCUIT TELEVISION</strong>
                                <br>Accounting, Human Resource and Parking Department CCTVs<br>
                            </center>
                        </div>
                    
                        <div class="col-lg-4">
                            <br>
                            <center>
                                <?= Html::a(Html::img('@web/img/jot/network.jpg', 
                                    [
                                        'alt' => 'Wifi','style' => 'width:60%;',
                                        'class' => 'img-responsive',
                                    ]), 
                                    '#'); 
                                ?>     
                                <br>                                   
                                <strong>NETWORK AND CABLING</strong>
                                <br>Chinese General Hospital and Medical Center<br>
                            </center>
                        </div>
                    
                        <div class="col-lg-4">
                            <br>
                            <center>
                                <?= Html::a(Html::img('@web/img/jot/printer.jpg', 
                                    [
                                        'alt' => 'Wifi','style' => 'width:60%;',
                                        'class' => 'img-responsive',
                                    ]), 
                                    '#'); 
                                ?>     
                                <br>                                   
                                <strong>PRINTER AND PHOTOCOPIER</strong>
                                <br>Service and Maintenance<br>
                            </center>
                        </div>
                    
                        <div class="col-lg-4">
                            <br>
                            <center>
                                <?= Html::a(Html::img('@web/img/jot/parking.jpg', 
                                    [
                                        'alt' => 'Wifi','style' => 'width:60%;',
                                        'class' => 'img-responsive',
                                    ]), 
                                    '#'); 
                                ?>         
                                <br>                      
                                <strong>CGHMC PARKING SYSTEM</strong>
                                <br>Service and Maintenance<br>
                            </center>
                        </div>

                    </div>
                </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-12" id="about">
            <div class="col-lg-4">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <i class="fa fa-question-circle"></i> <strong> About Us</strong></div>
                  <div class="panel-body" style="font-size: 15px;">
                    <strong>Technical Support Section was established last June 22, 2004, in the line of upgrading the computer system,
                    it was originally focused on the network connections and server maintenance. But now due to contributing
                    knowledge of technical support personnels, the section expanded and evolves its field.</strong>
                    <br><br>
                    Aside from its field in administering and maintaining the networks and servers, the section was involved in the operation of 
                    parking system, free WI-FI for the patients and doctors, CCTV system, and later bestowed to assist BIOMED department in handling the imaging system (PACS).
                    <br><br>
                    Technical Support Section does not only guaranties users satisfaction, but we also commit to provide excellent service and timely response to your request.
                  </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <i class="fa fa-sliders"></i> <strong> Mission and Vision</strong></div>
                  <div class="panel-body" style="font-size: 15px;">
                      <strong>Mission</strong><br><br>
                      We shall commit to provide excellent IT services to different departments through timely response to thier request
                      <br><br>
                      <strong>Vision</strong><br><br>
                      A global information portal CGHMC's medical, financial and statistical information accessible through internet or mobile 
                      technology while ensuring data security, delivering the highest quality of information and efficient service obtaining 100% 
                      user satisfaction with component, well trained, highly motivated and dedicated I.T. workforce.
                      <br><br>
                  </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <i class="fa fa-book"></i> <strong> Verse of the Day</strong></div>
                  <div class="panel-body" style="font-size: 15px;">
                    <strong>
                        <p>
                        <?= $votd->bible_verse ?>
                        </p>
                        <br> 
                    </strong>
                        <p>
                        <?= $votd->bible_verse_desc ?>
                        </p> 
                        <br> 
                    <strong>
                        <p>
                        Thoughts on today's verse
                        </p> 
                        <br> 
                    </strong>
                    <?= $votd->totd ?>
                  </div>
                </div>
            </div>
        </div>
    </div>
  
