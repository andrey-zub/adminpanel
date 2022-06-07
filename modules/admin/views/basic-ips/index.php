<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name_ip:ntext',
            //'full_name_ip:ntext',
            'status',
            'ogrn',
            'inn',
            'okpp',
            //'date_reg',
            //'ceil_reg',
            'main_activity_num',
            //'main_activity_text:ntext',
            // 'created_at',
            // 'updated_at',
            // 'deleted_at',
            [
              'class' => 'yii\grid\ActionColumn',
              'template'=>'{view}'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
