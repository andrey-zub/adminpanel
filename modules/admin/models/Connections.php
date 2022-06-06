<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "connections".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $text
 * @property int|null $basic_id
 */
class Connections extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'connections';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'string'],
            [['basic_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'basic_id' => 'Basic ID',
        ];
    }
}
