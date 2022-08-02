<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BasicIps */

$this->title = "$model->name_ip";
$this->params['breadcrumbs'][] = array(
    'label'=> 'Организации',
    'url'=>Yii::$app->urlManager->createUrl(['admin/basics'])
);
$this->params['breadcrumbs'][] = ['label' => 'ИП', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="basic-ips-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,

        'template' => function($attribute, $index, $widget){
                if($attribute['value']){
                    return "<tr><th>{$attribute['label']}</th><td>{$attribute['value']}</td></tr>";
                }
        },

        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'deleted_at',
            'name_ip:ntext',
            'full_name_ip:ntext',
            'status',
            'ogrn',
            'inn',
            'okpp',
            'date_reg',
            'ceil_reg',
            'main_activity_num',
            'main_activity_text:ntext',

//----------------------------Связанные поля--------------------------------------------------
        [
          'label'=>'Виды деятельности',
          'value' => implode(',</br>', \yii\helpers\ArrayHelper::map($model->activityIps, 'id',
            function ($activList) { return '<br><b>'.$activList->num.'</b>  /  '.$activList->text;}
          )),
        ],

            [
              'label'=>'Виды деятельности ( подробнее )',
              'attribute'=>'activities_link_ips.link',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->activitiesLinkIps, 'id', function($activLink){
                  return '<a href='.$activLink->link.' target="_blank">'.$activLink->link.'</a>';
              })),
            ],
            [
              'label'=>'Связи',
              'attribute'=>'connecton_ips.text',
              'value' => implode(',</br>', \yii\helpers\ArrayHelper::map($model->connectionIps, 'id',
                function ($conn) { return '<br><b>'.$conn->title.'</b>  /  '.$conn->text;}
                )),
            ],

            [
              'label'=>'Поставшики',
              'value' => implode('</br>---------------------------------', \yii\helpers\ArrayHelper::map($model->sellerIps, 'id',
                function ($cus) { return
                   '  <br> <b>ФЗ</b>    /       <b>Контракты  </b>    /     <b>Общая сумма</b> </br>
                   <br>'.$cus->fz.'  /  '.$cus->contract.'  /  '.$cus->count.'</br>'

                ;}
              )),
            ],
            [
              'label'=>'Поставщики ( подробнее )',
              'attribute'=>'seller_links.link',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->sellerLinkIps, 'id', function($link){
                  return '<a href='.$link->link.' target="_blank">'.$link->link.'</a>';
              })),
            ],

            [
              'label'=>'Заказчики',
              'value' => implode('</br>---------------------------------', \yii\helpers\ArrayHelper::map($model->customerIps, 'id',
                function ($cus) { return
                   '  <br> <b>ФЗ</b>    /       <b>Контракты  </b>    /     <b>Общая сумма</b> </br>
                   <br>'.$cus->fz.'  /  '.$cus->contract.'  /  '.$cus->count.'</br>'

                ;}
              )),
            ],

            [
              'label'=>'Заказчики ( подробнее )',
              'attribute'=>'customer_links.link',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->customerLinkIps, 'id', function($link){
                  return '<a href='.$link->link.' target="_blank">'.$link->link.'</a>';
              })),
            ],
//------------------------------------------------------------------------------------------
            [
              'label'=>'Судебный прецендент ',
              'attribute'=>'legal_cases.title',
              'value' => implode(';  ',\yii\helpers\ArrayHelper::map($model->legalCases, 'id', 'title')),
            ],
            [
              'label'=>'Количество судебных дел ',
              'attribute'=>'legal_cases.count',
              'value' => implode(';  ',\yii\helpers\ArrayHelper::map($model->legalCases, 'id', 'count')),
            [
            ],
              'label'=>'Арбитражные дела',
              'attribute'=>'legal_case_links.link',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->legalCaseLinks, 'id', function($link){
                  return '<a href='.$link->link.' target="_blank">'.$link->link.'</a>';
              })),
            ],


            //----------------------------------------------------

            [
              'label'=>'Контактная информация ( телефон )',
              'attribute'=>'phones.number',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->phoneIps, 'id', 'number')),
            ],
            [
              'label'=>'Контактная информация ( электронная почта )',
              'attribute'=>'emails.addr',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->emailIps, 'id', 'addr')),
            ],
            [
              'label'=>'Контактная информация ( сайт )',
              'attribute'=>'sites.addr',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->siteIps, 'id', 'addr')),
            ],









        ],
    ]) ?>

</div>
