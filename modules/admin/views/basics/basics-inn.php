<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
// use kartik\helpers\Html;

$this->title = 'Организации [ ИНН ]';

  $this->params['breadcrumbs'][] = array(
      'label'=> 'ИП',
      'url'=>Yii::$app->urlManager->createUrl(['admin/basic-ips'])
  );
  $this->params['breadcrumbs'][] = array(
      'label'=> 'Организации',
      'url'=>Yii::$app->urlManager->createUrl(['admin/basics'])
  );
    $this->params['breadcrumbs'][] = $this->title;

?>
<div class="basics-index">

    <h1><?= Html::encode($this->title) ?></h1>
      <h6>( Для поиска организаций по ИНН вставте в строку поиска значения через пробел )</h6>
  <?php  echo $this->render('_search_inn', ['model' => $searchModel]); ?>

<?php
    Pjax::begin();


    $date = date('m/d/Y h:i:s a', time());



    //=--------------------------------------------------------------------------------------------------------------------------


    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' =>  $searchModel->getExportColumns(),
        'target' => '_popup',
        'autoXlFormat'=>true,
            'clearBuffers' => true,
            'filename' => "ОРГАНИЗАЦИИ_ИНН($date)",
        'dropdownOptions' => [
                   'label' => 'Экспортировать в файл',
                   'class' => 'btn btn-outline-secondary btn-primary',
                   'itemsBefore' => [
                       '<div class="dropdown-header">Экспортировать найденную информацию ( максимум 100 записей )</div>',
                   ],
               ],



    ]) . "\n".
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $searchModel->getGridColumns(),
        'options' =>['style' => 'width: 1800px;'],
        'layout' => "{summary}\n{pager}\n{items}\n{summary}\n{pager}",

        'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<h1 class="panel-title"> Basics </h3>',
            ],

            'export' => [
                   'label' => 'Экспортировать основную информацию на странице  ',

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
