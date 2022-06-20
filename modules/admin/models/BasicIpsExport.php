<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use app\modules\admin\models\BasicIps;
use Yii;


/**
 * BasicIpsSearch represents the model behind the search form of `app\modules\admin\models\BasicIps`.
 */
class BasicIpsExport extends BasicIps
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at', 'name_ip', 'full_name_ip', 'status', 'ogrn', 'inn', 'okpp', 'date_reg', 'ceil_reg', 'main_activity_num', 'main_activity_text'], 'safe'],
        ];
    }


    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }




    public function search($params)
    {

        Yii::$app->db->pdo->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);



        $query = BasicIps::find();
          $limit = 100;
              $query->limit($limit);


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                 'forcePageParam' => false,
                 'pageSizeParam' => false,
                'pageSize' => $limit,
                'totalCount' => $query->count()
            ]

            // 'pagination' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

//----------------------------------------------------------------------


  $query->with([
    'activityIps',
    'activitiesLinkIps',
    'connectionIps',
    'customerIps',
    'customerLinkIps',
    'legalCases',
    'legalCaseLinks',
    'phoneIps',
    'emailIps',
    'siteIps',
  ]);

  // grid filtering conditions
  $query->andFilterWhere([
      'id' => $this->id,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
      'deleted_at' => $this->deleted_at,
  ]);

  $query->andFilterWhere(['like', 'name_ip', $this->name_ip])
      ->andFilterWhere(['like', 'full_name_ip', $this->full_name_ip])
      ->andFilterWhere(['like', 'status', $this->status])
      ->andFilterWhere(['like', 'ogrn', $this->ogrn])
      ->andFilterWhere(['like', 'inn', $this->inn])
      ->andFilterWhere(['like', 'okpp', $this->okpp])
      ->andFilterWhere(['like', 'date_reg', $this->date_reg])
      ->andFilterWhere(['like', 'ceil_reg', $this->ceil_reg])
      ->andFilterWhere(['like', 'main_activity_num', $this->main_activity_num])
      ->andFilterWhere(['like', 'main_activity_text', $this->main_activity_text]);







Yii::$app->db->pdo->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);













        return $dataProvider;
    }
}
