<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
// use kartik\helpers\Html;

$this->title = 'Организации';

  $this->params['breadcrumbs'][] = array(
      'label'=> 'ИП',
      'url'=>Yii::$app->urlManager->createUrl(['admin/basic-ips'])
  );
    $this->params['breadcrumbs'][] = $this->title;

?>
<div class="basics-index">

    <h1><?= Html::encode($this->title) ?></h1>


<?
    Pjax::begin();



    $gridColumns = [

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
            'label'=>'Gen Dir',
            'attribute'=>'managements.gen_dir',
            'value' => function($model) { return join('.   ',\yii\helpers\ArrayHelper::map($model->managements, 'id', 'gen_dir'));},
          ],
          [
            'label'=>'Gen Dir Inn',
            'attribute'=>'managements.inn_gen_dir',
            'value' => function($model) { return join('.   ',\yii\helpers\ArrayHelper::map($model->managements, 'id', 'inn_gen_dir'));},
          ],
          [
            'label'=>'Gen Dir Date',
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
            'label'=>'Site ',
            'attribute'=>'sites.addr',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->sites, 'id', 'addr'));},
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
            'label'=>'Activity link',
            'attribute'=>'activities_links.link',
            'value' => function($model) { return join(';   ',\yii\helpers\ArrayHelper::map($model->activitiesLinks, 'id', 'link'));},
          ],



    ];




    $date = date('m/d/Y h:i:s a', time());



    //=--------------------------------------------------------------------------------------------------------------------------


    echo ExportMenu::widget([
        'dataProvider' => $dataProviderExport,
        'columns' => $exportColumns,
        'target' => '_popup',
            'clearBuffers' => true,
            'filename' => "ОРГАНИЗАЦИИ_($date)",
        'dropdownOptions' => [
                   'label' => 'Export (1-100)',
                   'class' => 'btn btn-outline-secondary btn-default',
                   'itemsBefore' => [
                       '<div class="dropdown-header">Export All Data</div>',
                   ],
               ],

    ]) . "\n".
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'options' =>['style' => 'width: 2500px;'],
        'layout' => "{summary}\n{pager}\n{items}\n{summary}\n{pager}",

        'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<h1 class="panel-title"> Basics </h3>',
            ],

            'export' => [
                   'label' => 'Page',
               ],
               'exportContainer' => [
                   'class' => 'btn-group mr-2 me-2'
               ],
               // your toolbar can include the additional full export menu
               'toolbar' => [
                   '{export}',
               ],
        'rowOptions' => function ($model, $key, $index, $grid){
          if(($model->id % 2) == 0) { return ['style' => 'background-color:#dce0e0;']; }
        },
    ]);





    //------------------------------------------------------------------------------------------------------

     ?>
        <?php Pjax::end(); ?>
    </div>
