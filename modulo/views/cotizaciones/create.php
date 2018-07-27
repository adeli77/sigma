<?php

use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Clientes;
use app\models\Productos;
use app\models\Paquetes;
use yii\widgets\DetailView;
use app\models\Vendedores;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\grid\GridView;
use kartik\editable\Editable;

$this->title = 'Cotizaciones';
/* @var $this yii\web\View */
/* @var $model app\models\Cotizaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cotizaciones-form">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row"> 
        <div class="col-sm-3">
            <?= $form->field($model, 'cod_cotiza')->textInput(['readonly'=> true]) ?>
            
        </div>      
        <div class="col-sm-3">
            <?php
            $data3 = ArrayHelper::map(Clientes::find()->all(), 'id', 'nom_cli');
            echo $form->field($model, 'clientes_id')->widget(Select2::classname(), ['data' => $data3, 'pluginOptions' => ['allowClear' => true]]);
            ?>

        </div> 
        <div class="col-sm-3">
            <div class="form-group field-cotizaciones-clientes_id required has-success">
                <label class="control-label" for="cotizaciones-clientes_id">RUC</label>
                <input id="RUC" type="text" class="form-control" value="" readonly/> 
            </div>   

        </div>
        <div class="col-sm-3">

            <?=
            $form->field($model, 'vendedores_id')->dropDownlist(
                    ArrayHelper::map(Vendedores::find()->all(), 'id', 'nom_vend'));
            ?>
        </div>

    </div> 
    <div class="row">  
        <div class="col-sm-3">
            <?php
            echo $form->field($model, 'paquetes_id')->dropDownlist(
                    ArrayHelper::map(Paquetes::find()->all(), 'id', 'nom_paq'));
            ?>
        </div>

    </div>  

    <div class="row">
        <div class="col-sm-3">

        </div>
        <div class="col-sm-3">

        </div>
    </div>
    <div class="row">
        <table id="productos" class="table ">
            <thead>
                <tr>
                    <th width="10%"> <?php
                        $datap1 = ArrayHelper::map(Productos::find()->all(), 'id', 'cod_prod');
                        echo $form->field($model, 'id', [
                            "template" => "<label> Codigo </label>\n{input}\n{hint}\n{error}"
                        ])->widget(Select2::classname(), ['options' => ['id' => 'codigop'], 'data' => $datap1, 'pluginOptions' => ['allowClear' => true]]);
                        ?></th>
                    <th width="10%"><?php
                        $datap2 = ArrayHelper::map(Productos::find()->all(), 'id', 'desc_prod');
                        echo $form->field($model, 'id', [
                            "template" => "<label> Descripcion </label>\n{input}\n{hint}\n{error}"
                        ])->widget(Select2::classname(), ['options' => ['id' => 'descprod'], 'data' => $datap2, 'pluginOptions' => ['allowClear' => true]]);
                        ?></th>
                    <th width="10%"><div class="form-group field-cotizaciones-clientes_id required has-success">
                            <label class="" for="cotizaciones-clientes_id">Precio</label>
                            <input id="precio" type="text" class="form-control" value="" readonly/> 
                        </div>   
                    </th>
                    <th width="10%">
                        <div class="form-group field-cotizaciones-clientes_id required has-success">
                            <label class="" for="cotizaciones-clientes_id">Cantidad</label>
                            <input id="cantidad" type="text" class="form-control" value=""/> 
                        </div> 
                    </th>
                    <th width="10%"><div class="form-group field-cotizaciones-clientes_id required has-success">
                            <label class="" for="cotizaciones-clientes_id">Total</label>
                            <input id="total" type="text" class="form-control" value=""/> 
                        </div>   
                    </th>
                    <th width="10%"><a href="#" style="margin-bottom:15px " class="btn btn-primary" onclick="agregarFila();">Agregar</a>


                    </th>

                </tr>
            </thead>
            <tbody>
                <tr>

                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total:</td>
                    <td><span id="total2"></span></td>
                    <td></td>

                </tr>
                 <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Descuento:</td>
                    <td><span id="descuento"></span></td>
                    <td></td>

                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Impuesto:</td>
                    <td><span id="impuesto2"></span></td>
                    <td></td>

                </tr>
                
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Monto a pagar:</td>
                    <td><span id="monto2"></span></td>
                    <td></td>

                </tr>
            </tfoot>
        </table>
    </div>
    <div class="form-group">
        
        <a href="#" id="boton">Guardar</a>
        <?php // Html::submitButton('Guardar',array('type' => 'POST','name' => 'botonGuardar','id'=>'botonGuardar')); ?>
    </div>
    <?php
    $this->registerJs("$('#cotizaciones-clientes_id').change(function (e){
        e.preventDefault();
        var ruc=$('#cotizaciones-clientes_id').val();
        $.ajax({
            url: '" . yii\helpers\Url::to(['cotizaciones/buscarxruc']) . "',        
            method: 'post',       
            data: {ruc:ruc },
            dataType: 'json',
            success: function (response) {
            if (response.success){
                console.log(response); 
                $.each(response.data, function(key, value) {
                   $('#RUC').val(value['id']);
                }); 
            }
        },error: function (errormessage) {
                //do something else
                alert('not working');
            }
      });  return false;
});");
    ?>
    <?php
    $this->registerJs("$('#codigop').change(function (e){
       
        var codigo=$('#codigop  option:selected').text();
        $.ajax({
            url: '" . yii\helpers\Url::to(['cotizaciones/buscarxcodigo']) . "',        
            method: 'post',       
            data: {codigo:codigo },
            dataType: 'json',
            success: function (response) {
            if (response.success){
                console.log(response); 
                $.each(response.data, function(key, value) {
                   console.log(value);
                   desc=value['desc_prod'];
                   $('#descprod').each(function () {
                       $('option', this).each(function () {
                        valor=$(this).text().toLowerCase();
                         if (valor == desc){
                           $(this).attr('selected', 'selected').change();
                          
                         };
                       });
                   });
                   $('#precio').val(value['monto']);                    
                }); 
            }
        },error: function (errormessage) {
                //do something else
                alert('not working');
            }
      });  return false;
     });");
    ?>
    <?php
    $this->registerJs("$('#cantidad').on('input',function(e){
        e.preventDefault();
          var precio = $('#precio').val();
          var cantidad = $('#cantidad').val();
          var total = precio * cantidad;
           $('#total').val(total);
        });");
    ?>
    <?php
    $this->registerJs("$('#boton').on('click', function(e) {
        e.preventDefault();
        var formData ={
                     
                        'cod_cot':$('#cotizaciones-cod_cotiza').val(),
                        'nom_id':$('#cotizaciones-clientes_id').val(),
                        'vend_id':$('#cotizaciones-vendedores_id').val(),
                        'paq_id':$('#cotizaciones-paquetes_id').val(),
                        'prod_lista': datosItemes(),
                      
                   };
                  
        var codigo=$('#cotizaciones-cod_cotiza').val();
        console.log(formData);
        $.ajax({
            url: '" . yii\helpers\Url::to(['cotizaciones/create']) . "',        
            method: 'post',       
            data: {formData},
            dataType: 'json',
            success :  function(data) {
                console.log(data);
                if(data.success){
                  window.location.href = 'http://localhost:8080/index.php?r=cotizaciones'; 
                }else{
                alert('Error al ingresar codigo');
                  }
                
            },
            error : function (data){
                //alert('Error');
            //alert(data);
            }
        });
       

        });");
    ?>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
    var itemes = [];
    var fila = 0;
    function agregarFila() {
        var codigo = $('#codigop option:selected').text();
        var descripcion = $('#descprod option:selected').text();
        var precio = $('#precio').val();
        var cantidad = $('#cantidad').val();
        var total = precio * cantidad;
        $('#productos tbody:last').after('<tr id=' + fila + '><td>' + codigo + '</td><td>' + descripcion + '</td><td>' + number(precio, 2) + '</td><td>' + cantidad + '</td><td>' + number(total, 2) + '</td><td><a href="#" onclick="javascript:eliminarFila(' + fila + ');">Eliminar</a></td></tr>');
        fila++;
        $("#productos tbody tr").each(function () {
            var itemOrden = {};
            var tds = $('#productos').find("td");
            itemOrden.Codigo = tds.filter(":eq(0)").text();
            itemOrden.Descripcion = tds.filter(":eq(1)").text();
            itemOrden.Precio = parseFloat(tds.filter(":eq(2)").text());
            itemOrden.Cantidad = parseFloat(tds.filter(":eq(3)").text());
            itemes.push(itemOrden);
        });
        calculo();
    }
    function number(num, pam) {
        return parseFloat(num)
                .toFixed(2) // always two decimal digits
    }
    function eliminarFila(idfila) {
        $('#' + idfila).remove();
        itemes.splice(itemes.indexOf(idfila), 1);
        /* var itemesTemp = [];
         var j = 0;
         for (var i = 0; i < itemes.length; i++) {
         if (i == idfila) {
         itemesTemp[j] = itemes[i];
         } else {
         j++;
         }
         }
         for (var i = 0; i <= itemesTemp.length; i++) 
         itemes[i] = itemesTemp[i];*/
        calculo();
    }
    function datosItemes(){
        calculo();
        return itemes;
    }
    function calculo() {

        var total = 0;
        $.each(itemes, function (index, val) {
            totalReg = val.Precio * val.Cantidad;
            total = total + totalReg;
        });
        try {
            dataObj = JSON.parse(itemes);
        } catch (err) {
            if (typeof itemes === "object") {
                dataObj = itemes;
            } else {
                dataObj = {};
            }
        }

        console.log(dataObj);
        $('#total2').html(number(total, 3));
        $('#impuesto2').html(number(total * 0.12, 3));
        $('#monto2').html(number(total * 0.12 + total, 3));
        var data = JSON.stringify(itemes);
        $('#jsondata').val(data);
    }
</script>

