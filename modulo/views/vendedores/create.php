<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Vendedores */

$this->title = 'Nuevo Vendedor';
$this->params['breadcrumbs'][] = ['label' => 'Vendedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendedores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
