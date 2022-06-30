<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Basics */

$this->title = "$model->org_name ";

$this->params['breadcrumbs'][] = array(
    'label'=> 'ИП',
    'url'=>Yii::$app->urlManager->createUrl(['admin/basic-ips'])
);
$this->params['breadcrumbs'][] = ['label' => 'Организации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="basics-view">

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

    <?=


     DetailView::widget([
        'model' => $model,

        'template' => function($attribute, $index, $widget){
                if($attribute['value']){
                    return "<tr><th>{$attribute['label']}</th><td>{$attribute['value']}</td></tr>";
                }
        },
        'attributes' => [
            'id',
            'org_name',
            'status',
            'ogrn',
            'inn',
            'kpp',
            'okpp',
            'date_reg',
            'name_eng',
            'ur_addr',
            'org_prav_form',
            'ust_cap',
            'spec_nlg_rej',
            'avg_workers',
            'ceil_reg',
            'main_activity_num',
            'main_activity_text',
            //------------------------------------связанные поля--------------------------------

            [
              'label'=>'Рейтинг',
              'value' => implode(',</br>', \yii\helpers\ArrayHelper::map($model->ratings, 'id',
                function ($rait) { return '<br><b>'.$rait->mark.'</b>  /  '.$rait->comment;}
              )),
            ],

            [
                'label'=>'Гениральный директор ( ФИО )',
              'attribute'=>'managements.gen_dir',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->managements, 'id', 'gen_dir')),
            ],
            [
              'label'=>'Гениральный директор ( ИНН )',
              'attribute'=>'managements.inn_gen_dir',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->managements, 'id', 'inn_gen_dir')),
            ],
            [
              'label'=>'Гениральный директор ( Назначен )',
              'attribute'=>'managements.date_gen_dir',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->managements, 'id', 'date_gen_dir')),
            ],
            //-------------------------------------------------------------------------------------------------------------

            [
              'label'=>'Контактная информация ( телефон )',
              'attribute'=>'phones.number',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->phones, 'id', 'number')),
            ],
            [
              'label'=>'Контактная информация ( электронная почта )',
              'attribute'=>'emails.addr',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->emails, 'id', 'addr')),
            ],
            [
              'label'=>'Контактная информация ( сайт )',
              'attribute'=>'sites.addr',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->sites, 'id', 'addr')),
            ],
            //--------------------------------------------------------------------------------------------------------------------

            [
              'label'=>'Виды деятельности',
              'value' => implode(',</br>', \yii\helpers\ArrayHelper::map($model->activities, 'id',
                function ($activList) { return '<br><b>'.$activList->num.'</b>  /  '.$activList->text;}
              )),
            ],



            [
              'label'=>'Виды деятельности ( подробнее )',
              'attribute'=>'activities_links.link',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->activitiesLinks, 'id', function($activLink){
                  return '<a href='.$activLink->link.' target="_blank">'.$activLink->link.'</a>';
              })),
            ],

            //--------------------------------------------------------------------------------------------------------------------

            [
              'label'=>'Товарные знаки',
              'value' => implode(',</br>', \yii\helpers\ArrayHelper::map($model->trademarks, 'id',
                function ($trad) { return '<br><b>'.$trad->text.'</b>  /  '.$trad->link;}
              )),
            ],
            [
              'label'=>'Товарные знаки ( подробнее )',
              'attribute'=>'trademarks_links.link',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->trademarksLinks, 'id', function($link){
                  return '<a href='.$link->link.' target="_blank">'.$link->link.'</a>';
              })),
            ],
            //------------------------------------------------------------------------------

            [
              'label'=>'Связи',
              'value' => implode(',</br>', \yii\helpers\ArrayHelper::map($model->connections, 'id',
                function ($conn) { return '<br><b>'.$conn->title.'</b>  /  '.$conn->text;}
              )),
            ],

            [
              'label'=>'Связи ( подробнее )',
              'attribute'=>'connections_links.link',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->connectionsLinks, 'id', function($link){
                  return '<a href='.$link->link.' target="_blank">'.$link->link.'</a>';
              })),
            ],

          //-----------------------------------------------------------------------------
            [
              'label'=>'Правопредшественники',
              'attribute'=>'predecessors.text',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->predecessors, 'id', 'text')),
            ],
            [
              'label'=>'Правопредшественники ( подробнее )',
              'attribute'=>'predecessors_links.link',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->predecessorsLinks, 'id', 'link')),
            ],
            [
              'label'=>'Правопреемники',
              'attribute'=>'successors.text',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->successors, 'id', 'text')),
            ],
            [
              'label'=>'Правопреемники ( подробнее )',
              'attribute'=>'successors_links.link',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->successorsLinks, 'id', function($link){
                  return '<a href='.$link->link.' target="_blank">'.$link->link.'</a>';
              })),
            ],
            //---------------------------------------------------------------------------------------------------

            [
              'label'=>'Заказчики',
              'value' => implode('</br>---------------------------------', \yii\helpers\ArrayHelper::map($model->sellers, 'id',
                function ($cus) { return
                   '  <br> <b>ФЗ</b>    /       <b>Контракты  </b>    /     <b>Общая сумма</b> </br>
                   <br>'.$cus->fz.'  /  '.$cus->contract.'  /  '.$cus->count.'</br>'

                ;}
              )),
            ],

            [
              'label'=>'Заказчики ( подробнее )',
              'attribute'=>'customer_links.link',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->customerLinks, 'id', function($link){
                  return '<a href='.$link->link.' target="_blank">'.$link->link.'</a>';
              })),
            ],

            //-----------------------------------------------------------------------------------------------------
            [
              'label'=>'Фелиалы',
              'attribute'=>'branches.text',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->branches, 'id', 'text')),
            ],


            //-----------------------------------------------------------------------------------------------------
            [
              'label'=>'Поставщики',
              'value' => implode('</br>---------------------------------', \yii\helpers\ArrayHelper::map($model->sellers, 'id',
                function ($sel) { return
                   '  <br> <b>ФЗ</b>    /       <b>Контракты  </b>    /     <b>Общая сумма</b> </br>
                   <br>'.$sel->fz.'  /  '.$sel->contract.'  /  '.$sel->count.'</br>'

                ;}
              )),
            ],

            [
              'label'=>'Поставщики ( подробнее )',
              'attribute'=>'seller_links.link',
              'value' => implode(',<br>',\yii\helpers\ArrayHelper::map($model->sellerLinks, 'id', function($link){
                  return '<a href='.$link->link.' target="_blank">'.$link->link.'</a>';
              })),
            ],



