<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicereport".
 *
 * @property int $servicereportnum
 * @property string $name
 * @property int $payroll_num
 * @property string $department
 * @property string $section
 * @property string $datereceived
 * @property string $datecomplete
 * @property string $timereceived
 * @property string $timecomplete
 * @property string $typeofservice
 * @property string $problem
 * @property string $actiontaken
 * @property string $status
 * @property string $signatureofuser
 * @property string $tssrepresentative
 */
class Servicereport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servicereport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'payroll_num', 'department', 'typeofservice'], 'required'],
            [['payroll_num'], 'integer'],
            [['status','installation_report','quantity','installation_report_status','description','tag_number_serial_number'], 'string'],
            [['name', 'datereceived', 'datecomplete', 'timereceived', 'timecomplete', 'typeofservice',  'actiontaken','remarks', 'signatureofuser', 'tssrepresentative'], 'string', 'max' => 500],
            [['department', 'section','problem','installation_descrip'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'servicereportnum' => 'ID',
            'name' => 'Employee Name',
            'payroll_num' => 'Payroll Number',
            'department' => 'Department',
            'section' => 'Section',
            'datereceived' => 'Date Received',
            'datecomplete' => 'Date Completed',
            'timereceived' => 'Time Received',
            'timecomplete' => 'Time Completed',
            'typeofservice' => 'Type of service',
            'problem' => 'Problem / Concern / Request',
            'actiontaken' => 'Action taken',
            'remarks' => 'Remarks',
            'status' => 'Status',
            'signatureofuser' => 'Signature of user',
            'tssrepresentative' => 'TSS Representative',
            'installation_report' => 'Type',
            'tag_number_serial_number' => 'Tag Number | Serial Number',
            'installation_report_status' => 'Status',
        ];
    }
}
