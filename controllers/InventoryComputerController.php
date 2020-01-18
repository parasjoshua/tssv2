<?php

namespace app\controllers;

use Yii;
use app\models\InventoryComputer;
use app\models\InventoryComputerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Employee;
use yii\helpers\ArrayHelper;
use yii\web\ForbiddenHttpException; 

/**
 * InventoryComputerController implements the CRUD actions for InventoryComputer model.
 */
class InventoryComputerController extends Controller
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
     * Lists all InventoryComputer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InventoryComputerSearch();
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
     * Displays a single InventoryComputer model.
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
     * Creates a new InventoryComputer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->isGuest || Yii::$app->user->identity->id != 100){
            throw new ForbiddenHttpException("You are not allowed to access this page. Please back to home page.");
        }
        $model = new InventoryComputer();
        $employeesList = ArrayHelper::map(Employee::find()->all(),'payroll_number','employee_name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'employeesList' => $employeesList,
        ]);
    }

    /**
     * Updates an existing InventoryComputer model.
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
        $employeesList = ArrayHelper::map(Employee::find()->all(),'payroll_number','employee_name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'employeesList' => $employeesList,
        ]);
    }

    /**
     * Deletes an existing InventoryComputer model.
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
     * Finds the InventoryComputer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InventoryComputer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InventoryComputer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
