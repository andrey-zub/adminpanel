<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "enforcement_proceedings".
 *
 * @property string|null $title
 * @property int|null $count
 * @property string|null $link
 * @property int|null $basic_id
 */
class EnforcementProceedings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enforcement_proceedings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count', 'basic_id'], 'integer'],
            [['title', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'count' => 'Count',
            'link' => 'Link',
            'basic_id' => 'Basic ID',
        ];
    }
}
