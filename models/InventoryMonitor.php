<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory_monitor".
 *
 * @property int $id
 * @property string $brand
 * @property string $model
 * @property string $description
 * @property string $serial_number
 * @property string $inventory_number
 * @property string $date_of_purchased
 * @property int $accountability
 * @property int $inventory_computer_id
 */
class InventoryMonitor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory_monitor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand', 'model', 'description', 'serial_number', 'inventory_number', 'date_of_purchased'], 'required'],
            [['date_of_purchased'], 'safe'],
            [['accountability', 'inventory_computer_id'], 'integer'],
            [['brand', 'model', 'serial_number', 'inventory_number'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
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
            'description' => 'Sticker Number',
            'serial_number' => 'Serial Number',
            'inventory_number' => 'Inventory Number',
            'date_of_purchased' => 'Date Of Purchased',
            'accountability' => 'Accountability',
            'inventory_computer_id' => 'Assigned to Computer',
            'inventorycomputer.brandserial' => 'Assigned to Computer',
            'employees.employee_name' => 'Accountability',
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
