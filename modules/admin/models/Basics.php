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

public function getManagements()
{
    return $this->hasMany(Managements::className(), ['basic_id' => 'id']);
}

public function getPhones()
{
    return $this->hasMany(Phones::className(), ['basic_id' => 'id']);
}

public function getEmails()
{
    return $this->hasMany(Emails::className(), ['basic_id' => 'id']);
}

public function getSites()
{
    return $this->hasMany(Sites::className(), ['basic_id' => 'id']);
}

public function getActivities()
{
    return $this->hasMany(Activities::className(), ['basic_id' => 'id']);
}

public function getActivitiesLinks()
{
    return $this->hasMany(ActivitiesLinks::className(), ['basic_id' => 'id']);
}

public function getTrademarks()
{
    return $this->hasMany(Trademarks::className(), ['basic_id' => 'id']);
}

public function getTrademarksLinks()
{
    return $this->hasMany(TrademarksLinks::className(), ['basic_id' => 'id']);
}


public function getConnections()
{
    return $this->hasMany(Connections::className(), ['basic_id' => 'id']);
}

public function getConnectionsLinks()
{
    return $this->hasMany(ConnectionsLinks::className(), ['basic_id' => 'id']);
}

public function getPredecessors()
{
    return $this->hasMany(Predecessors::className(), ['basic_id' => 'id']);
}

public function getPredecessorsLinks()
{
    return $this->hasMany(PredecessorsLinks::className(), ['basic_id' => 'id']);
}

public function getSuccessors()
{
    return $this->hasMany(Successors::className(), ['basic_id' => 'id']);
}


public function getSuccessorsLinks()
{
    return $this->hasMany(SuccessorsLinks::className(), ['basic_id' => 'id']);
}

public function getBranches()
{
    return $this->hasMany(Branches::className(), ['basic_id' => 'id']);
}

public function getCustomers()
{
    return $this->hasMany(Customers::className(), ['basic_id' => 'id']);
}

public function getCustomerLinks()
{
    return $this->hasMany(CustomerLinks::className(), ['basic_id' => 'id']);
}

public function getSellers()
{
    return $this->hasMany(Sellers::className(), ['basic_id' => 'id']);
}

public function getSellerLinks()
{
    return $this->hasMany(SellerLinks::className(), ['basic_id' => 'id']);
}

public function getFounderUrs()
{
    return $this->hasMany(FounderUrs::className(), ['basic_id' => 'id']);
}

public function getFounderForeigns()
{
    return $this->hasMany(FounderForeigns::className(), ['basic_id' => 'id']);
}

public function getFinancialIndicators()
{
    return $this->hasMany(FinancialIndicators::className(), ['basic_id' => 'id']);
}

public function getFinancialIndicatorLinks()
{
    return $this->hasMany(FinancialIndicatorLinks::className(), ['basic_id' => 'id']);
}

public function getFinancialStabilities()
{
    return $this->hasMany(FinancialStabilities::className(), ['basic_id' => 'id']);
}

public function getLicenseLinks()
{
    return $this->hasMany(LicenseLinks::className(), ['basic_id' => 'id']);
}

public function getEnforcementProceedings()
{
    return $this->hasMany(EnforcementProceedings::className(), ['basic_id' => 'id']);
}


















}
