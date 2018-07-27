<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nom_cli')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ruc_cli')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dir_cli')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel_cli')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
