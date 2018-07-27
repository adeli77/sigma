<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Paquetes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paquetes-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'nom_paq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descuento')->textInput() ?>

    <?= $form->field($model, 'activo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
