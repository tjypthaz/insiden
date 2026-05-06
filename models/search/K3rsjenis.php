<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\K3rsjenis as K3rsjenisModel;

/**
 * K3rsjenis represents the model behind the search form of `app\models\K3rsjenis`.
 */
class K3rsjenis extends K3rsjenisModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'publish', 'createdBy', 'modifiedBy'], 'integer'],
            [['nama', 'createdDate', 'modifiedDate'], 'safe'],
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
        $query = K3rsjenisModel::find();

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
            'publish' => $this->publish,
            'createdBy' => $this->createdBy,
            'createdDate' => $this->createdDate,
            'modifiedBy' => $this->modifiedBy,
            'modifiedDate' => $this->modifiedDate,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama]);

        return $dataProvider;
    }
}
