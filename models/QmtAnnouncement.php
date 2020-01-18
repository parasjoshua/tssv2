<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qmt_announcement".
 *
 * @property int $id_qmt
 * @property string $announcement
 * @property string $date
 * @property string $updatedby
 */
class QmtAnnouncement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qmt_announcement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['announcement'], 'required'],
            [['announcement'], 'string', 'max' => 1000],
            [['date', 'updatedby'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_qmt' => 'Id Qmt',
            'announcement' => 'Announcement',
            'date' => 'Date',
            'updatedby' => 'Updatedby',
        ];
    }
}
