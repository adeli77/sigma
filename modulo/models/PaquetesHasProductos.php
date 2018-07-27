<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paquetes_has_productos".
 *
 * @property int $paquetes_id
 * @property int $productos_id
 *
 * @property Paquetes $paquetes
 * @property Productos $productos
 */
class PaquetesHasProductos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paquetes_has_productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productos_id'], 'required'],
            [['productos_id'], 'integer'],
            [['paquetes_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paquetes::className(), 'targetAttribute' => ['paquetes_id' => 'id']],
            [['productos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['productos_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'paquetes_id' => 'Paquetes ID',
            'productos_id' => 'Productos ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaquetes()
    {
        return $this->hasOne(Paquetes::className(), ['id' => 'paquetes_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasOne(Productos::className(), ['id' => 'productos_id']);
    }
}
