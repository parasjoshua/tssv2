<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wifi_search_logs".
 *
 * @property int $id
 * @property int $payroll_number
 * @property string $employee_name
 * @property string $department
 * @property string $section
 * @property string $admission_number
 * @property string $date
 */
class WifiSearchLogs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wifi_search_logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payroll_number', 'employee_name', 'department', 'section', 'admission_number', 'date'], 'required'],
            [['payroll_number'], 'integer'],
            [['date'], 'safe'],
            [['employee_name', 'department', 'section', 'admission_number'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payroll_number' => 'Payroll Number',
            'employee_name' => 'Employee Name',
            'department' => 'Department',
            'section' => 'Section',
            'admission_number' => 'Admission Number',
            'date' => 'Date',
        ];
    }
}
