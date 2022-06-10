<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\BasicsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Basics';
  $this->params['breadcrumbs'][] = array(
      'label'=> 'Admin panel',
      'url'=>Yii::$app->urlManager->createUrl(['admin/'])
  );
  $this->params['breadcrumbs'][] = array(
      'label'=> 'Basic Ips',
      'url'=>Yii::$app->urlManager->createUrl(['admin/basic-ips'])
  );
    $this->params['breadcrumbs'][] = $this->title;

?>
<div class="basics-index">

    <h1><?= Html::encode($this->title) ?></h1>


<?
    Pjax::begin();

    $gridColumns = [
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
            [
              'class' => 'yii\grid\ActionColumn',
              'template'=>'{view}'
            ],
    ];

    $exportColumns = [
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
            'attribute'=>'ratings.mark',
            'value' => function($model) { return join('.  ',\yii\helpers\ArrayHelper::map($model->ratings, 'id', 'mark'));},
          ],
          [
            'attribute'=>'ratings.comment',
            'value' => function($model) { return join('.   ',\yii\helpers\ArrayHelper::map($model->ratings, 'id', 'comment'));},
          ],
          [
            'attribute'=>'managements.gen_dir',
            'value' => function($model) { return join('.   ',\yii\helpers\ArrayHelper::map($model->managements, 'id', 'gen_dir'));},
          ],
          [
            'attribute'=>'managements.inn_gen_dir',
            'value' => function($model) { return join('.   ',\yii\helpers\ArrayHelper::map($model->managements, 'id', 'inn_gen_dir'));},
          ],
          [
            'attribute'=>'managements.date_gen_dir',
            'value' => function($model) { return join('.   ',\yii\helpers\ArrayHelper::map($model->managements, 'id', 'date_gen_dir'));},
          ],
          [
            'label'=>'Phone',
            'attribute'=>'phones.number',
            'value' => function($model) { return join(',   ',\yii\helpers\ArrayHelper::map($model->phones, 'id', 'number'));},
          ],
          [
            'label'=>'Email',
            'attribute'=>'emails.addr',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->emails, 'id', 'addr'));},
          ],
          [
            'label'=>'Activity num',
            'attribute'=>'activities.num',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->activities, 'id', 'num'));},
          ],
          [
            'label'=>'Activity',
            'attribute'=>'activities.text',
            'value' => function($model) { return join('.   ',\yii\helpers\ArrayHelper::map($model->activities, 'id', 'text'));},
          ],

          [
            'label'=>'Site ',
            'attribute'=>'sites.addr',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->sites, 'id', 'addr'));},
          ],

          [
            'label'=>'Activity link',
            'attribute'=>'activities_links.link',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->activitiesLinks, 'id', 'link'));},
          ],

          [
            'label'=>'Trademark text',
            'attribute'=>'trademarks.text',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->trademarks, 'id', 'text'));},
          ],
          [
            'label'=>'Trademark link',
            'attribute'=>'trademarks.link',
            'value' => function($model) { return join('  [----];   ',\yii\helpers\ArrayHelper::map($model->trademarks, 'id', 'link'));},
          ],
          [
            'label'=>'Trademark_links link',
            'attribute'=>'trademarks_links.link',
            'value' => function($model) { return join('  [----];   ',\yii\helpers\ArrayHelper::map($model->trademarksLinks, 'id', 'link'));},
          ],
          [
            'label'=>'Connections title',
            'attribute'=>'connections.title',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->connections, 'id', 'title'));},
          ],
          [
            'label'=>'Connections text',
            'attribute'=>'connections.text',
            'value' => function($model) { return join('  [----];   ',\yii\helpers\ArrayHelper::map($model->connections, 'id', 'text'));},
          ],
          [
            'label'=>'Connections link',
            'attribute'=>'connections_links.link',
            'value' => function($model) { return join('  [----];   ',\yii\helpers\ArrayHelper::map($model->connectionsLinks, 'id', 'link'));},
          ],
          [
            'label'=>'Predecessors',
            'attribute'=>'predecessors.text',
            'value' => function($model) { return join('  [----];   ',\yii\helpers\ArrayHelper::map($model->predecessors, 'id', 'text'));},
          ],
          [
            'label'=>'Predecessors link',
            'attribute'=>'predecessors_links.link',
            'value' => function($model) { return join('  [----];   ',\yii\helpers\ArrayHelper::map($model->predecessorsLinks, 'id', 'link'));},
          ],
          [
            'label'=>'Successors',
            'attribute'=>'successors.text',
            'value' => function($model) { return join('  [----];   ',\yii\helpers\ArrayHelper::map($model->successors, 'id', 'text'));},
          ],
          [
            'label'=>'Successors link',
            'attribute'=>'successors_links.link',
            'value' => function($model) { return join('  [----];   ',\yii\helpers\ArrayHelper::map($model->successorsLinks, 'id', 'link'));},
          ],
          [
            'label'=>'Customer fz',
            'attribute'=>'customers.fz',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->customers, 'id', 'fz'));},
          ],
          [
            'label'=>'Customer contract',
            'attribute'=>'customers.contract',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->customers, 'id', 'contract'));},
          ],
          [
            'label'=>'Customer count',
            'attribute'=>'customers.count',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->customers, 'id', 'count'));},
          ],
          [
            'label'=>'Customer link',
            'attribute'=>'customer_links.link',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->customerLinks, 'id', 'link'));},
          ],
          [
            'label'=>'Branches',
            'attribute'=>'branches.text',
            'value' => function($model) { return join('  [----];    ',\yii\helpers\ArrayHelper::map($model->branches, 'id', 'text'));},
          ],
          [
            'label'=>'Sellers fz',
            'attribute'=>'sellers.fz',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->sellers, 'id', 'fz'));},
          ],
          [
            'label'=>'Seller contract',
            'attribute'=>'sellers.contract',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->sellers, 'id', 'contract'));},
          ],
          [
            'label'=>'Seller count',
            'attribute'=>'sellers.count',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->sellers, 'id', 'count'));},
          ],
          [
            'label'=>'Seller link',
            'attribute'=>'seller_links.link',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->sellerLinks, 'id', 'link'));},
          ],
          [
            'label'=>'Founder Urs founder',
            'attribute'=>'founder_urs.founder',
            'value' => function($model) { return join('  [----];     ',\yii\helpers\ArrayHelper::map($model->founderUrs, 'id', 'founder'));},
          ],
          [
            'label'=>'Founder Urs cost',
            'attribute'=>'founder_urs.cost',
            'value' => function($model) { return join('  [----];     ',\yii\helpers\ArrayHelper::map($model->founderUrs, 'id', 'cost'));},
          ],
          [
            'label'=>'Founder Urs capital',
            'attribute'=>'founder_urs.capital',
            'value' => function($model) { return join(' ;     ',\yii\helpers\ArrayHelper::map($model->founderUrs, 'id', 'capital'));},
          ],
          [
            'label'=>'Founder foreigns founder',
            'attribute'=>'founder_foreigns.founder',
            'value' => function($model) { return join('  [----];     ',\yii\helpers\ArrayHelper::map($model->founderForeigns, 'id', 'founder'));},
          ],
          [
            'label'=>'Founder foreigns cost',
            'attribute'=>'founder_foreigns.cost',
            'value' => function($model) { return join('  [----];     ',\yii\helpers\ArrayHelper::map($model->founderForeigns, 'id', 'cost'));},
          ],
          [
            'label'=>'Founder foreigns capital',
            'attribute'=>'founder_foreigns.capital',
            'value' => function($model) { return join(' ;     ',\yii\helpers\ArrayHelper::map($model->founderForeigns, 'id', 'capital'));},
          ],
          [
            'label'=>'Financial indicator ',
            'attribute'=>'financial_indicator.text',
            'value' => function($model) { return join(' ;     ',\yii\helpers\ArrayHelper::map($model->financialIndicators, 'id', 'text'));},
          ],
          [
            'label'=>'Financial indicator link',
            'attribute'=>'financial_indicator_links.link',
            'value' => function($model) { return join(' ;     ',\yii\helpers\ArrayHelper::map($model->financialIndicatorLinks, 'id', 'link'));},
          ],
          [
            'label'=>'Financial stabilties ',
            'attribute'=>'financial_stabilties.text',
            'value' => function($model) { return join(' ;     ',\yii\helpers\ArrayHelper::map($model->financialStabilities, 'id', 'text'));},
          ],
          [
            'label'=>'License link ',
            'attribute'=>'license_links.link',
            'value' => function($model) { return join(' ;     ',\yii\helpers\ArrayHelper::map($model->licenseLinks, 'id', 'link'));},
          ],
          [
            'label'=>'Enforcement proceedings title',
            'attribute'=>'enforcement_proceedings.title',
            'value' => function($model) { return join(' ;     ',\yii\helpers\ArrayHelper::map($model->enforcementProceedings, 'id', 'title'));},
          ],
          [
            'label'=>'Enforcement proceedings count',
            'attribute'=>'enforcement_proceedings.count',
            'value' => function($model) { return join(' ;     ',\yii\helpers\ArrayHelper::map($model->enforcementProceedings, 'id', 'count'));},
          ],
          [
            'label'=>'Enforcement proceedings link',
            'attribute'=>'enforcement_proceedings.link',
            'value' => function($model) { return join(' ;     ',\yii\helpers\ArrayHelper::map($model->enforcementProceedings, 'id', 'link'));},
          ],







    ];

    // Renders a export dropdown menu
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $exportColumns,
        'clearBuffers' => true, //optional
    ]);

    // You can choose to render your own GridView separately
    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns
    ]);
?>

    <?php Pjax::end(); ?>

</div>
