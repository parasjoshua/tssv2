<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form of `app\models\Activity`.
 */
class ActivitySearch extends Activity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activity_num'], 'integer'],
            [['date', 'time', 'details', 'department', 'section', 'status'], 'safe'],
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
        $query = Activity::find();

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
            'activity_num' => $this->activity_num,
        ]);

        $query->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'time', $this->time])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'department.name', $this->department])
            ->andFilterWhere(['like', 'section.name', $this->section])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
