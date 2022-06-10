<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\BasicIpsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Basic Ips';
$this->params['breadcrumbs'][] = array(
    'label'=> 'Admin panel',
    'url'=>Yii::$app->urlManager->createUrl(['admin/'])
);
$this->params['breadcrumbs'][] = array(
    'label'=> 'Basic',
    'url'=>Yii::$app->urlManager->createUrl(['admin/basics'])
);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basic-ips-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?
    $gridColumns = [
        'id',
        'name_ip:ntext',
        'status',
        'ogrn',
        'inn',
        'okpp',
        'main_activity_num',
          //'full_name_ip:ntext',
          //'date_reg',
          //'ceil_reg',
            ['class' => 'yii\grid\SerialColumn'],
            [
              'class' => 'yii\grid\ActionColumn',
              'template'=>'{view}'
            ],
    ];

    $exportColumns = [
        'id',
        'name_ip:ntext',
        'status',
        'ogrn',
        'inn',
        'okpp',
        'main_activity_num',
          'full_name_ip:ntext',
          'date_reg',
          'ceil_reg',
          [
             'label' => 'Activity ips',
             'attribute'=>'activity_ips.text',
             'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->activityIps, 'id', 'text')); },
          ],
          [
             'label' => 'Activity ips num',
             'attribute'=>'activity_ips.num',
             'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->activityIps, 'id', 'num')); },
          ],
          [
            'label'=>'Activity ips link',
            'attribute'=>'activity_link_ips.text',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->activitiesLinkIps, 'id', 'link')); },
          ],
          [
            'label'=>'Connecton ips',
            'attribute'=>'connecton_ips.text',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->connectionIps, 'id', 'text')); },
          ],
          [
            'label'=>'Customer ips fz',
            'attribute'=>'customer_ips.fz',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->connectionIps, 'id', 'text')); },
          ],
          [
            'label'=>'Customer ips contract',
            'attribute'=>'customer_ips.contract',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->connectionIps, 'id', 'contract')); },
          ],
          [
            'label'=>'Customer ips count',
            'attribute'=>'customer_ips.count',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->connectionIps, 'id', 'count')); },
          ],
          [
            'label'=>'Customer ips link',
            'attribute'=>'customer_link_ips.link',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->customerLinkIps, 'id', 'link')); },
          ],
          [
            'label'=>'Seller ips fz',
            'attribute'=>'seller_ips.fz',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->sellerIps, 'id', 'fz')); },
          ],
          [
            'label'=>'Seller ips contract',
            'attribute'=>'seller_ips.contract',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->sellerIps, 'id', 'contract')); },
          ],
          [
            'label'=>'Seller ips count',
            'attribute'=>'seller_ips.count',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->sellerIps, 'id', 'count')); },
          ],
          [
            'label'=>'Seller ips link',
            'attribute'=>'seller_link_ips.link',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->sellerLinkIps, 'id', 'link')); },
          ],
          [
            'label'=>'Legal case title ',
            'attribute'=>'legal_cases.title',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->legalCases, 'id', 'title')); },
          ],
          [
            'label'=>'Legal case count ',
            'attribute'=>'legal_cases.count',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->legalCases, 'id', 'count')); },
          ],
          [
            'label'=>'Legal case link ',
            'attribute'=>'legal_case_links.link',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->legalCaseLinks, 'id', 'link')); },
          ],
          [
            'label'=>'Phone ips ',
            'attribute'=>'phone_ips.number',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->phoneIps, 'id', 'number')); },
          ],
          [
            'label'=>'Email ips ',
            'attribute'=>'email_ips.addr',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->emailIps, 'id', 'addr')); },
          ],
          [
            'label'=>'Site ips',
            'attribute'=>'site_ips.addr',
            'value' => function($model) { return join(', ', yii\helpers\ArrayHelper::map($model->siteIps, 'id', 'addr')); },
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
