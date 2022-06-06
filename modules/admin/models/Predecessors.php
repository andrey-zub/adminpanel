<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "predecessors".
 *
 * @property int $id
 * @property string|null $text
 * @property int|null $basic_id
 */
class Predecessors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'predecessors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['basic_id'], 'integer'],
            [['text'], 'string', 'max' => 255],
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
            'basic_id' => 'Basic ID',
        ];
    }
}
