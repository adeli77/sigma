<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cotizaciones */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cotizaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizaciones-view">

    <h1>Cotización</h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cod_cotiza'=>[ 'label'=>'Código','value'=>function ($model) { return $model->cod_cotiza; }],
            'clientes_id'=>['attribute'=>'clientes', 'label'=>'Cliente', 'value'=>function ($model) { return $model->clientes->nom_cli; }],
            'vendedores_id'=>['attribute'=>'vendedores', 'label'=>'Vendedor', 'value'=>function ($model) { return $model->vendedores->nom_vend; }],
            'paquetes_id'=>['attribute'=>'paquetes', 'label'=>'Paquete', 'value'=>function ($model) { return $model->paquetes->nom_paq; }],
        ],
    ]) ?>

</div>
<?php foreach($listap as $lista){

}
?>