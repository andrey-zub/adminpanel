<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Basics */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="basics-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'org_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ogrn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'okpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_reg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_eng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ur_addr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'org_prav_form')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ust_cap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spec_nlg_rej')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avg_workers')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ceil_reg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'main_activity_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'main_activity_text')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
