<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vendedores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendedores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'nom_vend')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ruc_vend')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel_vend')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
