<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\BasicIps;
use Yii;

/**
 * BasicIpsSearch represents the model behind the search form of `app\modules\admin\models\BasicIps`.
 */
class BasicIpsSearch extends BasicIps
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
        $limit = 100;

        $query = BasicIps::find();
              $query->limit($limit);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                 'forcePageParam' => false,
                 'pageSizeParam' => false,
                'pageSize' => $limit,
            ]
            //
            // 'pagination' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

//----------------------------------------------------------------------


                $qr_inn = explode(' ',trim($this->inn));
                $qr1 = array_unique($qr_inn);
                $result_inn= array();
                foreach( $qr1 as $arr){
                  if (strlen($arr) >= 10){
                    if( is_numeric($arr) ){
                        array_push($result_inn,$arr);
                     };
                  };
                }
                $qr_ogrn = explode(' ',trim($this->ogrn));
                $qr2 = array_unique($qr_ogrn);
                $result_ogrn= array();
                foreach( $qr2 as $arr){
                  if (strlen($arr) >= 10){
                    if( is_numeric($arr) ){
                        array_push($result_ogrn,$arr);
                     };
                  };
                }


  // grid filtering conditions
  $query->andFilterWhere([
      'id' => $this->id,
      // 'created_at' => $this->created_at,
      // 'updated_at' => $this->updated_at,
      // 'deleted_at' => $this->deleted_at,
  ]);





            $query->andFilterWhere(['in', 'inn', $result_inn])
                ->andFilterWhere(['in', 'ogrn', $result_ogrn])
                ->andFilterWhere(['like', 'status', $this->status])
                ->andFilterWhere(['like', 'date_reg', $this->date_reg])
                ->andFilterWhere(['like', 'ceil_reg', $this->ceil_reg])
                ->andFilterWhere(['like', 'main_activity_num', $this->main_activity_num]);


                if (!empty($this->name_ip)) {
                  $query->andWhere("MATCH(name_ip) AGAINST ('" . $this->name_ip . "')");
                }
                if (!empty($this->full_name_ip)) {
                  $query->andWhere("MATCH(full_name_ip) AGAINST ('" . $this->full_name_ip . "')");
                }
                // if (!empty($this->ogrn)) {
                //   $query->andWhere("MATCH(ogrn) AGAINST ('" . $this->ogrn . "')");
                // }
                if (!empty($this->okpp)) {
                  $query->andWhere("MATCH(okpp) AGAINST ('" . $this->okpp . "')");
                }if (!empty($this->main_activity_text)) {
                  $query->andWhere("MATCH(main_activity_text) AGAINST ('" . $this->main_activity_text . "')");
                }

              // ->andFilterWhere(['like', 'name_ip', $this->name_ip])
              // ->andFilterWhere(['like', 'full_name_ip', $this->full_name_ip])
              // ->andFilterWhere(['like', 'ogrn', $this->ogrn])
              // ->andFilterWhere(['like', 'okpp', $this->okpp])
              // ->andFilterWhere(['like', 'main_activity_num', $this->main_activity_num])




        return $dataProvider;
    }
}
