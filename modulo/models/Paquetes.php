<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paquetes".
 *
 * @property int $id
 * @property string $id_paq
 * @property string $desc_paq
 * @property double $descuento
 * @property int $activo
 *
 * @property Cotizaciones[] $cotizaciones
 * @property PaquetesHasProductos[] $paquetesHasProductos
 * @property Productos[] $productos
 */
class Paquetes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paquetes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descuento'], 'number'],
            [['activo'], 'integer'],
            [['id', 'nom_paq'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nom_paq' => 'Descripcion',
            'descuento' => 'Descuento',
            'activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizaciones()
    {
        return $this->hasMany(Cotizaciones::className(), ['paquetes_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaquetesHasProductos()
    {
        return $this->hasMany(PaquetesHasProductos::className(), ['paquetes_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::className(), ['id' => 'productos_id'])->viaTable('paquetes_has_productos', ['paquetes_id' => 'id']);
    }
}
