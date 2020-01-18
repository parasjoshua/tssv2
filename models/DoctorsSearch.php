<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Doctors;

/**
 * DoctorsSearch represents the model behind the search form of `app\models\Doctors`.
 */
class DoctorsSearch extends Doctors
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','status'], 'integer'],
            [['lastname', 'firstname','midname','chinesename', 'room', 'localnum', 'department', 'specialization', 'schedule', 'contactnum','remarks'], 'safe'],
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
        $query = Doctors::find()->orderBy(['id' => SORT_ASC]);
        $query = Doctors::find()->orderBy(['status' => SORT_ASC]);

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
        ]);

        $query->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'midname', $this->midname])
            ->andFilterWhere(['like', 'chinesename', $this->chinesename])
            ->andFilterWhere(['like', 'room', $this->room])
            ->andFilterWhere(['like', 'localnum', $this->localnum])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'specialization', $this->specialization])
            ->andFilterWhere(['like', 'schedule', $this->schedule])
            ->andFilterWhere(['like', 'contactnum', $this->contactnum]);

        return $dataProvider;
    }
}
