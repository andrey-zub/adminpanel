<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BasicIps */

$this->title = 'Create Basic Ips';
$this->params['breadcrumbs'][] = ['label' => 'Basic Ips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basic-ips-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
