<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CallsReport;

/**
 * CallsReportSearcg represents the model behind the search form of `app\models\CallsReport`.
 */
class CallsReportSearcg extends CallsReport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'admission_number'], 'integer'],
            [['department_id', 'section_id','type_of_report', 'status', 'concern', 'name'], 'safe'],
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
        $query = CallsReport::find();

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


        $query->joinWith('departments');
        $query->joinWith('sections');
        $query->joinWith('employees');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'admission_number' => $this->admission_number,
        ]);

        $query->andFilterWhere(['like', 'type_of_report', $this->type_of_report])
            ->andFilterWhere(['like', 'department.name', $this->department_id])
            ->andFilterWhere(['like', 'section.name', $this->section_id])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'concern', $this->concern])
            ->andFilterWhere(['like', 'employee.employee_name', $this->name]);

        return $dataProvider;
    }
}
