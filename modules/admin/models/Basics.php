<?php

namespace app\modules\admin\models;
//use yii\elasticsearch\ActiveRecord;
use \yii\db\ActiveRecord;
use Yii;


class Basics extends ActiveRecord
{

    public static function tableName()
    {
        return 'basics';
    }


//------------------------------------------elasticSearch
    // public static function index()
    // {
    //     return 'org_name';
    // }
    //
    //
    //
    // /**
    //  Атрибуты. Важно указать. Иначе, данные не сохранятся.
    // */
    // public function attributes()
    // {
    //     return [
    //       'id',
    //       'org_name',
    //       'status',
    //       'ogrn',
    //       'inn',
    //       'kpp',
    //       'okpp',
    //       'main_activity_num',
    //       'date_reg',
    //        'name_eng',
    //        'ur_addr',
    //        'org_prav_form',
    //       'ust_cap',
    //        'spec_nlg_rej',
    //        'avg_workers',
    //        'ceil_reg',
    //        'main_activity_text',
    //       ];
    //   }


    public function rules()
    {
        return [
            [['org_name', 'status', 'ogrn', 'inn', 'kpp', 'okpp', 'date_reg', 'name_eng', 'ur_addr', 'org_prav_form', 'ust_cap', 'spec_nlg_rej', 'avg_workers', 'ceil_reg', 'main_activity_num', 'main_activity_text'], 'string', 'max' => 255],

            //[$this->attributes(), 'safe']
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





public function getGridColumns(){
  return [
    [
        'class' => 'yii\grid\ActionColumn',
        'template'=>'{view}'
    ],
  'id',
  'org_name',
  'status',
  'ogrn',
  'inn',
  'kpp',
  'okpp',
  'main_activity_num',
  'date_reg',
   'name_eng',
   'ur_addr',
   'org_prav_form',
  'ust_cap',
   'spec_nlg_rej',
   'avg_workers',
   'ceil_reg',
   'main_activity_text',
   ['class' => 'yii\grid\SerialColumn'],
  ];
}

public function getExportColumns(){
  return [
    'id',
    'org_name',
    'status',
    'ogrn',
    'inn',
    'kpp',
    'okpp',
    'main_activity_num',
    'date_reg',
     'name_eng',
     'ur_addr',
     'org_prav_form',
    'ust_cap',
     'spec_nlg_rej',
     'avg_workers',
     'ceil_reg',
     'main_activity_text',


        [
          'hidden' => true,
          'label'=>'Gen Dir',
          'attribute'=>'managements.gen_dir',
          'value' => function($model) { return join(',  <br>',\yii\helpers\ArrayHelper::map($model->managements, 'id', 'gen_dir'));},
        ],
        [
          'hidden' => true,
          'label'=>'Gen Dir Inn',
          'attribute'=>'managements.inn_gen_dir',
          'value' => function($model) { return join(',  <br>',\yii\helpers\ArrayHelper::map($model->managements, 'id', 'inn_gen_dir'));},
        ],
        [
          'hidden' => true,
          'label'=>'Gen Dir Date',
          'attribute'=>'managements.date_gen_dir',
          'value' => function($model) { return join(',  <br>',\yii\helpers\ArrayHelper::map($model->managements, 'id', 'date_gen_dir'));},
        ],
        [
          'hidden' => true,
          'label'=>'Phone',
          'attribute'=>'phones.number',
          'value' => function($model) { return join(',  <br>',\yii\helpers\ArrayHelper::map($model->phones, 'id', 'number'));},
        ],
        [
          'hidden' => true,
          'label'=>'Email',
          'attribute'=>'emails.addr',
          'value' => function($model) { return join(',  <br>',\yii\helpers\ArrayHelper::map($model->emails, 'id', 'addr'));},
        ],
        [
          'hidden' => true,
          'label'=>'Site ',
          'attribute'=>'sites.addr',
          'value' => function($model) { return join(',  <br>',\yii\helpers\ArrayHelper::map($model->sites, 'id', 'addr'));},
        ],
        [
          'hidden' => true,
          'label'=>'Activity num',
          'attribute'=>'activities.num',
          'value' => function($model) { return join(',  <br>',\yii\helpers\ArrayHelper::map($model->activities, 'id', 'num'));},
        ],
        [
          'hidden' => true,
          'label'=>'Activity',
          'attribute'=>'activities.text',
          'value' => function($model) { return join(',  <br>',\yii\helpers\ArrayHelper::map($model->activities, 'id', 'text'));},
        ],
        [
          'hidden' => true,
          'label'=>'Activity link',
          'attribute'=>'activities_links.link',
          'value' => function($model) { return join(',  <br> ',\yii\helpers\ArrayHelper::map($model->activitiesLinks, 'id', 'link'));},
        ],

  ];
  }












}
