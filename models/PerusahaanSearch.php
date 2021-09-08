<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Perusahaan;

/**
 * PerusahaanSearch represents the model behind the search form about `app\models\Perusahaan`.
 */
class PerusahaanSearch extends Perusahaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_perusahaan', 'nama_perusahaan', 'alamat_perusahaan'], 'safe'],
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
        $query = Perusahaan::find();

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
        $query->andFilterWhere(['like', 'kode_perusahaan', $this->kode_perusahaan])
            ->andFilterWhere(['like', 'nama_perusahaan', $this->nama_perusahaan])
            ->andFilterWhere(['like', 'alamat_perusahaan', $this->alamat_perusahaan]);

        return $dataProvider;
    }
}
