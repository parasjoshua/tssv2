<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phone_locals".
 *
 * @property int $phone_id
 * @property string $department
 * @property string $section
 * @property string $localnum
 */
class PhoneLocals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phone_locals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department', 'localnum'], 'required'],
            [['department', 'section', 'localnum', 'conperson'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'phone_id' => 'ID',
            'department' => 'Department',
            'section' => 'Section',
            'localnum' => 'Local number/s',
            'departments.name' => 'Department',
            'sections.name' => 'Section',
            'conperson' => 'Supervisor/Head',
            
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
