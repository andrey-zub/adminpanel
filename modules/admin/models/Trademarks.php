<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "trademarks".
 *
 * @property int $id
 * @property string|null $text
 * @property string|null $link
 * @property int|null $basic_id
 */
class Trademarks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trademarks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['basic_id'], 'integer'],
            [['text', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'link' => 'Link',
            'basic_id' => 'Basic ID',
        ];
    }
}
