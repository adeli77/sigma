<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Clientes;
use app\models\Productos;
use app\models\Paquetes;
use yii\widgets\DetailView;
use app\models\Vendedores;
use yii\helpers\ArrayHelper
/* @var $this yii\web\View */
/* @var $model app\models\Cotizaciones */
/* @var $form yii\widgets\ActiveForm */
?>
<?php echo $rucCli; ?>
<div class="cotizaciones-form">

    <?php  $form = ActiveForm::begin(); ?>
    <div class="row">  
            <div class="col-sm-9">
                   <?= $form->field($model, 'cod_cotiza')->textInput() ?>
            </div>
     </div>

    

     <div class="row">        
            <div class="col-sm-3">
            <?php
             $data=ArrayHelper::map(Clientes::find()->all(),'id','nom_cli');
               echo $form->field($model, 'clientes_id')->widget(Select2::classname(), ['data' =>$data,'pluginOptions' => ['allowClear' => true],]);

            ?>    
              
            </div> 
            <div class="col-sm-3">
              <div class="form-group field-cotizaciones-clientes_id required has-success">
                <label class="control-label" for="cotizaciones-clientes_id">RUC</label>
                    <input type="text" class="form-control" value="22"/> 
              </div>   
              
            </div>
            <div class="col-sm-3">
                 
               <?= $form->field($model, 'vendedores_id')->dropDownlist(
                   ArrayHelper::map(Vendedores::find()->all(),'id','nom_vend')); 
               ?>
            </div>
           
    </div> 
    <div class="row">  
            <div class="col-sm-3">
                <?php
                 echo $form->field($model, 'paquetes_id')->dropDownlist(
                   ArrayHelper::map(Paquetes::find()->all(),'id','nom_paq')); 
               ?>
            </div>
            <div class="col-sm-3">
               <?= $form->field($model, 'monto')->textInput() ?>
            </div>
            
             <div class="col-sm-3">
               <?= $form->field($model, 'descuento')->textInput() ?>
            </div>
     </div>  
    <div class="row">  
            <div class="col-sm-3">
                    <?= $form->field($model, 'impuesto')->textInput(['value'=>'12.5']) ?>
            </div>
     </div>
      <div class="row">  
            <div class="col-sm-3">
                 <?= $form->field($model, 'monto')->textInput() ?>
            </div>
     </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

