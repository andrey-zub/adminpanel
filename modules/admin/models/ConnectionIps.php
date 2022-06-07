<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "connection_ips".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $title
 * @property string|null $text
 * @property int|null $basic_ip_id
 */
class ConnectionIps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'connection_ips';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['title', 'text'], 'string'],
            [['basic_ip_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
            'title' => 'Title',
            'text' => 'Text',
            'basic_ip_id' => 'Basic Ip ID',
        ];
    }
}
