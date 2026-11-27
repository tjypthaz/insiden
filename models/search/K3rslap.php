<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\K3rslap as K3rslapModel;

/**
 * K3rslap represents the model behind the search form of `app\models\K3rslap`.
 */
class K3rslap extends K3rslapModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'jenisInsiden', 'publish', 'createdBy', 'modifiedBy'], 'integer'],
            [['namaTerlapor', 'statusKorban', 'lokasiKejadian', 'tglJamKejadian', 'kronologis', 'tindakanKejadian', 'penerimaLaporan', 'tglPenerima', 'createdDate', 'modifiedDate'], 'safe'],
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
        $query = K3rslapModel::find();

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
            'statusKorban' => $this->statusKorban,
            'tglJamKejadian' => $this->tglJamKejadian,
            'jenisInsiden' => $this->jenisInsiden,
            'tglPenerima' => $this->tglPenerima,
            'publish' => $this->publish,
            'createdBy' => $this->createdBy,
            'createdDate' => $this->createdDate,
            'modifiedBy' => $this->modifiedBy,
            'modifiedDate' => $this->modifiedDate,
        ]);

        $query->andFilterWhere(['like', 'namaTerlapor', $this->namaTerlapor])
            ->andFilterWhere(['like', 'lokasiKejadian', $this->lokasiKejadian])
            ->andFilterWhere(['like', 'kronologis', $this->kronologis])
            ->andFilterWhere(['like', 'tindakanKejadian', $this->tindakanKejadian])
            ->andFilterWhere(['like', 'penerimaLaporan', $this->penerimaLaporan]);

        return $dataProvider;
    }
}
