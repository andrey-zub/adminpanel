<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BasicIps */

$this->title = "ИП #$model->id";
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
              'label'=>'Activity ips',
              'attribute'=>'activity_ips.text',
              'value' => implode('.  ',\yii\helpers\ArrayHelper::map($model->activityIps, 'id', 'text')),
            ],
            [
              'label'=>'Activity ips num',
              'attribute'=>'activity_ips.num',
              'value' => implode(';     ',\yii\helpers\ArrayHelper::map($model->activityIps, 'id', 'num')),
            ],
            [
              'label'=>'Activity ips link',
              'attribute'=>'activity_link_ips.text',
              'value' => implode('.  ',\yii\helpers\ArrayHelper::map($model->activitiesLinkIps, 'id', 'link')),
            ],
            [
              'label'=>'Connecton ips',
              'attribute'=>'connecton_ips.text',
              'value' => implode('.  ',\yii\helpers\ArrayHelper::map($model->connectionIps, 'id', 'text')),
            ],
            [
              'label'=>'Customer ips fz',
              'attribute'=>'customer_ips.fz',
              'value' => implode(';  ',\yii\helpers\ArrayHelper::map($model->customerIps, 'id', 'fz')),
            ],
            [
              'label'=>'Customer ips contract',
              'attribute'=>'customer_ips.contract',
              'value' => implode(';  ',\yii\helpers\ArrayHelper::map($model->customerIps, 'id', 'contract')),
            ],
            [
              'label'=>'Customer ips count',
              'attribute'=>'customer_ips.count',
              'value' => implode(';  ',\yii\helpers\ArrayHelper::map($model->customerIps, 'id', 'count')),
            ],
            [
              'label'=>'Customer ips link',
              'attribute'=>'customer_link_ips.link',
              'value' => implode(';  ',\yii\helpers\ArrayHelper::map($model->customerLinkIps, 'id', 'link')),
            ],
            [
              'label'=>'Seller ips fz',
              'attribute'=>'seller_ips.fz',
              'value' => implode(';  ',\yii\helpers\ArrayHelper::map($model->sellerIps, 'id', 'fz')),
            ],
            [
              'label'=>'Seller ips contract',
              'attribute'=>'seller_ips.contract',
              'value' => implode(';  ',\yii\helpers\ArrayHelper::map($model->sellerIps, 'id', 'contract')),
            ],
            [
              'label'=>'Seller ips count',
              'attribute'=>'seller_ips.count',
              'value' => implode(';  ',\yii\helpers\ArrayHelper::map($model->sellerIps, 'id', 'count')),
            ],
            [
              'label'=>'Seller ips link',
              'attribute'=>'seller_link_ips.link',
              'value' => implode('  [---];  ',\yii\helpers\ArrayHelper::map($model->sellerLinkIps, 'id', 'link')),
            ],
            [
              'label'=>'Legal case title ',
              'attribute'=>'legal_cases.title',
              'value' => implode(';  ',\yii\helpers\ArrayHelper::map($model->legalCases, 'id', 'title')),
            ],
            [
              'label'=>'Legal case count ',
              'attribute'=>'legal_cases.count',
              'value' => implode(';  ',\yii\helpers\ArrayHelper::map($model->legalCases, 'id', 'count')),
            ],
            [
              'label'=>'Legal case link ',
              'attribute'=>'legal_case_links.link',
              'value' => implode('  [---];  ',\yii\helpers\ArrayHelper::map($model->legalCaseLinks, 'id', 'link')),
            ],
            [
              'label'=>'Phone ips ',
              'attribute'=>'phone_ips.number',
              'value' => implode('  [---];  ',\yii\helpers\ArrayHelper::map($model->phoneIps, 'id', 'number')),
            ],
            [
              'label'=>'Email ips ',
              'attribute'=>'email_ips.addr',
              'value' => implode('  [---];  ',\yii\helpers\ArrayHelper::map($model->emailIps, 'id', 'addr')),
            ],
            [
              'label'=>'Site ips',
              'attribute'=>'site_ips.addr',
              'value' => implode('  [---];  ',\yii\helpers\ArrayHelper::map($model->siteIps, 'id', 'addr')),
            ],









        ],
    ]) ?>

</div>
