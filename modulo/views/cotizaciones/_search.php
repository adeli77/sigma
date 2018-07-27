<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CotizacionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cotizaciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cod_cotiza') ?>

    <?= $form->field($model, 'clientes_id') ?>

    <?= $form->field($model, 'vendedores_id') ?>

    <?= $form->field($model, 'paquetes_id') ?>

    <?php // echo $form->field($model, 'monto') ?>

    <?php // echo $form->field($model, 'impuesto') ?>

    <?php // echo $form->field($model, 'descuento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
