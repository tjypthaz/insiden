<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Report as ReportModel;
use app\models\UserUnit;
use yii\web\ForbiddenHttpException;

/**
 * Report represents the model behind the search form of `app\models\Report`.
 */
class Report extends ReportModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_verifikasi', 'id_jenis', 'id_band', 'no1_1', 'no1_2', 'no1_3', 'no1_4', 'no2_1', 'no2_2', 'no2_3', 'no2_4', 'no2_5', 'no3_1', 'no3_2', 'no3_3', 'no3_4', 'no3_5', 'no3_6', 'no3_7', 'no3_8', 'no4_1', 'no4_2', 'no4_3', 'no4_4', 'no4_5', 'no4_6', 'no4_7', 'no4_8', 'no4_9', 'no5_1', 'no5_2', 'no5_3', 'no5_4', 'no5_5', 'no5_6', 'no5_7', 'no5_8', 'no6_1', 'no6_2', 'no6_3', 'no6_4', 'no6_5', 'no6_6', 'no6_7', 'no6_8', 'no6_9', 'no6_10', 'no7_1', 'no7_2', 'no7_3', 'no7_4', 'no7_5', 'no8_1', 'no8_2', 'no8_3', 'no8_4', 'no8_5', 'no8_6'], 'integer'],
            [['pelapor', 'norm', 'biaya', 'tanggal', 'id_unit', 'kronologi', 'no1_5', 'no2_6', 'no2_7', 'no3_9', 'no4_10', 'no5_9', 'no6_11', 'no7_6', 'no8_7', 'no9_1'], 'safe'],
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
        $query = ReportModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $attributes = array_keys($this->getTableSchema()->columns);

        $dataProvider->setSort([
            'attributes' => $attributes,
            'defaultOrder' => ['id' => SORT_DESC],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $findUserUnit = [];
        $userCek = Yii::$app->db
            ->createCommand("select * from auth_assignment where user_id = :id")
            ->bindValue(':id', Yii::$app->user->id)
            ->queryOne();
        if($userCek){
            if($userCek['item_name'] != 'pmkp'){
                $findUserUnit = UserUnit::find()->select(['id_unit'])
                    ->where(['id_user' => Yii::$app->user->id,'publish' => 1])
                    ->column();
                if(!$findUserUnit){
                    throw new ForbiddenHttpException('User Anda belum disetting Hak Akses');
                }
            }
        }
        else{
            throw new ForbiddenHttpException('Hak Akses belum di setting');
        }

        // echo "<pre>";
        // print_r($findUserUnit);
        // exit;

        if(empty($this->id_unit)){
            $query->andFilterWhere([
                'id_unit' => $findUserUnit,
            ]);
        }
        else{
            $query->andFilterWhere([
                'id_unit' => $this->id_unit,
            ]);
        }

        /*$query->andFilterWhere([
            'id_unit' => $userUnit,
        ]);*/

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_verifikasi' => $this->id_verifikasi,
            'id_jenis' => $this->id_jenis,
            //'id_unit' => $this->id_unit,
            'tanggal' => $this->tanggal,
            'id_band' => $this->id_band,
            'no1_1' => $this->no1_1,
            'no1_2' => $this->no1_2,
            'no1_3' => $this->no1_3,
            'no1_4' => $this->no1_4,
            'no2_1' => $this->no2_1,
            'no2_2' => $this->no2_2,
            'no2_3' => $this->no2_3,
            'no2_4' => $this->no2_4,
            'no2_5' => $this->no2_5,
            'no3_1' => $this->no3_1,
            'no3_2' => $this->no3_2,
            'no3_3' => $this->no3_3,
            'no3_4' => $this->no3_4,
            'no3_5' => $this->no3_5,
            'no3_6' => $this->no3_6,
            'no3_7' => $this->no3_7,
            'no3_8' => $this->no3_8,
            'no4_1' => $this->no4_1,
            'no4_2' => $this->no4_2,
            'no4_3' => $this->no4_3,
            'no4_4' => $this->no4_4,
            'no4_5' => $this->no4_5,
            'no4_6' => $this->no4_6,
            'no4_7' => $this->no4_7,
            'no4_8' => $this->no4_8,
            'no4_9' => $this->no4_9,
            'no5_1' => $this->no5_1,
            'no5_2' => $this->no5_2,
            'no5_3' => $this->no5_3,
            'no5_4' => $this->no5_4,
            'no5_5' => $this->no5_5,
            'no5_6' => $this->no5_6,
            'no5_7' => $this->no5_7,
            'no5_8' => $this->no5_8,
            'no6_1' => $this->no6_1,
            'no6_2' => $this->no6_2,
            'no6_3' => $this->no6_3,
            'no6_4' => $this->no6_4,
            'no6_5' => $this->no6_5,
            'no6_6' => $this->no6_6,
            'no6_7' => $this->no6_7,
            'no6_8' => $this->no6_8,
            'no6_9' => $this->no6_9,
            'no6_10' => $this->no6_10,
            'no7_1' => $this->no7_1,
            'no7_2' => $this->no7_2,
            'no7_3' => $this->no7_3,
            'no7_4' => $this->no7_4,
            'no7_5' => $this->no7_5,
            'no8_1' => $this->no8_1,
            'no8_2' => $this->no8_2,
            'no8_3' => $this->no8_3,
            'no8_4' => $this->no8_4,
            'no8_5' => $this->no8_5,
            'no8_6' => $this->no8_6,
        ]);

        $query->andFilterWhere(['like', 'pelapor', $this->pelapor])
            ->andFilterWhere(['like', 'norm', $this->norm])
            ->andFilterWhere(['like', 'biaya', $this->biaya])
            ->andFilterWhere(['like', 'kronologi', $this->kronologi])
            ->andFilterWhere(['like', 'no1_5', $this->no1_5])
            ->andFilterWhere(['like', 'no2_6', $this->no2_6])
            ->andFilterWhere(['like', 'no2_7', $this->no2_7])
            ->andFilterWhere(['like', 'no3_9', $this->no3_9])
            ->andFilterWhere(['like', 'no4_10', $this->no4_10])
            ->andFilterWhere(['like', 'no5_9', $this->no5_9])
            ->andFilterWhere(['like', 'no6_11', $this->no6_11])
            ->andFilterWhere(['like', 'no7_6', $this->no7_6])
            ->andFilterWhere(['like', 'no8_7', $this->no8_7])
            ->andFilterWhere(['like', 'no9_1', $this->no9_1]);
        /*echo "<pre>";
        print_r($dataProvider);
        exit;*/
        return $dataProvider;
    }
}
