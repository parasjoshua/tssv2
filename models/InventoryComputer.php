<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory_computer".
 *
 * @property int $id
 * @property string $brand
 * @property string $model_description
 * @property string $serial_number
 * @property string $inventory_number
 * @property string $sticker_number
 * @property string $date_of_purchased
 * @property int $accountability
 * @property string $storage
 * @property string $ram
 * @property string $ip_address
 * @property string $usb
 * @property string $office_suite_version
 * @property string $office_suite_liscense_type
 * @property string $office_suite_product_key
 * @property string $operating_system_name_version
 * @property string $operating_system_license_type
 * @property string $operating_system_product_key
 * @property string $antivirus_name_version
 * @property string $antivirus_license_type
 * @property string $antivirus_product_key
 */
class InventoryComputer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory_computer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand', 'model_description', 'serial_number', 'inventory_number', 'sticker_number', 'date_of_purchased', 'accountability', 'storage', 'ram', 'ip_address', 'usb', 'office_suite_version', 'office_suite_liscense_type', 'operating_system_name_version', 'operating_system_license_type', 'antivirus_name_version', 'antivirus_license_type'], 'required'],
            [['accountability'], 'integer'],
            [['usb', 'office_suite_liscense_type', 'operating_system_license_type', 'antivirus_license_type'], 'string'],
            [['brand', 'model_description', 'serial_number', 'inventory_number', 'sticker_number', 'date_of_purchased', 'storage', 'ram', 'ip_address', 'office_suite_version', 'office_suite_product_key', 'operating_system_name_version', 'operating_system_product_key', 'antivirus_name_version', 'antivirus_product_key'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand' => 'Computer Name / Brand',
            'model_description' => 'Model / Description',
            'serial_number' => 'Serial Number',
            'inventory_number' => 'Inventory Number',
            'sticker_number' => 'Sticker Number',
            'date_of_purchased' => 'Date Of Purchased',
            'accountability' => 'Accountability',
            'storage' => 'Storage',
            'ram' => 'RAM',
            'ip_address' => 'IP Address',
            'usb' => 'USB',
            'office_suite_version' => 'Office Suite Version',
            'office_suite_liscense_type' => 'Office Suite Liscense Type',
            'office_suite_product_key' => 'Office Suite Product Key',
            'operating_system_name_version' => 'Operating System Name Version',
            'operating_system_license_type' => 'Operating System License Type',
            'operating_system_product_key' => 'Operating System Product Key',
            'antivirus_name_version' => 'Antivirus Name Version',
            'antivirus_license_type' => 'Antivirus License Type',
            'antivirus_product_key' => 'Antivirus Product Key',
        ];
    }
    

    public function getEmployees()
    {
        return $this->hasOne(Employee::className(), ['payroll_number' => 'accountability']);
    }

    public function getBrandserial()
    {
        return $this->brand.' - '.$this->serial_number;
    }
}
