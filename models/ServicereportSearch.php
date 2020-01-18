<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Servicereport;

/**
 * ServicereportSearch represents the model behind the search form of `app\models\Servicereport`.
 */
class ServicereportSearch extends Servicereport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['servicereportnum', 'payroll_num'], 'integer'],
            [['name', 'department', 'section', 'datereceived', 'datecomplete', 'timereceived', 'timecomplete', 'typeofservice', 'problem','actiontaken', 'status', 'signatureofuser', 'tssrepresentative'], 'safe'],
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
        $query = Servicereport::find()->orderBy(['servicereportnum' => SORT_DESC]);
        

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
            'servicereportnum' => $this->servicereportnum,
            'payroll_num' => $this->payroll_num,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'section', $this->section])
            ->andFilterWhere(['like', 'datereceived', $this->datereceived])
            ->andFilterWhere(['like', 'datecomplete', $this->datecomplete])
            ->andFilterWhere(['like', 'timereceived', $this->timereceived])
            ->andFilterWhere(['like', 'timecomplete', $this->timecomplete])
            ->andFilterWhere(['like', 'typeofservice', $this->typeofservice])
            ->andFilterWhere(['like', 'problem', $this->problem])
            ->andFilterWhere(['like', 'actiontaken', $this->actiontaken])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'signatureofuser', $this->signatureofuser])
            ->andFilterWhere(['like', 'tssrepresentative', $this->tssrepresentative]);

        return $dataProvider;
    }
}
