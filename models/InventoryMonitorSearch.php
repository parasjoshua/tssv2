<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InventoryMonitor;

/**
 * InventoryMonitorSearch represents the model behind the search form of `app\models\InventoryMonitor`.
 */
class InventoryMonitorSearch extends InventoryMonitor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['brand', 'model', 'description', 'serial_number', 'inventory_number', 'date_of_purchased', 'accountability', 'inventory_computer_id'], 'safe'],
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
        $query = InventoryMonitor::find();

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
        
        $query->joinWith('employees');
        $query->joinWith('inventorycomputer');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date_of_purchased' => $this->date_of_purchased,
        ]);

        $query->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'serial_number', $this->serial_number])
            ->andFilterWhere(['like', 'employee.employee_name', $this->accountability])
            ->andFilterWhere(['like', 'CONCAT(inventory_computer.brand,inventory_computer.serial_number)', $this->inventory_computer_id])
            ->andFilterWhere(['like', 'inventory_number', $this->inventory_number]);

        return $dataProvider;
    }
}
