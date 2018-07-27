<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id
 * @property string $nom_cli
 * @property string $ruc_cli
 * @property string $dir_cli
 * @property string $tel_cli
 *
 * @property Cotizaciones[] $cotizaciones
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom_cli', 'dir_cli', 'tel_cli'], 'string', 'max' => 45],
            [['ruc_cli'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nom_cli' => 'Nombres',
            'ruc_cli' => 'RUC',
            'dir_cli' => 'Direccion',
            'tel_cli' => 'Telefono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizaciones()
    {
        return $this->hasMany(Cotizaciones::className(), ['clientes_id' => 'id']);
    }
}
