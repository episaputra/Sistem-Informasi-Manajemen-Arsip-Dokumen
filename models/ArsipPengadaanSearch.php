<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ArsipPengadaan;

/**
 * ArsipPengadaanSearch represents the model behind the search form about `app\models\ArsipPengadaan`.
 */
class ArsipPengadaanSearch extends ArsipPengadaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor_kontrak', 'kode_jenis_pengadaan', 'judul_kontrak', 'kode_perusahaan', 'tanggal_kontrak'], 'safe'],
            [['nilai_RAB', 'harga_nego'], 'number'],
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
        $query = ArsipPengadaan::find();

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
            'nilai_RAB' => $this->nilai_RAB,
            'harga_nego' => $this->harga_nego,
            'tanggal_kontrak' => $this->tanggal_kontrak,
        ]);

        $query->andFilterWhere(['like', 'nomor_kontrak', $this->nomor_kontrak])
            ->andFilterWhere(['like', 'kode_jenis_pengadaan', $this->kode_jenis_pengadaan])
            ->andFilterWhere(['like', 'judul_kontrak', $this->judul_kontrak])
            ->andFilterWhere(['like', 'kode_perusahaan', $this->kode_perusahaan]);

        return $dataProvider;
    }
}
