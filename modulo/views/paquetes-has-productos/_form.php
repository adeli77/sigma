<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaquetesHasProductos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paquetes-has-productos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paquetes_id')->textInput() ?>

    <?= $form->field($model, 'productos_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
