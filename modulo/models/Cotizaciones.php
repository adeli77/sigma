<?php

namespace app\models;


use Yii;
use yii\filters\AccessControl;

/**
 * This is the model class for table "cotizaciones".
 *
 * @property int $id
 * @property int $cod_cotiza
 * @property int $clientes_id
 * @property int $vendedores_id
 * @property int $paquetes_id
 * @property double $monto
 * @property double $impuesto
 * @property double $descuento
 *
 * @property Clientes $clientes
 * @property Paquetes $paquetes
 * @property Vendedores $vendedores
 * @property CotizacionesHasProductos[] $cotizacionesHasProductos
 * @property Productos[] $productos
 */
class Cotizaciones extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'cotizaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['cod_cotiza'], 'unique','targetClass' =>  Cotizaciones::className(), 'message' => 'Ya se encuentra este codigo.'],
            [['cod_cotiza', 'clientes_id', 'vendedores_id', 'paquetes_id'], 'integer'],
            [['cod_cotiza', 'clientes_id', 'vendedores_id'], 'required'],
            [['monto', 'impuesto', 'descuento'], 'number'],
            [['clientes_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['clientes_id' => 'id']],
            [['paquetes_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paquetes::className(), 'targetAttribute' => ['paquetes_id' => 'id']],
            [['vendedores_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vendedores::className(), 'targetAttribute' => ['vendedores_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'cod_cotiza' => 'Codigo',
            'clientes_id' => 'Clientes',
            'vendedores_id' => 'Vendedor',
            'paquetes_id' => 'Paquetes',
            'monto' => 'Monto',
            'impuesto' => 'Impuesto',
            'descuento' => 'Descuento',
            'productos_id' => 'Productos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes() {
        return $this->hasOne(Clientes::className(), ['id' => 'clientes_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaquetes() {
        return $this->hasOne(Paquetes::className(), ['id' => 'paquetes_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendedores() {
        return $this->hasOne(Vendedores::className(), ['id' => 'vendedores_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizacionesHasProductos() {
        return $this->hasMany(CotizacionesHasProductos::className(), ['cotizaciones_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos() {
        return $this->hasMany(Productos::className(), ['id' => 'productos_id'])->viaTable('cotizaciones_has_productos', ['cotizaciones_id' => 'id']);
    }
   
    

}
