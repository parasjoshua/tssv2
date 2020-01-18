<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VerseOfTheDay;

/**
 * VerseOfTheDaySearch represents the model behind the search form of `app\models\VerseOfTheDay`.
 */
class VerseOfTheDaySearch extends VerseOfTheDay
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_votd'], 'integer'],
            [['bible_verse', 'bible_verse_desc', 'totd', 'date'], 'safe'],
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
        $query = VerseOfTheDay::find();

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
            'id_votd' => $this->id_votd,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'bible_verse', $this->bible_verse])
            ->andFilterWhere(['like', 'bible_verse_desc', $this->bible_verse_desc])
            ->andFilterWhere(['like', 'totd', $this->totd]);

        return $dataProvider;
    }
}
