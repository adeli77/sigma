<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CotizacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cotizaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizaciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Cotizaciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'cod_cotiza'=>[ 'label'=>'Codigo','value'=>function ($model, $index, $widget) { return $model->cod_cotiza; }],
            'clientes_id'=>['attribute'=>'clientes', 'label'=>'Cliente', 'value'=>function ($model, $index, $widget) { return $model->clientes->nom_cli; }],
            'vendedores_id'=>['attribute'=>'vendedores', 'label'=>'Vendedor', 'value'=>function ($model, $index, $widget) { return $model->vendedores->nom_vend; }],
            'paquetes_id'=>['attribute'=>'paquetes', 'label'=>'Paquete', 'value'=>function ($model, $index, $widget) { return $model->paquetes->nom_paq; }],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
