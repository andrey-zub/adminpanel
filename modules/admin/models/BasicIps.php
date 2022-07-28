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
            'created_at' => 'Создан:',
            'updated_at' => 'Обновлен:',
            'deleted_at' => 'Удален:',
            'name_ip' => 'Нименование',
            'full_name_ip' => 'Полное наименование ИП',
            'status' => 'Статус',
            'ogrn' => 'ОГРН',
            'inn' => 'ИНН',
            'okpp' => 'ОКПП',
            'date_reg' => 'Дата регистрации',
            'ceil_reg' => 'Единый реестр субъектов малого и среднего предпринимательства',
            'main_activity_num' => 'Номер ОКВЭД',
            'main_activity_text' => 'Наименование ОКВЭД',
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
          //
          // [
          //   'hidden'=>true,
          //   'headerOptions'=>['class'=>'kv-sticky-column'],
          //   'contentOptions'=>['class'=>'kv-sticky-column'],
          //    'label' => 'Вид деятельности ( наименование )',
          //    'attribute'=>'activity_ips.text',
          //    'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->activityIps, 'id', 'text')); },
          // ],
          // [
          //   'hidden'=>true,
          //   'headerOptions'=>['class'=>'kv-sticky-column'],
          //   'contentOptions'=>['class'=>'kv-sticky-column'],
          //    'label' => 'Вид деятельности ( номер )',
          //    'attribute'=>'activity_ips.num',
          //    'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->activityIps, 'id', 'num')); },
          // ],
          // [
          //   'hidden'=>true,
          //   'headerOptions'=>['class'=>'kv-sticky-column'],
          //   'contentOptions'=>['class'=>'kv-sticky-column'],
          //   'label'=>'Вид деятельности ( подробнее )',
          //   'attribute'=>'activity_link_ips.text',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->activitiesLinkIps, 'id', 'link')); },
          // ],
          // [
          //   'hidden'=>true,
          //   'headerOptions'=>['class'=>'kv-sticky-column'],
          //   'contentOptions'=>['class'=>'kv-sticky-column'],
          //   'label'=>'Контактная информация ( телефон ) ',
          //   'attribute'=>'phone_ips.number',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->phoneIps, 'id', 'number')); },
          // ],
          // [
          //   'hidden'=>true,
          //   'headerOptions'=>['class'=>'kv-sticky-column'],
          //   'contentOptions'=>['class'=>'kv-sticky-column'],
          //   'label'=>'Контактная информация ( элетронная почта ) ',
          //   'attribute'=>'email_ips.addr',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->emailIps, 'id', 'addr')); },
          // ],
          // [
          //   'hidden'=>true,
          //   'headerOptions'=>['class'=>'kv-sticky-column'],
          //   'contentOptions'=>['class'=>'kv-sticky-column'],
          //   'label'=>'Контактная информация ( сайт )',
          //   'attribute'=>'site_ips.addr',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->siteIps, 'id', 'addr')); },
          // ],

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
             'label' => 'Вид деятельности ( наименование )',
             'attribute'=>'activity_ips.text',
             'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->activityIps, 'id', 'text')); },
          ],
          [
             'label' => 'Вид деятельности ( номер )',
             'attribute'=>'activity_ips.num',
             'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->activityIps, 'id', 'num')); },
          ],
          [
            'label'=>'Вид деятельности ( подробнее )',
            'attribute'=>'activity_link_ips.text',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->activitiesLinkIps, 'id', 'link')); },
          ],
          // [
          //   'label'=>'Connecton ips',
          //   'attribute'=>'connecton_ips.text',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->connectionIps, 'id', 'text')); },
          // ],
          // [
          //   'label'=>'Customer ips fz',
          //   'attribute'=>'customer_ips.fz',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->connectionIps, 'id', 'text')); },
          // ],
          // [
          //   'label'=>'Customer ips contract',
          //   'attribute'=>'customer_ips.contract',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->connectionIps, 'id', 'contract')); },
          // ],
          // [
          //   'label'=>'Customer ips count',
          //   'attribute'=>'customer_ips.count',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->connectionIps, 'id', 'count')); },
          // ],
          // [
          //   'label'=>'Customer ips link',
          //   'attribute'=>'customer_link_ips.link',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->customerLinkIps, 'id', 'link')); },
          // ],
          // [
          //   'label'=>'Seller ips fz',
          //   'attribute'=>'seller_ips.fz',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->sellerIps, 'id', 'fz')); },
          // ],
          // [
          //   'label'=>'Seller ips contract',
          //   'attribute'=>'seller_ips.contract',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->sellerIps, 'id', 'contract')); },
          // ],
          // [
          //   'label'=>'Seller ips count',
          //   'attribute'=>'seller_ips.count',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->sellerIps, 'id', 'count')); },
          // ],
          // [
          //   'label'=>'Seller ips link',
          //   'attribute'=>'seller_link_ips.link',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->sellerLinkIps, 'id', 'link')); },
          // ],
          // [
          //   'label'=>'Legal case title ',
          //   'attribute'=>'legal_cases.title',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->legalCases, 'id', 'title')); },
          // ],
          // [
          //   'label'=>'Legal case count ',
          //   'attribute'=>'legal_cases.count',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->legalCases, 'id', 'count')); },
          // ],
          // [
          //   'label'=>'Legal case link ',
          //   'attribute'=>'legal_case_links.link',
          //   'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->legalCaseLinks, 'id', 'link')); },
          // ],
          [
            'label'=>'Контактная информация ( телефон ) ',
            'attribute'=>'phone_ips.number',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->phoneIps, 'id', 'number')); },
          ],
          [
            'label'=>'Контактная информация ( элетронная почта ) ',
            'attribute'=>'email_ips.addr',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->emailIps, 'id', 'addr')); },
          ],
          [
            'label'=>'Контактная информация ( сайт )',
            'attribute'=>'site_ips.addr',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->siteIps, 'id', 'addr')); },
          ],

            ['class' => 'yii\grid\SerialColumn'],
      ];
      }



}
