<?php

namespace app\controllers;

use Yii;
use app\models\InventoryAssignment;
use app\models\InventoryComputer;
use app\models\Department;
use app\models\Section;
use app\models\InventoryAssignmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException; 
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * InventoryAssignmentController implements the CRUD actions for InventoryAssignment model.
 */
class InventoryAssignmentController extends Controller
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
     * Lists all InventoryAssignment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InventoryAssignmentSearch();
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
     * Displays a single InventoryAssignment model.
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
     * Creates a new InventoryAssignment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->isGuest || Yii::$app->user->identity->id != 100){
            throw new ForbiddenHttpException("You are not allowed to access this page. Please back to home page.");
        }
        $model = new InventoryAssignment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $departmentsList = ArrayHelper::map(Department::find()->all(),'id','name');
        $sectionsList = ArrayHelper::map(Section::find()->all(),'id','name');
        $inventorycomputersList = ArrayHelper::map(InventoryComputer::find()->all(),'id','brandserial');

        return $this->render('create', [
            'model' => $model,
            'departmentsList' => $departmentsList,
            'sectionsList' => $sectionsList,
            'inventorycomputersList' => $inventorycomputersList,
        ]);
    }

    /**
     * Updates an existing InventoryAssignment model.
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
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $departmentsList = ArrayHelper::map(Department::find()->all(),'id','name');
        $sectionsList = ArrayHelper::map(Section::find()->all(),'id','name');
        $inventorycomputersList = ArrayHelper::map(InventoryComputer::find()->all(),'id','brandserial');

        return $this->render('update', [
            'model' => $model,
            'departmentsList' => $departmentsList,
            'sectionsList' => $sectionsList,
            'inventorycomputersList' => $inventorycomputersList,
        ]);
    }

    /**
     * Deletes an existing InventoryAssignment model.
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
     * Finds the InventoryAssignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InventoryAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InventoryAssignment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
