<?php

namespace app\controllers;

use Yii;
use app\models\CallsReport;
use app\models\Department;
use app\models\Section;
use app\models\Employee;
use app\models\CallsReportSearcg;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException; 
use yii\helpers\ArrayHelper;

/**
 * CallsReportController implements the CRUD actions for CallsReport model.
 */
class CallsReportController extends Controller
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
     * Lists all CallsReport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CallsReportSearcg();
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
     * Displays a single CallsReport model.
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
     * Creates a new CallsReport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->isGuest || Yii::$app->user->identity->id != 100){
            throw new ForbiddenHttpException("You are not allowed to access this page. Please back to home page.");
        }
        $model = new CallsReport();
        $departmentsList = ArrayHelper::map(Department::find()->all(),'id','name');
        $sectionsList = ArrayHelper::map(Section::find()->all(),'id','name');
        $employeesList = ArrayHelper::map(Employee::find()->all(),'payroll_number','employee_name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'departmentsList' => $departmentsList,
            'sectionsList' => $sectionsList,
            'employeesList' => $employeesList,
        ]);
    }

    /**
     * Updates an existing CallsReport model.
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
        $departmentsList = ArrayHelper::map(Department::find()->all(),'id','name');
        $sectionsList = ArrayHelper::map(Section::find()->all(),'id','name');
        $employeesList = ArrayHelper::map(Employee::find()->all(),'payroll_number','employee_name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'departmentsList' => $departmentsList,
            'sectionsList' => $sectionsList,
            'employeesList' => $employeesList,
        ]);
    }

    /**
     * Deletes an existing CallsReport model.
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
     * Finds the CallsReport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CallsReport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CallsReport::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
