<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserUnit as UserUnitModel;

/**
 * UserUnit represents the model behind the search form of `app\models\UserUnit`.
 */
class UserUnit extends UserUnitModel
{
    public $namaUser;
    public $namaUnit;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_unit', 'publish', 'created_by', 'updated_by'], 'integer'],
            [['created_date', 'namaUser', 'namaUnit', 'updated_date'], 'safe'],
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
        $query = UserUnitModel::find()
            ->joinWith('user')
            ->joinWith('unit');

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

        $query->andWhere(['user_unit.publish' => 1]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'user.name', $this->namaUser])
            ->andFilterWhere(['like', 'unit.nama', $this->namaUnit]);

        return $dataProvider;
    }
}
