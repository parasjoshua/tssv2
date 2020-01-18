<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calls_report".
 *
 * @property int $id
 * @property string $type_of_report
 * @property int $department_id
 * @property int $section_id
 * @property string $status
 * @property string $concern
 * @property string $name
 * @property int $admission_number
 */
class CallsReport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calls_report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_of_report', 'department_id', 'status', 'concern', 'name'], 'required'],
            [['type_of_report', 'status'], 'string'],
            [['department_id', 'section_id', 'admission_number'], 'integer'],
            [['name'], 'integer'],
            [['concern'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_of_report' => 'Type Of Report',
            'department_id' => 'Department',
            'section_id' => 'Section',
            'departments.name' => 'Department',
            'sections.name' => 'Section',
            'status' => 'Status',
            'concern' => 'Concern',
            'name' => 'Reported By',
            'admission_number' => 'Admission Number',
        ];
    }

    public function getDepartments()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    public function getSections()
    {
        return $this->hasOne(Section::className(), ['id' => 'section_id']);
    }

    public function getEmployees()
    {
        return $this->hasOne(Employee::className(), ['payroll_number' => 'name']);
    }
}
