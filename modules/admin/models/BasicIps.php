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







}
