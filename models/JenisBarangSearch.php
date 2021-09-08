<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JenisBarang;

/**
 * JenisBarangSearch represents the model behind the search form about `app\models\JenisBarang`.
 */
class JenisBarangSearch extends JenisBarang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_jenis_barang', 'kode_barang', 'nama_jenis_barang'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = JenisBarang::find();

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
        $query->andFilterWhere(['like', 'kode_jenis_barang', $this->kode_jenis_barang])
            ->andFilterWhere(['like', 'kode_barang', $this->kode_barang])
            ->andFilterWhere(['like', 'nama_jenis_barang', $this->nama_jenis_barang]);

        return $dataProvider;
    }
}
