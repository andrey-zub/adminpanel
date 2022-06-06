<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Basics */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Basics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="basics-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            //------------------------------------
            [
              'attribute'=>'ratings.mark',
              'value' => implode('.  ',\yii\helpers\ArrayHelper::map($model->ratings, 'id', 'mark')),
            ]

        ],
    ]) ?>

</div>
