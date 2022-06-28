<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "basic_ips".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $name_ip
 * @property string|null $full_name_ip
 * @property string|null $status
 * @property string|null $ogrn
 * @property string|null $inn
 * @property string|null $okpp
 * @property string|null $date_reg
 * @property string|null $ceil_reg
 * @property string|null $main_activity_num
 * @property string|null $main_activity_text
 */
class BasicIps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'basic_ips';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name_ip', 'full_name_ip', 'main_activity_text'], 'string'],
            [['status', 'ogrn', 'inn', 'okpp', 'date_reg', 'ceil_reg', 'main_activity_num'], 'string', 'max' => 255],
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
            'name_ip' => 'Name Ip',
            'full_name_ip' => 'Full Name Ip',
            'status' => 'Status',
            'ogrn' => 'Ogrn',
            'inn' => 'Inn',
            'okpp' => 'Okpp',
            'date_reg' => 'Date Reg',
            'ceil_reg' => 'Ceil Reg',
            'main_activity_num' => 'Main Activity Num',
            'main_activity_text' => 'Main Activity Text',
        ];
    }

    public function getActivityIps()
    {
        return $this->hasMany(ActivityIps::className(), ['basic_ip_id' => 'id']);
    }
    public function getActivitiesLinkIps()
    {
        return $this->hasMany(ActivitiesLinkIps::className(), ['basic_ip_id' => 'id']);
    }
    public function getConnectionIps()
    {
        return $this->hasMany(ConnectionIps::className(), ['basic_ip_id' => 'id']);
    }
    public function getCustomerIps()
    {
        return $this->hasMany(CustomerIps::className(), ['basic_ip_id' => 'id']);
    }
    public function getCustomerLinkIps()
    {
        return $this->hasMany(CustomerLinkIps::className(), ['basic_ip_id' => 'id']);
    }
    public function getSellerIps()
    {
        return $this->hasMany(SellerIps::className(), ['basic_ip_id' => 'id']);
    }
    public function getSellerLinkIps()
    {
        return $this->hasMany(SellerLinkIps::className(), ['basic_ip_id' => 'id']);
    }
    public function getLegalCases()
    {
        return $this->hasMany(LegalCases::className(), ['basic_ip_id' => 'id']);
    }
    public function getLegalCaseLinks()
    {
        return $this->hasMany(LegalCaseLinks::className(), ['basic_ip_id' => 'id']);
    }
    public function getPhoneIps()
    {
        return $this->hasMany(PhoneIps::className(), ['basic_ip_id' => 'id']);
    }
    public function getEmailIps()
    {
        return $this->hasMany(EmailIps::className(), ['basic_ip_id' => 'id']);
    }
    public function getSiteIps()
    {
        return $this->hasMany(SiteIps::className(), ['basic_ip_id' => 'id']);
    }


    public function getGridColumns(){
      return [
        [
            'class' => 'yii\grid\ActionColumn',
            'template'=>'{view}'
        ],
        'id',
        'name_ip:ntext',
        'status',
        'ogrn',
        'inn',
        'okpp',
        'main_activity_num',
          'full_name_ip:ntext',
          'date_reg',
          'ceil_reg',
          ['class' => 'yii\grid\SerialColumn'],
      ];
    }

  public function getExportColumns(){
      return [
        'id',
        'name_ip:ntext',
        'status',
        'ogrn',
        'inn',
        'okpp',
        'main_activity_num',
          'full_name_ip:ntext',
          'date_reg',
          'ceil_reg',
          [
            'hidden' => true,
             'label' => 'Activity ips',
             'attribute'=>'activity_ips.text',
             'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->activityIps, 'id', 'text')); },
          ],
          [
            'hidden' => true,
             'label' => 'Activity ips num',
             'attribute'=>'activity_ips.num',
             'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->activityIps, 'id', 'num')); },
          ],
          [
            'hidden' => true,
            'label'=>'Activity ips link',
            'attribute'=>'activity_link_ips.text',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->activitiesLinkIps, 'id', 'link')); },
          ],
          [
            'hidden' => true,
            'label'=>'Connecton ips',
            'attribute'=>'connecton_ips.text',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->connectionIps, 'id', 'text')); },
          ],
          [
            'hidden' => true,
            'label'=>'Customer ips fz',
            'attribute'=>'customer_ips.fz',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->connectionIps, 'id', 'text')); },
          ],
          [
            'hidden' => true,
            'label'=>'Customer ips contract',
            'attribute'=>'customer_ips.contract',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->connectionIps, 'id', 'contract')); },
          ],
          [
            'hidden' => true,
            'label'=>'Customer ips count',
            'attribute'=>'customer_ips.count',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->connectionIps, 'id', 'count')); },
          ],
          [
            'hidden' => true,
            'label'=>'Customer ips link',
            'attribute'=>'customer_link_ips.link',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->customerLinkIps, 'id', 'link')); },
          ],
          [
            'hidden' => true,
            'label'=>'Seller ips fz',
            'attribute'=>'seller_ips.fz',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->sellerIps, 'id', 'fz')); },
          ],
          [
            'hidden' => true,
            'label'=>'Seller ips contract',
            'attribute'=>'seller_ips.contract',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->sellerIps, 'id', 'contract')); },
          ],
          [
            'hidden' => true,
            'label'=>'Seller ips count',
            'attribute'=>'seller_ips.count',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->sellerIps, 'id', 'count')); },
          ],
          [
            'hidden' => true,
            'label'=>'Seller ips link',
            'attribute'=>'seller_link_ips.link',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->sellerLinkIps, 'id', 'link')); },
          ],
          [
            'hidden' => true,
            'label'=>'Legal case title ',
            'attribute'=>'legal_cases.title',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->legalCases, 'id', 'title')); },
          ],
          [
            'hidden' => true,
            'label'=>'Legal case count ',
            'attribute'=>'legal_cases.count',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->legalCases, 'id', 'count')); },
          ],
          [
            'hidden' => true,
            'label'=>'Legal case link ',
            'attribute'=>'legal_case_links.link',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->legalCaseLinks, 'id', 'link')); },
          ],
          [
            'hidden' => true,
            'label'=>'Phone ips ',
            'attribute'=>'phone_ips.number',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->phoneIps, 'id', 'number')); },
          ],
          [
            'hidden' => true,
            'label'=>'Email ips ',
            'attribute'=>'email_ips.addr',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->emailIps, 'id', 'addr')); },
          ],
          [
            'hidden' => true,
            'label'=>'Site ips',
            'attribute'=>'site_ips.addr',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->siteIps, 'id', 'addr')); },
          ],

            ['class' => 'yii\grid\SerialColumn'],
      ];
      }



}
