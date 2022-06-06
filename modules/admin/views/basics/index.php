<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\BasicsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Basics';
  $this->params['breadcrumbs'][] = array(
      'label'=> 'Admin panel',
      'url'=>Yii::$app->urlManager->createUrl(['admin/'])
  );
    $this->params['breadcrumbs'][] = $this->title;

?>
<div class="basics-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'org_name',
            'status',
            'ogrn',
            'inn',
            'kpp',
            'okpp',
            'main_activity_num',

            // 'date_reg',
            // 'name_eng',
            // 'ur_addr',
            // 'org_prav_form',
            // 'ust_cap',
            // 'spec_nlg_rej',
            // 'avg_workers',
            // 'ceil_reg',
            // 'main_activity_text',

            [
              'class' => 'yii\grid\ActionColumn',
              'template'=> '{view}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
