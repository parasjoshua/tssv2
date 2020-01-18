<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "section".
 *
 * @property int $id
 * @property int $department_id
 * @property string $abbr
 * @property string $name
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_id', 'abbr', 'name'], 'required'],
            [['department_id'], 'integer'],
            [['abbr'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department_id' => 'Department ID',
            'abbr' => 'Abbr',
            'name' => 'Name',
        ];
    }

    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['department_id' => 'id']);
    }
}
