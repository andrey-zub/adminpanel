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

  $this->params['breadcrumbs'][] = array(
      'label'=> 'Организации[ ИНН ]',
      'url'=>Yii::$app->urlManager->createUrl(['admin/basics/basics-inn'])
  );
    $this->params['breadcrumbs'][] = $this->title;

?>
<div class="basics-index">

    <h1><?= Html::encode($this->title) ?></h1>
  <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

<?php
    Pjax::begin();


    $date = date('m/d/Y h:i:s a', time());



    //=--------------------------------------------------------------------------------------------------------------------------


    // echo ExportMenu::widget([
    //     'dataProvider' => $dataProvider,
    //     'columns' =>  $searchModel->getExportColumns(),
    //     'target' => '_blank',
    //     'autoXlFormat'=>true,
    //         'clearBuffers' => true,
    //
    //         'filename' => "ОРГАНИЗАЦИИ_($date)",
    //     'dropdownOptions' => [
    //                'label' => 'Экспортировать в файл ',
    //                'class' => 'btn btn-outline-secondary btn-primary ',
    //                'itemsBefore' => [
    //                    '<div class="dropdown-header">Экспортировать найденную информацию ( максимум 100 первых записей )</div>',
    //                ],
    //            ],
    //
    // ]) . "\n".




   echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $searchModel->getGridColumns(),
         'options' =>['style' => 'width: 2000px;'],
        'headerContainer' => ['class' => 'kv-table-header', 'style' => 'float-left'],

        'panel' => [
                'type' => 'primary',
                'heading' => '<h1 class="panel-title"> Basics </h3>',
            ],
            'panelTemplate' =>"{pager}\n{panelHeading}\n{panelBefore}\n{items}\n{pager}",

            'export' => [ 'label' => 'Экспортировать текущую страницу'  ],
               'exportContainer' => [ 'class' => '  btn-group left mr-2 me-2' ],
               // your toolbar can include the additional full export menu
               'toolbar' => [
                   '{export}',
                   '{toggleData}',
                   'options' => ['class' => 'btn-group ', 'style'=>'float-left']
               ],
        'rowOptions' => function ($model, $key, $index, $grid){
          if(($model->id % 2) == 0) { return ['style' => 'background-color:#dce0e0;']; }
        },
    ]);





    //------------------------------------------------------------------------------------------------------

     ?>
        <?php Pjax::end(); ?>
    </div>
