<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ArsipSdm;

/**
 * ArsipSdmSearch represents the model behind the search form about `app\models\ArsipSdm`.
 */
class ArsipSdmSearch extends ArsipSdm
{
    /**
     * @inheritdoc
     */

    public $globalSearch;

    public function rules()
    {
        return [
            [['nip', 'kode_kategori', 'no_dokumen', 'nama_dokumen', 'keterangan', 'file', 'globalSearch', 'jumlah'], 'safe'],
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
        $query = ArsipSdm::find()->distinct();

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
        $query->andFilterWhere(['like', 'nip', $this->nip])
            ->andFilterWhere(['like', 'kode_kategori', $this->kode_kategori])
            ->andFilterWhere(['like', 'no_dokumen', $this->no_dokumen])
            ->andFilterWhere(['like', 'nama_dokumen', $this->nama_dokumen])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
    
    public function search2($params, $nip)
    {
        $query = ArsipSdm::find()->where(['nip' => $nip]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query -> joinWith('kodeKategori');

        // grid filtering conditions
        $query->andFilterWhere(['like', 'nip', $this->nip])
            ->andFilterWhere(['like', 'kategori_dokumen.nama_kategori', $this->kode_kategori])
            //->andFilterWhere(['like', 'kode_kategori', $this->kode_kategori])
            ->andFilterWhere(['like', 'no_dokumen', $this->no_dokumen])
            ->andFilterWhere(['like', 'nama_dokumen', $this->nama_dokumen]);

        return $dataProvider;
    }

}
