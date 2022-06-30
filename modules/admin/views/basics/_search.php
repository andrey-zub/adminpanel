<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BasicsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="basics-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'org_name') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'ogrn') ?>

    <?= $form->field($model, 'inn') ?>

    <?php  echo $form->field($model, 'kpp') ?>

    <?php  echo $form->field($model, 'okpp') ?>

    <?php // echo $form->field($model, 'date_reg') ?>

    <?php  echo $form->field($model, 'name_eng') ?>

    <?php // echo $form->field($model, 'ur_addr') ?>

    <?php // echo $form->field($model, 'org_prav_form') ?>

    <?php // echo $form->field($model, 'ust_cap') ?>

    <?php // echo $form->field($model, 'spec_nlg_rej') ?>

    <?php // echo $form->field($model, 'avg_workers') ?>

    <?php // echo $form->field($model, 'ceil_reg') ?>

    <?php  echo $form->field($model, 'main_activity_num') ?>

    <?php // echo $form->field($model, 'main_activity_text') ?>

    <div class="form-group">
        <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Очистить', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
