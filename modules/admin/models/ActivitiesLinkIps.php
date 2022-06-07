<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "activities_link_ips".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $link
 * @property int|null $basic_ip_id
 */
class ActivitiesLinkIps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activities_link_ips';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['basic_ip_id'], 'integer'],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
            'link' => 'Link',
            'basic_ip_id' => 'Basic Ip ID',
        ];
    }
}
