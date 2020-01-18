<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PhoneLocals;

/**
 * PhoneLocalsSearch represents the model behind the search form of `app\models\PhoneLocals`.
 */
class PhoneLocalsSearch extends PhoneLocals
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone_id'], 'integer'],
            [['department', 'section', 'localnum', 'conperson'], 'safe'],
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
        $query = PhoneLocals::find()->orderBy(['phone_id' => SORT_ASC]);

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
            'phone_id' => $this->phone_id,
        ]);

        $query->andFilterWhere(['like', 'department.name', $this->department])
            ->andFilterWhere(['like', 'section.name', $this->section])
            ->andFilterWhere(['like', 'localnum', $this->localnum]);
            
            

        return $dataProvider;
    }
}
