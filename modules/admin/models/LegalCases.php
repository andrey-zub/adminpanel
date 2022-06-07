<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "legal_cases".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $title
 * @property string|null $count
 * @property int|null $basic_ip_id
 */
class LegalCases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'legal_cases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['title'], 'string'],
            [['basic_ip_id'], 'integer'],
            [['count'], 'string', 'max' => 255],
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
            'count' => 'Count',
            'basic_ip_id' => 'Basic Ip ID',
        ];
    }
}
