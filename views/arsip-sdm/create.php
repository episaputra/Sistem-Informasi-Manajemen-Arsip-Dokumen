<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArsipSdm */

$this->title = Yii::t('app', 'Tambah Arsip Dokumen');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Arsip Dokumen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-sdm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 
        'nip' => $nip, 
        'kode_kategori' => $kode_kategori,
        'filemodel' => $filemodel,
    ]) ?>

</div>
