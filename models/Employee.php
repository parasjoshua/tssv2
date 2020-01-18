<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $employee_count
 * @property string $payroll_number
 * @property string $employee_name
 * @property string $department
 * @property string $section
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payroll_number', 'employee_name', 'department', 'section'], 'required'],
            [['department', 'section'], 'integer'],
            [['payroll_number'], 'unique'],
            [['payroll_number', 'employee_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employee_count' => 'Employee Count',
            'payroll_number' => 'Payroll Number',
            'employee_name' => 'Employee Name',
            'department' => 'Department',
            'section' => 'Section',
            'departments.name' => 'Department',
            'sections.name' => 'Section',
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
}
