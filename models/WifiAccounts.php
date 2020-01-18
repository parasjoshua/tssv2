<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wifi_accounts".
 *
 * @property string $admission_number
 * @property string $password
 */
class WifiAccounts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $payroll_num,$department,$section,$name;
    public static function tableName()
    {
        return 'wifi_accounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password'], Yii::$app->user->isGuest ? "safe":"required"],
            [['admission_number'], "required"],
            [['admission_number'], 'string', 'max' => 10],
            [['password'], 'string', 'max' => 50],
            [['admission_number'], 'unique'],
            [['payroll_num','department','section','name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admission_number' => 'Admission Number',
            'password' => 'Password',
            'payroll_num' => 'Payroll Number',
        ];
    }
}
