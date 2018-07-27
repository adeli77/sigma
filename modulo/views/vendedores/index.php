<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VendedoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendedores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendedores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Vendedor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nom_vend',
            'ruc_vend',
            'tel_vend',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
