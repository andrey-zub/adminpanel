<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "predecessors_links".
 *
 * @property int $id
 * @property string|null $link
 * @property int|null $basic_id
 */
class PredecessorsLinks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'predecessors_links';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['basic_id'], 'integer'],
            [['link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Link',
            'basic_id' => 'Basic ID',
        ];
    }
}
