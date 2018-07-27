<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cotizaciones_has_productos".
 *
 * @property int $cotizaciones_id
 * @property int $productos_id
 *
 * @property Cotizaciones $cotizaciones
 * @property Productos $productos
 */
class CotizacionesHasProductos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cotizaciones_has_productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cotizaciones_id', 'productos_id'], 'required'],
            [['cotizaciones_id', 'productos_id'], 'integer'],
            [['cotizaciones_id', 'productos_id'], 'unique', 'targetAttribute' => ['cotizaciones_id', 'productos_id']],
            [['cotizaciones_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cotizaciones::className(), 'targetAttribute' => ['cotizaciones_id' => 'id']],
            [['productos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['productos_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cotizaciones_id' => 'Cotizaciones ID',
            'productos_id' => 'Productos ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizaciones()
    {
        return $this->hasOne(Cotizaciones::className(), ['id' => 'cotizaciones_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasOne(Productos::className(), ['id' => 'productos_id']);
    }
}
