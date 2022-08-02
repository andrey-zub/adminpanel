<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Basics;
use Yii;


/**
 * BasicsSearch represents the model behind the search form of `app\modules\admin\models\Basics`.
 */
class BasicsSearch extends Basics
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['org_name', 'status', 'ogrn', 'inn', 'kpp', 'okpp', 'date_reg', 'name_eng', 'ur_addr', 'org_prav_form', 'ust_cap', 'spec_nlg_rej', 'avg_workers', 'ceil_reg', 'main_activity_num', 'main_activity_text'], 'safe'],
        ];
    }


    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }




    public function search($params)
    {

        $limit = 100;


        $query = Basics::find();
               $query->limit($limit);

        // add conditions that should always apply here

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => [
                         'forcePageParam' => false,
                         'pageSizeParam' => true,
                        'pageSize' => $limit,

                    ]

                ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

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
        $query->andFilterWhere(['id' => $this->id,])
        ->andFilterWhere(['like', 'status', $this->status])
         ->andFilterWhere(['like', 'date_reg', $this->date_reg])
         ->andFilterWhere(['like', 'name_eng', $this->name_eng])
         ->andFilterWhere(['like', 'org_prav_form', $this->org_prav_form])
         ->andFilterWhere(['like', 'ust_cap', $this->ust_cap])
         ->andFilterWhere(['like', 'spec_nlg_rej', $this->spec_nlg_rej])
         ->andFilterWhere(['like', 'avg_workers', $this->avg_workers])
         ->andFilterWhere(['like', 'ceil_reg', $this->ceil_reg])
         ->andFilterWhere(['like', 'main_activity_num', $this->main_activity_num])
         // ->andFilterWhere(['like', 'main_activity_text', $this->main_activity_text])

         ->andFilterWhere(['in', 'ogrn', $result_ogrn])
         ->andFilterWhere(['in', 'inn', $result_inn]);

         // ->andFilterWhere(['like', 'org_name', $this->org_name])
         // ->andFilterWhere(['like', 'ogrn', $this->ogrn])
         // ->andFilterWhere(['like', 'kpp', $this->kpp])
         // ->andFilterWhere(['like', 'okpp', $this->okpp])
         // ->andFilterWhere(['like', 'main_activity_num', $this->main_activity_num]);
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
         if (!empty($this->org_name)) {
           $query->andWhere("MATCH(org_name) AGAINST ('" . $this->org_name . "')");
         }
         // if (!empty($this->ogrn)) {
         //   $query->andWhere("MATCH(ogrn) AGAINST ('" . $this->ogrn . "')");
         // }
         if (!empty($this->kpp)) {
           $query->andWhere("MATCH(kpp) AGAINST ('" . $this->kpp . "')");
         }
         if (!empty($this->okpp)) {
           $query->andWhere("MATCH(okpp) AGAINST ('" . $this->okpp . "')");
         }
         if (!empty($this->ur_addr)) {
           $query->andWhere("MATCH(ur_addr) AGAINST ('" . $this->ur_addr . "')");
         }
         if (!empty($this->main_activity_text)) {
           $query->andWhere("MATCH(main_activity_text) AGAINST ('" . $this->main_activity_text . "')");
         }


             //--------------------------------------------------------------------------

        return $dataProvider;
    }





}
