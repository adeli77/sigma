<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PaquetesHasProductos */

$this->title = 'Create Paquetes Has Productos';
$this->params['breadcrumbs'][] = ['label' => 'Paquetes Has Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paquetes-has-productos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
