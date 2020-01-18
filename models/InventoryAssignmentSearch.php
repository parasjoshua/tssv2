<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InventoryAssignment;

/**
 * InventoryAssignmentSearch represents the model behind the search form of `app\models\InventoryAssignment`.
 */
class InventoryAssignmentSearch extends InventoryAssignment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'inventory_computer_id', 'department', 'section'], 'integer'],
            [['building', 'floor'], 'safe'],
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
        $query = InventoryAssignment::find();

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
            'inventory_computer_id' => $this->inventory_computer_id,
            'department' => $this->department,
            'section' => $this->section,
        ]);

        $query->andFilterWhere(['like', 'building', $this->building])
            ->andFilterWhere(['like', 'floor', $this->floor]);

        return $dataProvider;
    }
}
