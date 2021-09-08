<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArsipPengadaan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Arsip Pengadaan',
]) . $model->nomor_kontrak;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Arsip Pengadaans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nomor_kontrak, 'url' => ['view', 'id' => $model->nomor_kontrak]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="arsip-pengadaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
