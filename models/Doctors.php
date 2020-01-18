<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctors".
 *
 * @property int $id
 * @property string $lastname
 * @property string $firstname
 * @property string $room
 * @property string $localnum
 * @property string $department
 * @property string $specialization
 * @property string $schedule
 * @property string $contactnum
 */
class Doctors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lastname', 'firstname','midname','chinesename', 'room', 'localnum', 'department', 'specialization', 'schedule', 'contactnum','remarks'], 'required'],
            [['lastname', 'firstname','midname','chinesename', 'room', 'localnum', 'department', 'specialization', 'schedule', 'contactnum','remarks'], 'string', 'max' => 100],
            [['status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lastname' => 'Last name',
            'firstname' => 'First name',
            'midname' => 'Middle name',
            'chinesename' => 'Chinese name',
            'room' => 'Room',
            'localnum' => 'Localnumber',
            'department' => 'Department',
            'specialization' => 'Specialization',
            'schedule' => 'Schedule',
            'contactnum' => 'Contact #',
            'remarks' => 'Remarks',
        ];
    }
}
