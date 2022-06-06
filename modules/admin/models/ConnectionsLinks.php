<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "connections_links".
 *
 * @property int $id
 * @property string|null $link
 * @property int|null $basic_id
 */
class ConnectionsLinks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'connections_links';
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
