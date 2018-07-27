<?php

namespace app\controllers;

use Yii;
use app\models\Cotizaciones;
use app\models\Clientes;
use app\models\Productos;
use app\models\CotizacionesSearch;
use app\models\CotizacionesHasProductos;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
use yii\filters\AccessControl;

/**
 * CotizacionesController implements the CRUD actions for Cotizaciones model.
 */
class CotizacionesController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'create'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Cotizaciones models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CotizacionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single Cotizaciones model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $cohasprod = new CotizacionesHasProductos();
        $listap = $cohasprod->findOne(['cotizaciones_id' => $id]);

        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'listap' => $listap,
        ]);
    }

    /**
     * Creates a new Cotizaciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $data = Yii::$app->request->post();
            $cod_cot = $data['formData']['cod_cot'];
            $cli_id = $data['formData']['nom_id'];
            $ven_id = $data['formData']['vend_id'];
            $paq_id = $data['formData']['paq_id'];
            $model = new Cotizaciones();
            $productos = new Productos();
            $model->cod_cotiza = $cod_cot;
            $model->clientes_id = $cli_id;
            $model->vendedores_id = $ven_id;
            $model->paquetes_id = $paq_id;
            if ($model->save()) {
                // $dato = $productos->findOne(['cod_prod' => $plista['Codigo']])->id;
                foreach ($data['formData']['prod_lista'] as $plista) {
                    $cothasprod = new CotizacionesHasProductos();
                    $cothasprod->cotizaciones_id = $model->findOne(['cod_cotiza' => $cod_cot])->id;
                    $cothasprod->productos_id = $productos->findOne(['cod_prod' => $plista['Codigo']])->id;
                    $cothasprod->save();
                }
                return [
                    'success' => true,
                ];
            } else {
                return [
                    'success' => false,
                ];
            }



            /*
              //return $this->redirect(['view', 'id' => $model->id]); */
        } else {

            $model = new Cotizaciones();
            $searchModel = new Productos();
            $query = Productos::find()->select('*');
            $cothasprod = new CotizacionesHasProductos();

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $cli = 1;
            $cod_cot = $model->find()->orderBy(['id' => SORT_DESC])->one();
            $model->cod_cotiza = $cod_cot['cod_cotiza'] + 1;
            return $this->render('create', [
                        'model' => $model,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        'rucCli' => $cli,
            ]);
        }
        /* return $this->render('create', [
          'model' => $model,
          'rucCli' => $cli
          ]); */
    }

    /**
     * Updates an existing Cotizaciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Buscar el codigo ruc del cliente.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionBuscarxruc() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $ruc = Yii::$app->request->post('ruc');
            $clientes = new Clientes();
            $buscarCliente = $clientes->find()
                            ->select(['ruc_cli'])
                            ->where(['id' => $ruc])->one();
            $clienteruc = $buscarCliente['ruc_cli'];
        }
        return [
            'success' => true,
            'data' => [[
            'id' => $clienteruc
                ]],
        ];
    }

    /**
     * Buscar por codigo.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionBuscarxcodigo() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $buscarProducto = "";
        if (Yii::$app->request->isAjax) {
            $codigo = Yii::$app->request->post('codigo');
            $productos = new Productos();
            $buscarProducto = $productos->find()
                            ->select(['cod_prod', 'desc_prod', 'monto'])
                            ->where(['cod_prod' => $codigo])->one();
        }
        return [
            'success' => true,
            'data' => ['data' => $buscarProducto],
        ];
    }

    /**
     * Deletes an existing Cotizaciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
      public function actionHelloWorld($id)
      {
      return Clientes::find()->all() ;
      }
     */

    /**
     * Finds the Cotizaciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cotizaciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Cotizaciones::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
