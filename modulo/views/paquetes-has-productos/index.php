<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaquetesHasProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paquetes Has Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paquetes-has-productos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Paquetes Has Productos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'paquetes_id',
            'productos_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
