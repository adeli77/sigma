<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cotizaciones;

/**
 * CotizacionesSearch represents the model behind the search form of `app\models\Cotizaciones`.
 */
class CotizacionesSearch extends Cotizaciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cod_cotiza', 'clientes_id', 'vendedores_id', 'paquetes_id'], 'integer'],
            [['monto', 'impuesto', 'descuento'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Cotizaciones::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cod_cotiza' => $this->cod_cotiza,
            'clientes_id' => $this->clientes_id,
            'vendedores_id' => $this->vendedores_id,
            'paquetes_id' => $this->paquetes_id,
            'monto' => $this->monto,
            'impuesto' => $this->impuesto,
            'descuento' => $this->descuento,
        ]);

        return $dataProvider;
    }
}
