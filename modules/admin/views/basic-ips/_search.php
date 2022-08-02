<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BasicIpsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="basic-ips-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?// $form->field($model, 'id') ?>

    <?php  echo $form->field($model, 'name_ip') ?>

    <? //$form->field($model, 'status') ?>

    <?php echo $form->field($model, 'ogrn') ?>

    <?php echo $form->field($model, 'inn') ?>

    <?php  echo $form->field($model, 'okpp') ?>


    <?php // echo $form->field($model, 'date_reg') ?>

    <?php // echo $form->field($model, 'ceil_reg') ?>

    <?php // echo $form->field($model, 'main_activity_num') ?>

    <?php  echo $form->field($model, 'main_activity_text') ?>

    <?php echo $form->field($model, 'full_name_ip') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Обновить', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
