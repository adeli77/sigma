<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendedores".
 *
 * @property int $id
 * @property string $nom_vend
 * @property string $ruc_vend
 * @property string $tel_vend
 *
 * @property Cotizaciones[] $cotizaciones
 */
class Vendedores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendedores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['nom_vend'], 'string', 'max' => 45],
            [['ruc_vend'], 'string', 'max' => 10],
            [['tel_vend'], 'string', 'max' => 8],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nom_vend' => 'Nombres',
            'ruc_vend' => 'RUC',
            'tel_vend' => 'Telefono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizaciones()
    {
        return $this->hasMany(Cotizaciones::className(), ['vendedores_id' => 'id']);
    }
}
