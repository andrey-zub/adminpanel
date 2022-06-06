<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "managements".
 *
 * @property int $id
 * @property string|null $gen_dir
 * @property string|null $inn_gen_dir
 * @property string|null $date_gen_dir
 * @property int|null $basic_id
 */
class Managements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'managements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['basic_id'], 'integer'],
            [['gen_dir', 'inn_gen_dir', 'date_gen_dir'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gen_dir' => 'Gen Dir',
            'inn_gen_dir' => 'Inn Gen Dir',
            'date_gen_dir' => 'Date Gen Dir',
            'basic_id' => 'Basic ID',
        ];
    }
}
