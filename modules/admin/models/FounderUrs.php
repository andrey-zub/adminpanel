<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "founder_urs".
 *
 * @property int $id
 * @property string|null $founder
 * @property string|null $cost
 * @property string|null $capital
 * @property int|null $basic_id
 */
class FounderUrs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'founder_urs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['founder'], 'string'],
            [['basic_id'], 'integer'],
            [['cost', 'capital'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'founder' => 'Founder',
            'cost' => 'Cost',
            'capital' => 'Capital',
            'basic_id' => 'Basic ID',
        ];
    }
}
