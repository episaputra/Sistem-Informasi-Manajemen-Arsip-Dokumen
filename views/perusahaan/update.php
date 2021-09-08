<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Perusahaan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Perusahaan',
]) . $model->kode_perusahaan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Perusahaans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_perusahaan, 'url' => ['view', 'id' => $model->kode_perusahaan]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="perusahaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
