<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property int $id
 * @property string|null $addr
 * @property int|null $basic_id
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['basic_id'], 'integer'],
            [['addr'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'addr' => 'Addr',
            'basic_id' => 'Basic ID',
        ];
    }
}
