<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArsipPengadaanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arsip-pengadaan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nomor_kontrak') ?>

    <?= $form->field($model, 'kode_jenis_pengadaan') ?>

    <?= $form->field($model, 'judul_kontrak') ?>

    <?= $form->field($model, 'kode_perusahaan') ?>

    <?= $form->field($model, 'nilai_RAB') ?>

    <?php // echo $form->field($model, 'harga_nego') ?>

    <?php // echo $form->field($model, 'tanggal_kontrak') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
