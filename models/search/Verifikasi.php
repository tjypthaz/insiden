<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Verifikasi as VerifikasiModel;

/**
 * Verifikasi represents the model behind the search form of `app\models\Verifikasi`.
 */
class Verifikasi extends VerifikasiModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_verifikator', 'id_band', 'id_jenis', 'aktivasi', 'investigasi', 'tindak_lanjut', 'publish', 'created_by', 'updated_by'], 'integer'],
            [['kesimpulan', 'created_date', 'updated_date'], 'safe'],
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
        $query = VerifikasiModel::find();

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
            'id_verifikator' => $this->id_verifikator,
            'id_band' => $this->id_band,
            'id_jenis' => $this->id_jenis,
            'aktivasi' => $this->aktivasi,
            'investigasi' => $this->investigasi,
            'tindak_lanjut' => $this->tindak_lanjut,
            'publish' => $this->publish,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'kesimpulan', $this->kesimpulan]);

        return $dataProvider;
    }
}
