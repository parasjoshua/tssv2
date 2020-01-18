<?php

namespace app\controllers;

use Yii;
use app\models\VerseOfTheDay;
use app\models\VerseOfTheDaySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException; 

/**
 * VerseOfTheDayController implements the CRUD actions for VerseOfTheDay model.
 */
class VerseOfTheDayController extends Controller
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
     * Lists all VerseOfTheDay models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException("You are not allowed to access this page. Please back to home page.");
        }
        $searchModel = new VerseOfTheDaySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VerseOfTheDay model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException("You are not allowed to access this page. Please back to home page.");
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new VerseOfTheDay model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException("You are not allowed to access this page. Please back to home page.");
        }

        $model = new VerseOfTheDay();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->date = date('Y-m-d');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_votd]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing VerseOfTheDay model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException("You are not allowed to access this page. Please back to home page.");
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_votd]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing VerseOfTheDay model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException("You are not allowed to access this page. Please back to home page.");
        }
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the VerseOfTheDay model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VerseOfTheDay the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VerseOfTheDay::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
