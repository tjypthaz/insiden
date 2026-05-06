<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ReportInvestigasi as ReportInvestigasiModel;

/**
 * ReportInvestigasi represents the model behind the search form of `app\models\ReportInvestigasi`.
 */
class ReportInvestigasi extends ReportInvestigasiModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_band', 'id_report', 'publish', 'created_by', 'updated_by'], 'integer'],
            [['penyebab', 'akar', 'rekomendasi', 'created_date', 'updated_date'], 'safe'],
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
        $query = ReportInvestigasiModel::find();

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
            'id_report' => $this->id_report,
            'publish' => $this->publish,
            'id_band' => $this->id_band,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'penyebab', $this->penyebab])
            ->andFilterWhere(['like', 'akar', $this->akar])
            ->andFilterWhere(['like', 'rekomendasi', $this->rekomendasi]);

        return $dataProvider;
    }
}
