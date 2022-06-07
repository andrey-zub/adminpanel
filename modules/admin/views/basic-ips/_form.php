<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BasicIps */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="basic-ips-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <?= $form->field($model, 'name_ip')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'full_name_ip')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ogrn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'okpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_reg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ceil_reg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'main_activity_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'main_activity_text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
