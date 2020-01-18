<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory_avr".
 *
 * @property int $id
 * @property string $brand
 * @property string $model
 * @property string $serial_number
 * @property string $inventory_number
 * @property string $sticker_number
 * @property string $date_of_purchased
 * @property int $accountability
 * @property int $inventory_computer_id
 */
class InventoryAvr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory_avr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand', 'model', 'serial_number', 'inventory_number', 'sticker_number', 'date_of_purchased'], 'required'],
            [['date_of_purchased'], 'safe'],
            [['accountability', 'inventory_computer_id'], 'integer'],
            [['brand', 'model', 'serial_number', 'inventory_number', 'sticker_number'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand' => 'Brand',
            'model' => 'Model',
            'serial_number' => 'Serial Number',
            'inventory_number' => 'Inventory Number',
            'sticker_number' => 'Sticker Number',
            'date_of_purchased' => 'Date Of Purchased',
            'accountability' => 'Accountability',
            'inventory_computer_id' => 'Assigned to Computer',
            'inventorycomputer.brandserial' => 'Assigned to Computer',
        ];
    }

    public function getInventorycomputer()
    {
        return $this->hasOne(InventoryComputer::className(), ['id' => 'inventory_computer_id']);
    }

    public function getEmployees()
    {
        return $this->hasOne(Employee::className(), ['payroll_number' => 'accountability']);
    }
}
