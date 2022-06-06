<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property string|null $fz
 * @property string|null $contract
 * @property string|null $count
 * @property int|null $basic_id
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['basic_id'], 'integer'],
            [['fz', 'contract', 'count'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fz' => 'Fz',
            'contract' => 'Contract',
            'count' => 'Count',
            'basic_id' => 'Basic ID',
        ];
    }
}
