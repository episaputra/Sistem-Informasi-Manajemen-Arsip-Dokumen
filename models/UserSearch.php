<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */

    public $globalSearch;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nama', 'username', 'password', 'authKey', 'password_reset_token', 'user_level', 'globalSearch'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'globalSearch' => 'Cari :',
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
        $query = User::find();

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
        ]);

        $query->orFilterWhere(['like', 'nama', $this->globalSearch])
            ->orFilterWhere(['like', 'username', $this->globalSearch])
            ->orFilterWhere(['like', 'user_level', $this->globalSearch]);

        return $dataProvider;
    }
}
