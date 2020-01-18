<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $activity_num
 * @property string $date
 * @property string $time
 * @property string $details
 * @property string $department
 * @property string $section
 * @property string $status
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'time', 'details', 'department', 'status'], 'required'],
            [['date', 'time', 'department', 'section', 'status'], 'string', 'max' => 100],
            [['details'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'activity_num' => 'Activity Num',
            'date' => 'Date',
            'time' => 'Time',
            'details' => 'Details',
            'department' => 'Department',
            'section' => 'Section',
            'status' => 'Status',
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
