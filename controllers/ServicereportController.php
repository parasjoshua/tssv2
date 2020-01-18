<?php

namespace app\controllers;

use Yii;
use app\models\Servicereport;
use app\models\Employee;
use app\models\Department;
use app\models\Section;
use app\models\ServicereportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use kartik\mpdf\Pdf;
use \DateTime;
use \DateTimeZone;
use app\models\WifiSearchLogs;
use app\models\WifiAccounts;

/**
 * ServicereportController implements the CRUD actions for Servicereport model.
 */
class ServicereportController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Servicereport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServicereportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(Yii::$app->user->isGuest){
            return $this->renderAjax('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);  
        }
        else if(Yii::$app->user->identity->id == 100){
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);            
        }
        else{
            return $this->renderAjax('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);            
        }
    }

    /**
     * Displays a single Servicereport model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->isGuest || Yii::$app->user->identity->id != 100){
            throw new ForbiddenHttpException("You are not allowed to access this page. Please back to home page.");
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Servicereport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionServicerequest($id) {
        // get your HTML raw content without any layouts or scripts

        if(Yii::$app->user->isGuest || Yii::$app->user->identity->id != 100){
            throw new ForbiddenHttpException("You are not allowed to access this page. Please back to home page.");
        }
        
        $model = Servicereport::findOne(['servicereportnum' => $id]);
        $content = $this->renderPartial('servicereportview', [
            'model' => $model,
        ]);
        
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8, 
            // A4 paper format
            'format' => Pdf::FORMAT_LETTER, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            'marginLeft' => 13,  
            'marginTop' => 5,
            'marginBottom' => 3,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '
                .kv-heading-1{font-size:18px}
                body {font-family: "Times New Roman", Times;}
            ', 
             // set mPDF properties on the fly
             // call mPDF methods on the fly
            'methods' => [ 
                // 'SetHeader'=>['Krajee Report Header'], 
                // 'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }

    public function actionCreate()
    {
        $model = new Servicereport();

        if ($model->load(Yii::$app->request->post())) {
            // if($model->servicereportnum == $model->servicereportnum){

            // }
            date_default_timezone_set('Asia/Manila');
            $currentDateTime = date('H:i:s');
            $model->datereceived =  date('m/d/Y');
            $model->timereceived =  date('h:i:s A', strtotime($currentDateTime));
            $model->save();
            

            \Yii::$app->getSession()->setFlash('success', 'Report Successfully Filed');
            // return $this->redirect('@web/site/index');
            $model = Servicereport::findOne(['servicereportnum' => $model->servicereportnum]);
            $content = $this->renderPartial('servicereportview', [
                'model' => $model,
            ]);

            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_UTF8, 
                // A4 paper format
                'format' => Pdf::FORMAT_LETTER, 
                // portrait orientation
                'orientation' => Pdf::ORIENT_PORTRAIT, 
                // stream to browser inline
                'destination' => Pdf::DEST_BROWSER, 
                // your html content input
                'content' => $content,  
                'marginLeft' => 13,  
                'marginTop' => 5,
                'marginBottom' => 3,  
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting 
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                'cssInline' => '
                    .kv-heading-1{font-size:18px}
                    body {font-family: "Times New Roman", Times;}
                ', 
                 // set mPDF properties on the fly
                 // call mPDF methods on the fly
                'methods' => [ 
                    // 'SetHeader'=>['Krajee Report Header'], 
                    // 'SetFooter'=>['{PAGENO}'],
                ]
            ]);
    
            // return the pdf output as per the destination setting
            return $pdf->render();
        }


        if(YiI::$app->user->isGuest){
            return $this->renderAjax('create', [
                'model' => $model,
            ]); 
        }
        else{
            return $this->render('create', [
                'model' => $model,
            ]);          
        }
    }

    public function actionGetdata($value)
    {
        $empData = Employee::find()
        ->where(['employee.payroll_number'=>$value])->one();

        $empDept = Department::find()
        ->leftJoin('employee','employee.department = department.id')
        ->where(['employee.payroll_number'=>$value])->one();

        $empname = !empty($empData) ? $empData : "";
        $empDepartment = !empty($empDept) ? $empDept : "";
        
        \Yii::$app->response->format = 'json';

        return $empname;
    }

    public function actionGetdatadept($value)
    {
        $empDept = Department::find()
        ->leftJoin('employee','employee.department = department.id')
        ->where(['employee.payroll_number'=>$value])->one();

        $empDepartment = !empty($empDept) ? $empDept : "";
        
        \Yii::$app->response->format = 'json';

        return $empDepartment;
    }

    public function actionGetdatasec($value)
    {
        $empSec = Section::find()
        ->leftJoin('employee','employee.section = section.id')
        ->where(['employee.payroll_number'=>$value])->one();

        $empSection = !empty($empSec) ? $empSec : "";
        
        \Yii::$app->response->format = 'json';

        return $empSection;
    }

    public function actionGetdatawifi($value)
    {
        $empWifis = WifiAccounts::find()
        ->where(['admission_number'=>$value])->one();

        $empWifi = !empty($empWifis) ? $empWifis : "";
        
        \Yii::$app->response->format = 'json';

        return $empWifi;
    }


    public function actionSavelogs($payroll_number,$employee_name,$department,$section,$admission_number)
    {
        $modelLogs = new WifiSearchLogs();
        $modelLogs->payroll_number = $payroll_number;
        $modelLogs->employee_name = $employee_name;
        $modelLogs->department = $department;
        $modelLogs->section = $section;
        $modelLogs->admission_number = $admission_number;
        $modelLogs->date = date('Y-m-d');
        $modelLogs->save();
    }

    /**
     * Updates an existing Servicereport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->isGuest || Yii::$app->user->identity->id != 100){
            throw new ForbiddenHttpException("You are not allowed to access this page. Please back to home page.");
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->servicereportnum]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Servicereport model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->isGuest || Yii::$app->user->identity->id != 100){
            throw new ForbiddenHttpException("You are not allowed to access this page. Please back to home page.");
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Servicereport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Servicereport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Servicereport::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
