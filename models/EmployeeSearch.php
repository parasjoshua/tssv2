<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form of `app\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_count'], 'integer'],
            [['payroll_number', 'employee_name', 'department', 'section'], 'safe'],
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
        $query = Employee::find()->orderBy(['employee_count' => SORT_ASC]);
        

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

        // grid filtering conditions
        $query->andFilterWhere([
            'employee_count' => $this->employee_count,
        ]);

        $query->andFilterWhere(['like', 'payroll_number', $this->payroll_number])
            ->andFilterWhere(['like', 'employee_name', $this->employee_name])
            ->andFilterWhere(['like', 'department.name', $this->department])
            ->andFilterWhere(['like', 'section.name', $this->section]);

        return $dataProvider;
    }
}
