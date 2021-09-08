<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArsipSdm */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Arsip Dokumen',
]) . $model->no_dokumen;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Arsip Dokumen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_dokumen, 'url' => ['view', 'id' => $model->no_dokumen]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="arsip-sdm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 
        'nip' => $nip, 
        'kode_kategori' => $kode_kategori,
        'filemodel' => $filemodel,
    ]) ?>

</div>
