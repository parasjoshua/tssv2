<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory_assignment".
 *
 * @property int $id
 * @property string $building
 * @property string $floor
 * @property int $inventory_computer_id
 * @property int $department
 * @property int $section
 */
class InventoryAssignment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory_assignment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['building', 'floor', 'inventory_computer_id', 'department', 'section'], 'required'],
            [['inventory_computer_id', 'department', 'section'], 'integer'],
            [['building', 'floor'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'building' => 'Building',
            'floor' => 'Floor',
            'inventory_computer_id' => 'Inventory Computer ID',
            'departments.name' => 'Department',
            'sections.name' => 'Section',
            'inventorycomputer.brandserial' => 'Computer Name / Brand & Serial',
        ];
    }

    public function getDepartments()
    {
        return $this->hasOne(Department::className(), ['id' => 'department']);
    }

    public function getSections()
    {
        return $this->hasOne(Section::className(), ['id' => 'section']);
    }

    public function getInventorycomputer()
    {
        return $this->hasOne(InventoryComputer::className(), ['id' => 'inventory_computer_id']);
    }
}
