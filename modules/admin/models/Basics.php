<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "basics".
 *
 * @property int $id
 * @property string|null $org_name
 * @property string|null $status
 * @property string|null $ogrn
 * @property string|null $inn
 * @property string|null $kpp
 * @property string|null $okpp
 * @property string|null $date_reg
 * @property string|null $name_eng
 * @property string|null $ur_addr
 * @property string|null $org_prav_form
 * @property string|null $ust_cap
 * @property string|null $spec_nlg_rej
 * @property string|null $avg_workers
 * @property string|null $ceil_reg
 * @property string|null $main_activity_num
 * @property string|null $main_activity_text
 */
class Basics extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'basics';
    }


    public function rules()
    {
        return [
            [['org_name', 'status', 'ogrn', 'inn', 'kpp', 'okpp', 'date_reg', 'name_eng', 'ur_addr', 'org_prav_form', 'ust_cap', 'spec_nlg_rej', 'avg_workers', 'ceil_reg', 'main_activity_num', 'main_activity_text'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'org_name' => 'Org Name',
            'status' => 'Status',
            'ogrn' => 'Ogrn',
            'inn' => 'Inn',
            'kpp' => 'Kpp',
            'okpp' => 'Okpp',
            'date_reg' => 'Date Reg',
            'name_eng' => 'Name Eng',
            'ur_addr' => 'Ur Addr',
            'org_prav_form' => 'Org Prav Form',
            'ust_cap' => 'Ust Cap',
            'spec_nlg_rej' => 'Spec Nlg Rej',
            'avg_workers' => 'Avg Workers',
            'ceil_reg' => 'Ceil Reg',
            'main_activity_num' => 'Main Activity Num',
            'main_activity_text' => 'Main Activity Text',
        ];
    }

// -----------------------------СВЯЗИ С ДРУГИМИ ТАБЛИЦАМИ------------------------------------


public function getRatings()
{
    return $this->hasMany(Ratings::className(), ['basic_id' => 'id']);
}






}
