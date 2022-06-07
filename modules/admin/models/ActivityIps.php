<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "activity_ips".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $num
 * @property string|null $text
 * @property int|null $basic_ip_id
 */
class ActivityIps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity_ips';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['text'], 'string'],
            [['basic_ip_id'], 'integer'],
            [['num'], 'string', 'max' => 255],
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
            'num' => 'Num',
            'text' => 'Text',
            'basic_ip_id' => 'Basic Ip ID',
        ];
    }
}
