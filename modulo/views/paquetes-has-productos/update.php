<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaquetesHasProductos */

$this->title = 'Update Paquetes Has Productos: ' . $model->paquetes_id;
$this->params['breadcrumbs'][] = ['label' => 'Paquetes Has Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->paquetes_id, 'url' => ['view', 'paquetes_id' => $model->paquetes_id, 'productos_id' => $model->productos_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paquetes-has-productos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
