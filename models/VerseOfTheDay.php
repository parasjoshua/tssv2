<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "votd".
 *
 * @property int $id_votd
 * @property string $bible_verse
 * @property string $bible_verse_desc
 * @property string $totd
 * @property string $date
 */
class VerseOfTheDay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'votd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bible_verse', 'bible_verse_desc', 'totd'], 'required'],
            [['date'], 'safe'],
            [['bible_verse'], 'string', 'max' => 100],
            [['bible_verse_desc', 'totd'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_votd' => 'ID',
            'bible_verse' => 'Bible Verse',
            'bible_verse_desc' => 'Verse Description',
            'totd' => 'Thoughts',
            'date' => 'Date Updated',
        ];
    }
}
