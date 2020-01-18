<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InventoryComputer;

/**
 * InventoryComputerSearch represents the model behind the search form of `app\models\InventoryComputer`.
 */
class InventoryComputerSearch extends InventoryComputer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'accountability'], 'integer'],
            [['brand', 'model_description', 'serial_number', 'inventory_number', 'sticker_number', 'date_of_purchased', 'storage', 'ram', 'ip_address', 'usb', 'office_suite_version', 'office_suite_liscense_type', 'office_suite_product_key', 'operating_system_name_version', 'operating_system_license_type', 'operating_system_product_key', 'antivirus_name_version', 'antivirus_license_type', 'antivirus_product_key'], 'safe'],
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
        $query = InventoryComputer::find();

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
            'accountability' => $this->accountability,
        ]);

        $query->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'model_description', $this->model_description])
            ->andFilterWhere(['like', 'serial_number', $this->serial_number])
            ->andFilterWhere(['like', 'inventory_number', $this->inventory_number])
            ->andFilterWhere(['like', 'sticker_number', $this->sticker_number])
            ->andFilterWhere(['like', 'date_of_purchased', $this->date_of_purchased])
            ->andFilterWhere(['like', 'storage', $this->storage])
            ->andFilterWhere(['like', 'ram', $this->ram])
            ->andFilterWhere(['like', 'ip_address', $this->ip_address])
            ->andFilterWhere(['like', 'usb', $this->usb])
            ->andFilterWhere(['like', 'office_suite_version', $this->office_suite_version])
            ->andFilterWhere(['like', 'office_suite_liscense_type', $this->office_suite_liscense_type])
            ->andFilterWhere(['like', 'office_suite_product_key', $this->office_suite_product_key])
            ->andFilterWhere(['like', 'operating_system_name_version', $this->operating_system_name_version])
            ->andFilterWhere(['like', 'operating_system_license_type', $this->operating_system_license_type])
            ->andFilterWhere(['like', 'operating_system_product_key', $this->operating_system_product_key])
            ->andFilterWhere(['like', 'antivirus_name_version', $this->antivirus_name_version])
            ->andFilterWhere(['like', 'antivirus_license_type', $this->antivirus_license_type])
            ->andFilterWhere(['like', 'antivirus_product_key', $this->antivirus_product_key]);

        return $dataProvider;
    }
}
