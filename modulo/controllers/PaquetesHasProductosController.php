<?php

namespace app\controllers;

use Yii;
use app\models\PaquetesHasProductos;
use app\models\PaquetesHasProductosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaquetesHasProductosController implements the CRUD actions for PaquetesHasProductos model.
 */
class PaquetesHasProductosController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all PaquetesHasProductos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaquetesHasProductosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PaquetesHasProductos model.
     * @param integer $paquetes_id
     * @param integer $productos_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($paquetes_id, $productos_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($paquetes_id, $productos_id),
        ]);
    }

    /**
     * Creates a new PaquetesHasProductos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PaquetesHasProductos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'paquetes_id' => $model->paquetes_id, 'productos_id' => $model->productos_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PaquetesHasProductos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $paquetes_id
     * @param integer $productos_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($paquetes_id, $productos_id)
    {
        $model = $this->findModel($paquetes_id, $productos_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'paquetes_id' => $model->paquetes_id, 'productos_id' => $model->productos_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PaquetesHasProductos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $paquetes_id
     * @param integer $productos_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($paquetes_id, $productos_id)
    {
        $this->findModel($paquetes_id, $productos_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PaquetesHasProductos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $paquetes_id
     * @param integer $productos_id
     * @return PaquetesHasProductos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($paquetes_id, $productos_id)
    {
        if (($model = PaquetesHasProductos::findOne(['paquetes_id' => $paquetes_id, 'productos_id' => $productos_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
