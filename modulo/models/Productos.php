<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property string $cod_prod
 * @property string $desc_prod
 * @property string $tipo_prod
 * @property double $monto
 * @property int $impuesto
 *
 * @property CotizacionesHasProductos[] $cotizacionesHasProductos
 * @property Cotizaciones[] $cotizaciones
 * @property PaquetesHasProductos[] $paquetesHasProductos
 * @property Paquetes[] $paquetes
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['monto'], 'number'],
            [['impuesto'], 'integer'],
            [['cod_prod'], 'string', 'max' => 8],
            [['desc_prod', 'tipo_prod'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cod_prod' => 'Codigo',
            'desc_prod' => 'Descripcion',
            'tipo_prod' => 'Tipo Producto',
            'monto' => 'Monto',
            'impuesto' => 'Impuesto (1,0)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizacionesHasProductos()
    {
        return $this->hasMany(CotizacionesHasProductos::className(), ['productos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizaciones()
    {
        return $this->hasMany(Cotizaciones::className(), ['id' => 'cotizaciones_id'])->viaTable('cotizaciones_has_productos', ['productos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaquetesHasProductos()
    {
        return $this->hasMany(PaquetesHasProductos::className(), ['productos_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaquetes()
    {
        return $this->hasMany(Paquetes::className(), ['id' => 'paquetes_id'])->viaTable('paquetes_has_productos', ['productos_id' => 'id']);
    }
}
