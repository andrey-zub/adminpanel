<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "ratings".
 *
 * @property int $id
 * @property string|null $mark
 * @property string|null $comment
 * @property int|null $basic_id
 */
class Ratings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ratings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['basic_id'], 'integer'],
            [['mark', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mark' => 'Mark',
            'comment' => 'Comment',
            'basic_id' => 'Basic ID',
        ];
    }
}
