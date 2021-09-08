<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BarangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode_barang') ?>

    <?= $form->field($model, 'kode_jenis_barang') ?>

    <?= $form->field($model, 'seri_barang') ?>

    <?= $form->field($model, 'nama_barang') ?>

    <?= $form->field($model, 'merk_barang') ?>

    <?php // echo $form->field($model, 'Satuan') ?>

    <?php // echo $form->field($model, 'lokasi_barang') ?>

    <?php // echo $form->field($model, 'tgl_barang') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