//-----------------------------------------------------------------------------------------------------------------------
            [
              'label'=>'Учредители - Юр. лица',
              'value' => implode('</br>---------------------------------', \yii\helpers\ArrayHelper::map($model->founderUrs, 'id',
                function ($urs) { return
                   '  <br> <b>Учредитель</b>    /       <b>Стоимость доли  </b>    /     <b>Доля капитала</b> </br>
                   <br>'.$urs->founder.'  /  '.$urs->cost.'  /  '.$urs->capital.'</br>'

                ;}
              )),
            ],


            //----------------------------------------------------------------------------------------------------------------------
            [
              'label'=>'Учредители - Иностранные юр. лица',
              'value' => implode('</br>---------------------------------', \yii\helpers\ArrayHelper::map($model->founderForeigns, 'id',
                function ($for) { return
                   '  <br> <b>Учредитель</b>    /       <b>Стоимость доли  </b>    /     <b>Доля капитала</b> </br>
                   <br>'.$for->founder.'  /  '.$for->cost.'  /  '.$for->capital.'</br>'

                ;}
              )),
            ],

            //-------------------------------------------------------------------------------------------------------------------------
            [
              'label'=>'Финансовые показатели ',
              'attribute'=>'financial_indicator.text',
              'value' => implode(',<br> ',\yii\helpers\ArrayHelper::map($model->financialIndicators, 'id', 'text')),
            ],
            [
              'label'=>'Финансовые показатели ( подробнее )',
              'attribute'=>'financial_indicator_links.link',
              'value' => implode(',<br>  ',\yii\helpers\ArrayHelper::map($model->financialIndicatorLinks, 'id', function($link){
                  return '<a href='.$link->link.' target="_blank">'.$link->link.'</a>';
              })),
            ],
            [
              'label'=>'Финансовые коэффициенты ',
              'attribute'=>'financial_stabilties.text',
              'value' => implode(' ,<br>  ',\yii\helpers\ArrayHelper::map($model->financialStabilities, 'id', 'text')),
            ],
            [
              'label'=>'Лицензии  ',
              'attribute'=>'licenses.text',
              'value' => implode(' ,<br>  ',\yii\helpers\ArrayHelper::map($model->licenses, 'id', 'text')),
            ],

            [
              'label'=>'Лицензии ( подробнее ) ',
              'attribute'=>'license_links.link',
              'value' => implode(' ,<br>  ',\yii\helpers\ArrayHelper::map($model->licenseLinks, 'id', function($link){
                  return '<a href='.$link->link.' target="_blank">'.$link->link.'</a>';
              })),
            ],

            //--------------------------------------------------------------------------------------------------------------------

            [
              'label'=>'Исполнительные производства',
              'value' => implode('</br>---------------------------------', \yii\helpers\ArrayHelper::map($model->enforcementProceedings, 'id',
                function ($enf) { return
                   ' <br><b>'.$enf->title.'</b>  /  '.$enf->count.'  /  <a href=https://checko.ru'.$enf->link.' target="_blank">https://checko.ru'.$enf->link.'</a></br>'

                ;}
              )),
            ],






        ],
    ]) ?>

</div>
