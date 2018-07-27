<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaquetesHasProductos */

$this->title = $model->paquetes_id;
$this->params['breadcrumbs'][] = ['label' => 'Paquetes Has Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paquetes-has-productos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'paquetes_id' => $model->paquetes_id, 'productos_id' => $model->productos_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'paquetes_id' => $model->paquetes_id, 'productos_id' => $model->productos_id], [
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
            'paquetes_id',
            'productos_id',
        ],
    ]) ?>

</div>
